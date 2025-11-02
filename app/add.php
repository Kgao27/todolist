<?php

if(isset($_POST['description'])){
    require '../db_com.php';

    $description = $_POST['description'];

    if(empty($description)){
        header("Location: ../index.php?mess=error");
    }else {
        $stmt = $conn->prepare("INSERT INTO todos(description) VALUE(?)");
        $res = $stmt->execute([$description]);

        if($res){
            header("Location: ../index.php?mess=success"); 
        }else {
            header("Location: ../index.php");
        }
        $conn = null;
        exit();
    }
}else {
    header("Location: ../index.php?mess=error");
}