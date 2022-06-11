<?php
    include "connections.php";
    session_start();

    $_SESSION['success'] = "";
    $_SESSION['error'] = "";

    // if(isset($_POST['update_earn'])){
        $user_id = $_POST['user_earn'];
        $earning = $_POST['user_earning'];

        $update = $connectdb->prepare("UPDATE users SET earnings = :earnings WHERE user_id = :user_id");
        $update->bindvalue("user_id", $user_id);
        $update->bindvalue("earnings", $earning);
        $update->execute();

        if($update){
            echo "<p>User earning updated Successfully!</p>";
        }else{
            echo "<p>User earning update failed!</p>";

        }
    // }

?>