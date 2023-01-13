<?php
include_once "base.php";

if(isset($_POST['del'])){
    foreach($_POST['del'] as $id){
        $User->del($id);
    }
}

to("../back.php?do=admin");