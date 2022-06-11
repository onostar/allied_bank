<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['card_id'])){
        $card_id = $_GET['card_id'];

        /* get expiration date */
        $get_date = $connectdb->prepare("SELECT request_date FROM cards WHERE card_id = :card_id");
        $get_date->bindvalue("card_id", $card_id);
        $get_date->execute();

        $request_date = $get_date->fetch();
        $expiry_date = date("Y-m-d", strtotime($request_date->request_date . " + 1460 days"));

        $update_card = $connectdb->prepare("UPDATE cards SET card_status = 1, expiration_date = :expiration_date WHERE card_id = :card_id");
        $update_card->bindvalue("expiration_date", $expiry_date);
        $update_card->bindvalue("card_id", $card_id);
        $update_card->execute();

        if($update_card){
            $_SESSION['success'] = "Card request Approved!";
            header("Location: ../views/admin.php");
        }else{
            $_SESSION['error'] = "Card request Failed to approve";
            header("Location: ../views/admin.php");
        }
    }
?>