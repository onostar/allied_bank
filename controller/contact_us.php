<?php
    include "connections.php";
    session_start();


    // $_SESSION['success'] = "";


    if(isset($_POST['send_message'])){
        $name = ucwords(htmlspecialchars(stripslashes($_POST['full_name'])));
        $email = htmlspecialchars(stripslashes($_POST['email']));
        $message = ucwords(htmlspecialchars(stripslashes($_POST['message'])));

        $send = $connectdb->prepare("INSERT INTO messages (full_name, email, content) VALUES(:full_name, :email, :content)");
        $send->bindvalue("full_name", $name);
        $send->bindvalue("email", $email);
        $send->bindvalue("content", $message);
        $send->execute();

        if($send){
            echo "<script>alert('Thanks for contacting Ippssolar. We will be in touch shortly.');
            window.open('../index.html', '_parent');
            </script>";
            
        }else{
            $_SESSION['error'] = "Failed to send";
        }
    }

?>