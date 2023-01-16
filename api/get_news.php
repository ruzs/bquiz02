<?php
include_once "base.php";

$id=$_GET['id'];

$news=$News->find($id);

echo nl2br($news['text']);
?>