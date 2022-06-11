<?php

    include "connections.php";
    session_start();
    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    $id = htmlspecialchars(stripslashes($_POST['item_id']));
    $rate = htmlspecialchars(stripslashes($_POST['item_prize']));

    $update_rate = $connectdb->prepare("UPDATE currencies SET dollar_rate = :dollar_rate WHERE currency_id = :currency_id");
    $update_rate->bindvalue("currency_id", $id);
    $update_rate->bindvalue("dollar_rate", $rate);
    $update_rate->execute();

    if($update_rate){
        /* get currency */
        $get_cur = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
        $get_cur->bindvalue("currency_id", $id);
        $get_cur->execute();
        $cur = $get_cur->fetch();

        $_SESSION['success'] = "$cur->currency rate updated Successfully!";
        header("Location: ../views/admin.php");
    }else{
        $_SESSION['error'] = "Failed to update rate";
        header("Location: ../views/admin.php");

    }
?>
        