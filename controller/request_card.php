<?php
    include "connections.php";
    session_start();
    
    // $_SESSION['success'] ="";
    // $_SESSION['error'] = "";

    if(isset($_POST['get_card'])){
        $id = htmlspecialchars(stripslashes($_POST['card_user_id']));
        $card = htmlspecialchars(stripslashes($_POST['card_type']));
        $subject = "Debit card request";
        $message = "Your debit card request have been received. We will propagate and give you feed back shortly. Thanks";
        
        
            /* insert into cards */
            $insert_deposit = $connectdb->prepare("INSERT INTO cards (user_id, card_type) VALUES (:user_id, :card_type)");
            $insert_deposit->bindvalue("user_id", $id);
            $insert_deposit->bindvalue("card_type", $card);
            $insert_deposit->execute();

            if($insert_deposit){
                /* generate card number */
                $deposit_id = $connectdb->lastInsertId();
                $random = rand(1, 1000000000);
                $card_number = $random.$id.$deposit_id;
                $update_trx = $connectdb->prepare("UPDATE cards SET card_number = :card_number WHERE user_id = :user_id");
                $update_trx->bindvalue("card_number", $card_number);
                $update_trx->bindvalue("user_id", $id);
                $update_trx->execute();

                /* send notification/mail */
                $send_not = $connectdb->prepare("INSERT INTO notifications (user_id, not_subject, not_message) VALUES(:user_id, :not_subject, :not_message)");
                $send_not->bindvalue("user_id", $id);
                $send_not->bindvalue("not_subject", $subject);
                $send_not->bindvalue("not_message", $message);
                $send_not->execute();
                $_SESSION['cards'] = "Your card request was successfull.";
                header("Location: ../views/users.php");
                // $_SESSION['notification'] = "You have a new message";
            }
        
    }