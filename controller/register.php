<?php
    include "connections.php";
    session_start();

    // $_SESSION['success'] = "";
    // $_SESSION['error'] = "";

    if(isset($_POST['register'])){
        $first_name = ucwords(htmlspecialchars(stripslashes($_POST['first_name'])));
        $last_name = ucwords(htmlspecialchars(stripslashes($_POST['last_name'])));
        $email = htmlspecialchars(stripslashes($_POST['user_email']));
        $phone = htmlspecialchars(stripslashes($_POST['phone_number']));
        $referrer = htmlspecialchars(stripslashes($_POST['referrer']));
        $country = htmlspecialchars(stripslashes($_POST['country']));
        $address = ucwords(htmlspecialchars(stripslashes($_POST['user_address'])));
        $account = ucwords(htmlspecialchars(stripslashes($_POST['account_type'])));
        $password = htmlspecialchars(stripslashes($_POST['user_password']));
        $con_password = htmlspecialchars(stripslashes($_POST['con_password']));

        /* check if already exist */
        $check_user = $connectdb->prepare("SELECT * FROM users WHERE user_email = :user_email");
        $check_user->bindvalue("user_email", $email);
        $check_user->execute();

        if($check_user->rowCount() > 0){
            $_SESSION['error'] = "User already Exists!";
            header("Location: ../views/registration.php");
        }else{
            if($password !== $con_password){
                $_SESSION['error'] = "Your password does not match!";
                header("Location: ../views/registration.php");
            }elseif(strlen($password) < 6){
                $_SESSION['error'] = "Your password is too short!";
                header("Location: ../views/registration.php");
            }else{
                /* insert user into users table */
                $insert_user = $connectdb->prepare("INSERT INTO users (first_name, last_name, user_email, account_type, phone_number, country, user_address, referrer, user_password) VALUES (:first_name, :last_name, :user_email, :account_type, :phone_number, :country, :user_address, :referrer, :user_password)");
                $insert_user->bindvalue("first_name", $first_name);
                $insert_user->bindvalue("last_name", $last_name);
                $insert_user->bindvalue("user_email", $email);
                $insert_user->bindvalue("phone_number", $phone);
                $insert_user->bindvalue("referrer", $referrer);
                $insert_user->bindvalue("account_type", $account);
                $insert_user->bindvalue("country", $country);
                $insert_user->bindvalue("user_address", $address);
                $insert_user->bindvalue("user_password", $password);
                $insert_user->execute();

                if($insert_user){
                    /* generate referrer code and account number*/
                    $user_id = $connectdb->lastInsertId();
                    $random_number = rand(0, 500000);
                    $referrer_code = $random_number.$user_id;
                    $cur_date = date("Y");
                    $random_acn = rand(0, 3000);
                    $account_number = $cur_date.$random_acn.$user_id;
                    $update_code = $connectdb->prepare("UPDATE users SET ref_id = :ref_id, account_number = :account_number, plan_id = 1 WHERE user_id = :user_id");
                    $update_code->bindvalue("user_id", $user_id);
                    $update_code->bindvalue("ref_id", $referrer_code);
                    $update_code->bindvalue("account_number", $account_number);
                    $update_code->execute();
                    $_SESSION['user'] = $email;
                    $_SESSION['success_message'] = "Your registration was successful";
                    header("Location: ../views/welcome_page.php");
                }else{
                    $_SESSION['error'] = "Registration failed!";
                    header("Location: ../views/registration.php");
                }
            }
            
        }
    }


?>