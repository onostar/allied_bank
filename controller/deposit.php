<?php
    include "connections.php";
    session_start();
    
    // $_SESSION['success'] ="";
    // $_SESSION['error'] = "";

    if(isset($_POST['confirm_deposit'])){
        $id = htmlspecialchars(stripslashes($_POST['user_id']));
        $currency = htmlspecialchars(stripslashes($_POST['currency']));
        $amount = htmlspecialchars(stripslashes($_POST['amount']));
        $plan = htmlspecialchars(stripslashes($_POST['plan']));
        $subject = "Deposit request";
        $message = "Your deposit request have been received. Our customer help centre will contact you in a bit with details of payment method. Thanks";
        /* check if users deposit had been cleared */
        $check_status = $connectdb->prepare("SELECT * FROM deposit_requests WHERE user_id = :user_id");
        $check_status->bindvalue("user_id", $id);
        $check_status->execute();

        if($check_status->rowCount() > 0){
            $_SESSION['error'] = "You still have a deposit yet to be approved. Kindly be patient for approval!";
            header("Location: ../views/users.php");
        }else{
            /* insert into deposits */
            $insert_deposit = $connectdb->prepare("INSERT INTO deposit_requests (user_id, currency_id, amount, plan_id) VALUES (:user_id, :currency_id, :amount, :plan_id)");
            $insert_deposit->bindvalue("user_id", $id);
            $insert_deposit->bindvalue("currency_id", $currency);
            $insert_deposit->bindvalue("amount", $amount);
            $insert_deposit->bindvalue("plan_id", $plan);
            $insert_deposit->execute();

            if($insert_deposit){
                /* generate transaction number */
                $deposit_id = $connectdb->lastInsertId();
                $random = rand(1, 5000);
                $trx_number = "DEP".$random.$plan.$id.$deposit_id;
                $update_trx = $connectdb->prepare("UPDATE deposit_requests SET trx_number = :trx_number WHERE user_id = :user_id");
                $update_trx->bindvalue("trx_number", $trx_number);
                $update_trx->bindvalue("user_id", $id);
                $update_trx->execute();

                /* send notification/mail */
                $send_not = $connectdb->prepare("INSERT INTO notifications (user_id, not_subject, not_message) VALUES(:user_id, :not_subject, :not_message)");
                $send_not->bindvalue("user_id", $id);
                $send_not->bindvalue("not_subject", $subject);
                $send_not->bindvalue("not_message", $message);
                $send_not->execute();
                $_SESSION['payment'] = "Your deposit request was successfull.";
                header("Location: ../views/users.php");
                // $_SESSION['notification'] = "You have a new message";
            }
        }
    }