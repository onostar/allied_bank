<?php
        include "connections.php";
        session_start();

    if(isset($_POST['update_passport'])){
        
       
        $username = htmlspecialchars(stripslashes($_POST['user_id']));
        
        $passport = $_FILES['passport']['name'];
        /* $tempname = $_FILES['contact_passport']['tmp_name'];  */
        $folder = "../passports/".$passport;
               
        
            if(move_uploaded_file($_FILES['passport']['tmp_name'], $folder)){
            $user_input = $connectdb->prepare("UPDATE users SET passport = :passport WHERE user_id = :user_id");
            $user_input->bindvalue('user_id', $username);
            $user_input->bindvalue('passport', $passport);
            $user_input->execute();
            if(!$user_input){
                echo "user not created";
            }else{
                    $_SESSION['success'] = "Passport updated";   
                header("Location: ../views/users.php");
                }
            }else{
                $_SESSION['error'] = "Passport not accepted!";
                header("Location: ../views/users.php");
            }
        }
       
    
            