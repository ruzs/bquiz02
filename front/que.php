<fieldset>
  <legend>目前位置：首頁 > 問卷調查</legend>
  <table style="width:95%;margin:auto">
    <tr>
      <th class="ct">編號</th>
      <th class="ct" width="60%">問卷題目</th>
      <th class="ct">投票總數</th>
      <th class="ct">結果</th>
      <th class="ct">狀態</th>
    </tr>
    <?php
    $subjects=$Que->all(['parent'=>0]);
    foreach ($subjects as $key => $subject) {
    ?>
      <tr>
        <td class="ct"><?= $key + 1; ?></td>
        <td><?= $subject['text']; ?></td>
        <td class="ct"><?= $subject['count']; ?></td>
        <td class="ct">
          <a href="?do=result&id=<?= $subject['id']; ?>">結果</a>
        </td>
        <td class="ct">
          <?php
          if (isset($_SESSION['login'])) {
            echo "<a href='?do=vote&id={$subject['id']}'>我要投票</a>";
          } else {
            echo "請先登入";
          }

          ?>
        </td>
      </tr>
    <?php
    }
    ?>
  </table>
</fieldset>