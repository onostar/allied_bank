<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    if(isset($_GET['deposit_id'])){
        $deposit_id = $_GET['deposit_id'];
        $insert_deposit = $connectdb->prepare("INSERT INTO deposits (user_id, currency_id, amount, trx_number, plan_id) SELECT user_id, currency_id, amount, trx_number, plan_id FROM deposit_requests WHERE deposit_id = :deposit_id");
        $insert_deposit->bindvalue("deposit_id", $deposit_id);
        $insert_deposit->execute();
        if($insert_deposit){
             /* send message to depositor */
             $new_dep_id = $connectdb->lastInsertId();
             $get_user = $connectdb->prepare("SELECT * FROM deposits WHERE trx_id = :trx_id");
             $get_user->bindvalue("trx_id", $new_dep_id);
             $get_user->execute();
             $users = $get_user->fetchAll();
             foreach($users as $user){
                 $user_id = $user->user_id;
                 $amount = $user->amount;
                 $plan = $user->plan_id;
             }
             $subject = "Deposit Approval";
             $message = "Your deposit of £ $amount has been approved and your account credited. Thanks for banking with us.";
             $send_not = $connectdb->prepare("INSERT INTO notifications (not_subject, not_message, user_id) VALUES(:not_subject, :not_message, :user_id)");
             $send_not->bindvalue("not_subject", $subject);
             $send_not->bindvalue("not_message", $message);
             $send_not->bindvalue("user_id", $user_id);
             $send_not->execute();
             if($send_not){
                $_SESSION['notification'] = "You have a new message";

             }
             /* update user plan */
             $update_plan = $connectdb->prepare("UPDATE users SET plan_id = :plan_id WHERE user_id = :user_id");
             $update_plan->bindvalue("plan_id", $plan);
             $update_plan->bindvalue("user_id", $user_id);
             $update_plan->execute();
            /* delete from deposit request */
            $delete_dep = $connectdb->prepare("DELETE FROM deposit_requests WHERE deposit_id = :deposit_id");
            $delete_dep->bindvalue("deposit_id", $deposit_id);
            $delete_dep->execute();
           

            $_SESSION['success'] = "Deposit Confirmed";
            header("Location: ../views/admin.php");
        }else{
            $_SESSION['error'] = "Deposit failed";
        }
    }
?>