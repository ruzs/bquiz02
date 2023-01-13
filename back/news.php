<?php
$all=$News->count();
$div=3;
$pages=ceil($all/$div);
$now=$_GET['p']??1;
$start=($now-1)*$div;

$rows=$News->all(" limit $start , $div");
?>
<form action="./api/edit.php" method="post">
<table>
  <tr>
    <td>編號</td>
    <td>標題</td>
    <td>顯示</td>
    <td>刪除</td>
  </tr>
  <?php
  foreach ($rows as $key => $row) {
  ?>
  <tr>
    <td><?=$key+1;?>.</td>
    <td><?=$row['title'];?></td>
    <td><input type="checkbox" name="sh[]" value="<?=$row['id']?>" <?=($row['sh']==1)?'checked':'';?>></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    <input type="hidden" name="id[]"value="<?=$row['id']?>">
  </tr>
  <?php
  }
  ?>
</table>
<div class="ct">
<?php
if(($now-1)>0){
    $pre=$now-1;
    echo "<a href='back.php?do=news&p=$pre'> < </a>";
}

for($i=1; $i<=$pages;$i++){
    $size=($i==$now)?"24px":"16px";
    echo "<a href='back.php?do=news&p=$i' style='font-size:$size'> $i </a>";
}

if(($now+1)<=$pages){
    $next=$now+1;
    echo "<a href='back.php?do=news&p=$next'> > </a>";
}
?>


</div>
<div class="ct"><input type="submit" value="確定修改"></div>
</form>