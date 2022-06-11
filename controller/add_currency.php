<?php

include "connections.php";
session_start();

$currency = ucwords(htmlspecialchars(stripslashes($_POST['currency'])));
$rate = htmlspecialchars(stripslashes($_POST['dollar_rate']));

/* check if currencey already exists */
$check_cur = $connectdb->prepare("SELECT * FROM currencies WHERE currency = :currency");
$check_cur->bindvalue("currency", $currency);
$check_cur->execute();
if($check_cur->rowCount() > 0){
    echo "<p class='exist'><span> ".$currency."</span> already exists!</p>";
}else{
    $insert_cur = $connectdb->prepare("INSERT INTO currencies (currency, dollar_rate) VALUES(:currency, :dollar_rate)");
    $insert_cur->bindvalue("currency", $currency);
    $insert_cur->bindvalue("dollar_rate", $rate);
    $insert_cur->execute();
    if($insert_cur){
        echo "<p><span>".$currency. "</span> added successfully!</p>";
    }else{
        echo "failed to add";
    }
}
?>