<?php
    include "connections.php";
    session_start();

    $sender = ucfirst(htmlspecialchars(stripslashes($_POST['sender'])));
    $recipient = ucfirst(htmlspecialchars(stripslashes($_POST['recipient'])));
    $messages = ucfirst(htmlspecialchars(stripslashes($_POST['messages'])));

    $send = $connectdb->prepare("INSERT INTO chats (sender, recipient, messages) VALUES (:sender, :recipient, :messages)");
    $send->bindvalue("sender", $sender);
    $send->bindvalue("recipient", $recipient);
    $send->bindvalue("messages", $messages);
    $send->execute();
    if($send){
?>

<?php
            $get_chats = $connectdb->prepare("SELECT * FROM chats WHERE sender = :sender OR recipient = :recipient ORDER BY chat_time");
            $get_chats->bindvalue("sender", $sender);
            $get_chats->bindvalue("recipient", $sender);
            $get_chats->execute();
            $chats = $get_chats->fetchAll();
            foreach($chats as $chat):
        ?>
        <div class="main_chats">
            <div class="sender">
                <i class="fas fa-user-tie"></i>
                <p>
                    <?php
                        $get_sender = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                        $get_sender->bindvalue("user_id", $chat->sender);
                        $get_sender->execute();
                        $senders = $get_sender->fetchAll();
                        foreach($senders as $sender){
                            echo $sender->first_name;
                        }
                        if(!$get_sender->rowCount() > 0){
                            echo "Admin";
                        }
                    ?>
                </p>
            </div>
            <p class="chats"><?php echo $chat->messages?><br><span style="color:red; font-size:.rem; float:right"><?php echo date("M jS, h:i", strtotime($chat->chat_time))?></span></p>
        </div>
        <?php endforeach; }?>