<?php include_once 'base.php';

echo $User->count(['acc'=>$_POST['acc'],'pw'=>$_POST['pw']]);
// if($chk>0){
//   echo $chk;
//   $_SESSION['login'];
// }


?>