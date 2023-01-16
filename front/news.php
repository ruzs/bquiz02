<style>
  .full{
    display:none;
  }
  .news-title{
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
    $all=$News->count(['sh'=>1]);
    $div=5;
    $pages=ceil($all/$div);
    $now=$_GET['p']??1;
    $start=($now-1)*$div;
    $rows=$News->all(['sh'=>1]," limit $start,$div");
    foreach($rows as $row){
      ?>
    <tr>
      <td class="news-title"><?=$row['title'];?></td>
      <td>
        <div  class="short"><?=mb_substr($row['text'],0,20);?>...</div>
        <div  class="full"><?=nl2br($row['text']);?></div>
      </td>
      <td></td>
    </tr>
      <?php
    }
      ?>
  </table>
  <div>
    <?php
    if(($now-1)>0){
        $prev=$now-1;
        echo "<a href='index.php?do=news&p=$prev'> < </a>";
    }
    
    for($i=1; $i<=$pages;$i++){
        $size=($i==$now)?"26px":"16px";
        echo "<a href='index.php?do=news&p=$i' style='font-size:$size'> $i </a>";
    }
    
    if(($now+1)<=$pages){
        $next=$now+1;
        echo "<a href='index.php?do=news&p=$next'> > </a>";
    }
    ?>
  </div>
</fieldset>
<script>
  $(".news-title").on("click",function(){
    $(this).next().children('.short').toggle();
    $(this).next().children('.full').toggle();

  })
</script>