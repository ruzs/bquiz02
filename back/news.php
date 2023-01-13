<?php
$rows=$News->all();
?>
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
    <td></td>
    <td></td>
    <td><input type="checkbox" name="sh[]" value="<?=$row['id']?>"></td>
    <td><input type="checkbox" name="del[]" value="<?=$row['id']?>"></td>
    <input type="hidden" name="id[]"value="<?=$row['id']?>">
  </tr>
  <?php
  }
  ?>
</table>