<?php

include_once "./base.php";

$opt=$_POST['opt'];
$option=$Que->find($opt);
$option['count']++;
$Que->save($option);

$subject=$Que->find($option['parent']);
$subject['count']++;
$Que->save($subject);


to("../index.php?do=result&id=".$subject['id']);

?>