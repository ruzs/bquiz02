<?php

include_once "base.php";

$news = $_POST['news'];
$user = $_POST['user'];

$chk = $Log->count(['news' => $news, 'user' => $user]);
$row = $News->find($news);

if ($chk > 0) {
  //要收回讚->刪除
  $Log->del(['news' => $news, 'user' => $user]);
  $row['good']--;
  $News->save($row);
} else {
  //按讚->新增
  $row['good']++;
  $Log->save(['news' => $news, 'user' => $user]);
  $News->save($row);
}
