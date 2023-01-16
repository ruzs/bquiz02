<style>
  .full {
    display: none;
    position: absolute;
    background-color: rgb(100, 100, 100);
    z-index: 99;
    padding: 1rem;
    box-shadow: 0 0 10px #999;
    left: -10px;
    top: 5px;
    width: 95%;
    height: 500px;
    overflow: auto;
    transition-duration: 1s;
  }

  .news-title {
    cursor: pointer;
    background-color: #eee;
  }
</style>
<fieldset>
  <legend>目前位置:首頁 > 最新文章區</legend>
  <table>
    <tr>
      <td width="30%">標題</td>
      <td width="50%">內容</td>
      <td></td>
    </tr>
    <?php
    $all = $News->count(['sh' => 1]);
    $div = 5;
    $pages = ceil($all / $div);
    $now = $_GET['p'] ?? 1;
    $start = ($now - 1) * $div;
    $rows = $News->all(['sh' => 1], " limit $start,$div");
    foreach ($rows as $row) {
    ?>
      <tr>
        <td class="news-title"><?= $row['title']; ?></td>
        <td style="position:relative;">
          <div class="short"><?= mb_substr($row['text'], 0, 20); ?>...</div>
          <div class="full">
            <?php
            echo "<div style='color:skyblue'>" . $row['type'] . "</div>";
            echo "<div style='color:white'>" . nl2br($row['text']) . "</div>";
            ?>
          </div>
        </td>
        <td>
          <span class="num"><?= $row['good']; ?></span>
          個人說
          <img src="./icon/02B03.jpg" style="width:20px;height:20px">
          <?php
          /**
           * 1.點擊後要紀錄使用者對那一篇文章點了讚或收回讚
           * 2.點擊後要根據讚或收回讚去改變文章的good欄位
           */
          if (isset($_SESSION['login'])) {
            echo "<a href='#' class='goods' data-user='{$_SESSION['login']}' data-news='{$row['id']}'>";
            echo "讚";
            echo "</a>";
          }
          ?>

        </td>
      </tr>
    <?php
    }
    ?>
  </table>
  <div>
    <?php
    if (($now - 1) > 0) {
      $prev = $now - 1;
      echo "<a href='index.php?do=pop&p=$prev'> < </a>";
    }

    for ($i = 1; $i <= $pages; $i++) {
      $size = ($i == $now) ? "26px" : "16px";
      echo "<a href='index.php?do=pop&p=$i' style='font-size:$size'> $i </a>";
    }

    if (($now + 1) <= $pages) {
      $next = $now + 1;
      echo "<a href='index.php?do=pop&p=$next'> > </a>";
    }
    ?>
  </div>
</fieldset>
<script>
  $(".news-title").hover(
    function() {

      $(this).next().children('.full').show()

    },

    function() {
      $(this).next().children('.full').hide()
    }
  )
  $(".full").hover(
    function() {
      $(this).show();
    },
    function() {
      $(this).hide();
    }

  )
</script>