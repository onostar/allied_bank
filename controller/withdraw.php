<?php
    include "connections.php";
    session_start();
    
    // $_SESSION['success'] ="";
    // $_SESSION['error'] = "";

    if(isset($_POST['confirm_withdraw'])){
        $id = htmlspecialchars(stripslashes($_POST['with_user_id']));
        $currency = htmlspecialchars(stripslashes($_POST['currency']));
        $amount = htmlspecialchars(stripslashes($_POST['with_amount']));
        // $plan = htmlspecialchars(stripslashes($_POST['plan']));
        $subject = "Withdrawal request";
        $message = "Your withdrawal request of £ $amount was not successful due to account dormancy. Kindly contact Customer service for assistance. Thanks for banking with Irish ALlied bank";
        /* check if users deposit had been cleared */
        $check_status = $connectdb->prepare("SELECT * FROM withdrawals WHERE user_id = :user_id");
        $check_status->bindvalue("user_id", $id);
        $check_status->execute();
        if($check_status->rowCount() > 0){
            $statuss = $check_status->fetchAll();
            foreach($statuss as $status){
                if($status == 0){
                    $_SESSION['error'] = "You still have an unapproved withdrawal request. Kindly be patient for approval!";
                    header("Location: ../views/users.php");
                }else{
                    /* insert into withdrawals */
                        $insert_deposit = $connectdb->prepare("INSERT INTO withdrawals (user_id, currency, amount) VALUES (:user_id, :currency, :amount)");
                        $insert_deposit->bindvalue("user_id", $id);
                        $insert_deposit->bindvalue("currency", $currency);
                        $insert_deposit->bindvalue("amount", $amount);
                        $insert_deposit->execute();

                        if($insert_deposit){
                            /* generate transaction number */
                            $deposit_id = $connectdb->lastInsertId();
                            $random = rand(1, 5000);
                            $trx_number = "WIT".$random.$id.$deposit_id;
                            $update_trx = $connectdb->prepare("UPDATE withdrawals SET trx_number = :trx_number WHERE withdrawal_id = :withdrawal_id");
                            $update_trx->bindvalue("trx_number", $trx_number);
                            $update_trx->bindvalue("withdrawal_id", $deposit_id);
                            $update_trx->execute();

                            /* send notification/mail */
                            $send_not = $connectdb->prepare("INSERT INTO notifications (user_id, not_subject, not_message) VALUES(:user_id, :not_subject, :not_message)");
                            $send_not->bindvalue("user_id", $id);
                            $send_not->bindvalue("not_subject", $subject);
                            $send_not->bindvalue("not_message", $message);
                            $send_not->execute();
                            $_SESSION['withdraw'] = "Your withdrawal request was successfull.";
                            header("Location: ../views/users.php");
                        }
                    }
                }
        }else{
            /* insert into withdrawals */
            $insert_deposit = $connectdb->prepare("INSERT INTO withdrawals (user_id, currency, amount) VALUES (:user_id, :currency, :amount)");
            $insert_deposit->bindvalue("user_id", $id);
            $insert_deposit->bindvalue("currency", $currency);
            $insert_deposit->bindvalue("amount", $amount);
            $insert_deposit->execute();

            if($insert_deposit){
                /* generate transaction number */
                $deposit_id = $connectdb->lastInsertId();
                $random = rand(1, 5000);
                $trx_number = "WIT".$random.$id.$deposit_id;
                $update_trx = $connectdb->prepare("UPDATE withdrawals SET trx_number = :trx_number WHERE withdrawal_id = :withdrawal_id");
                $update_trx->bindvalue("trx_number", $trx_number);
                $update_trx->bindvalue("withdrawal_id", $deposit_id);
                $update_trx->execute();

                /* send notification/mail */
                $send_not = $connectdb->prepare("INSERT INTO notifications (user_id, not_subject, not_message) VALUES(:user_id, :not_subject, :not_message)");
                $send_not->bindvalue("user_id", $id);
                $send_not->bindvalue("not_subject", $subject);
                $send_not->bindvalue("not_message", $message);
                $send_not->execute();
                $_SESSION['withdraw'] = "Your withdrawal request was not successfull.";
                header("Location: ../views/users.php");
                // $_SESSION['notification'] = "You have a new message";
            }
        }
    }