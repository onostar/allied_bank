<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE user_email = :user_email");
    $user_details->bindvalue("user_email", $username);
    $user_details->execute();

    $users = $user_details->fetchAll();
    foreach($users as $user):
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Irish ALlied Bank is an independent, full-service, investment advisory and consulting firm serving the investing public by providing advice and customized solutions.">
    <meta name="keyword" content="Allied irish bank, banking, money, investment, loan, banks, irish" />
	<meta name="author" content=""/>
	<meta name="og:url" property="og:url" content="https://">
    <meta name="og:type "property="og:type" content="website">
    <meta name="og:title" property="og:title" content="" />
    <meta name="og:site_name" property="og:site_name" content="" />
    <meta name="og:description" property="og:description" content="Irish Allied bank is an independent, full-service, investment advisory and consulting firm serving the investing public by providing advice and customized solutions.">
    <meta name="og:image" property="og:image" itemprop="image" content="images/aib_logo.png">
    <meta property="og:image:width" content="300" />
    <meta property="og:image:height" content="300" />
    <title>Irish Allied Bank | <?php echo $user->first_name. " ". $user->last_name?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.css">
    <link rel="stylesheet" href="../fontawesome-free-6.0.0-web/css/all.min.css">
    
    <link rel="icon" href="../images/aib_logo.png" type="image/png" size="32X32">
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <!-- <div class="loader">
        <img src="images/psn_logo.jpg" alt="PSN">
        <h2>Welcome to PSN national Conference registration</h2>
    </div> -->
    <main>
        
        <header>
            <h1 class="logo">
                <a href="users.php" title="Irish ALlied Bank">
                    <img src="../images/aib_logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <!-- <div class="search">
                <form class="form-inline" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number" id="search_items">
                    <button type="submit" name="searchBtn" id="searchBtn" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="searchBtn" id="searchBtn" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div> -->
            <h2>Management portal</h2>
            <div class="other_menu" id="other">
                <a href="#" title="Our Gallery">user</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="fas fa-user-tie"></i> <?php echo $user->last_name . " " . $user->first_name;?> <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php"><i class="fas fa-power-off"></i>Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" title="notifications">
                    <div class="user_img" id="user_not">
                        <p id="nots"><a class="page_navs" data-page="notifications" shref="javascript:void(0)" title="view notifications"> <i class="fas fa-bell"></i><span><?php $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND not_status = 0");
                        $get_not->bindvalue("user_id", $user->user_id);
                        $get_not->execute();
                        echo $get_not->rowCount();
                        ?></span></a></p>
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    
        <?php
            if(isset($_GET{'message'})){
                $not_id = $_GET['message'];
            /* update status */
            $update_not = $connectdb->prepare("UPDATE notifications SET not_status = 1 WHERE notification_id = :notification_id");
            $update_not->bindvalue("notification_id", $not_id);
            $update_not->execute();
            $get_message = $connectdb->prepare("SELECT * FROM notifications WHERE notification_id = :notification_id");
            $get_message->bindvalue("notification_id", $not_id);
            $get_message->execute();
            $messages = $get_message->fetchAll();
            foreach($messages as $message):
        ?>
        <div class="message_det">
            <h3><?php echo $message->not_subject?></h3>
            <p><?php echo $message->not_message?></p>
            <a id="go_back" href="javascript:void(0)" onclick="window.close()" title="go back">Go back <i class="fas fa-angle-double-left"></i></a>
            <div class="clear"></div>
        </div>
            

            <?php 
                endforeach;
            }
            ?>
            
        
    </main>
    <div id="chat">
            <div class="chat_icon" title="Live chat">
                <p class="live_box">Start Live Chat <i class="fas fa-comments"></i></p> 
            </div>
            <div class="chat_close" title="Close chat">
                <p class="live_box">Close Live Chat <i class="fas fa-comment-slash"></i></p> 
            </div>
            <div class="chat_message">
                <h2>Live Chat <i class="far fa-comment"></i></h2>
                <div class="all_chat">
                    <div id="chat1">
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                <p>Agent</p>
                            </div>
                            <p class="chats">This is customer service<br> Welcome to Irish Allied Bank. We ar e a world Financial Institution. How may we be of service today?</p>
                            
                        </div>
                    </div>
                    
                    <div id="chat2">
                        <?php
                            $get_chats = $connectdb->prepare("SELECT * FROM chats WHERE sender = :sender OR recipient = :recipient ORDER BY chat_time");
                            $get_chats->bindvalue("sender", $user->user_id);
                            $get_chats->bindvalue("recipient", $user->user_id);
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
                            <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238); font-size:.rem; float:right"><?php echo date("M jS, h:i", strtotime($chat->chat_time))?></span></p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                
                 <form action="" method="POST" id="chat_box">
                    <input type="text" name="messages" id="messages" placeholder="Type your message here">
                    <input type="hidden" name="recipient" id="recipient"value="admin">
                    <input type="hidden" name="sender" id="sender" value="<?php echo $user->user_id?>">
                    <button type="submit" id="submit_chat" name="submit_chat" title="Send"><i class="fas fa-paper-plane"></i></button>
                 </form>   
                    
                
            </div>
        </div>
    <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <script>
        setInterval(function() {
            $("#chat2").load("notifications.php #chat2");
            let d = $(".all_chat");
            d.scrollTop(d.prop("scrollHeight"));
        }, 3000);
        
    </script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: ../index.html");
    }
?>