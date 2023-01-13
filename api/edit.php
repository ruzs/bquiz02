<?php
include_once "base.php";

if(isset($POST['id'])){
  foreach ($_POST['id'] as $id => $value) {
    if (isset($_POST['del']) && in_array($id,$_POST['del'])) {
      $News->del($id);
    }else{
      $row=$News->find($id);
      $row['sh']=(isset($_POST['sh']) && in_array($id,$_POST['sh']))?1:0;
      $News->save($row);
    }
  }
}
to("../back.php?do=news");
?>