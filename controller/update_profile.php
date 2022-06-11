<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";
    if(isset($_POST['update'])){
        $first_name = ucwords(htmlspecialchars(stripslashes($_POST['first_name'])));
        $last_name = ucwords(htmlspecialchars(stripslashes($_POST['last_name'])));
        $phone = htmlspecialchars(stripslashes($_POST['phone_number']));
        $address = htmlspecialchars(stripslashes($_POST['user_address']));
        $state = ucwords(htmlspecialchars(stripslashes($_POST['country'])));
        $email = htmlspecialchars(stripslashes($_POST['user_email']));
        $user_id = htmlspecialchars(stripslashes($_POST['user_id']));
        /* update profile */
        
        $update_profile = $connectdb->prepare("UPDATE users SET first_name = :first_name, last_name = :last_name, phone_number = :phone_number, user_address = :user_address, country = :country, user_email = :user_email WHERE user_id = :user_id");
        $update_profile->bindvalue("first_name", $first_name);
        $update_profile->bindvalue("last_name", $last_name);
        $update_profile->bindvalue("phone_number", $phone);
        $update_profile->bindvalue("user_address", $address);
        $update_profile->bindvalue("country", $state);
        $update_profile->bindvalue("user_email", $email);
        $update_profile->bindvalue("user_id", $user_id);
        $update_profile->execute();

        if($update_profile){
            $_SESSION['success'] = "Profile updated successfully!";
            header("Location: ../views/users.php");
        }else{
            $_SESSION['error'] = "Update failed";
            header("Location: ../views/users.php");
        }
        
    }else{
        $_SESSION['error'] = "update failed!";
        header("Location: ../views/users.php");

    }
        

    

?>