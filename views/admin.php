<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
        /* get user_id */
        // $get_id = $connectdb->prepare("SELECT user_id FROM users WHERE user_email = 
        // :user_email");
        // $get_id->bindvalue("user_email", $username);
        // $get_id->execute();
        // $user_id = $get_id->fetch();
        // $user = $user_id->user_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="description" content="Allied irish bank is an independent, full-service, investment advisory and consulting firm serving the investing public by providing advice and customized solutions.">
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
    <title>Allied irish Bank | Admin</title>
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
                <a href="admin.php" title="Allied irish bank">
                    <img src="../images/aib_logo.png" alt="Logo" class="img-fluid">
                </a>
            </h1>
            <div class="search" id="admin_search">
                <form class="form-inline" method="POST">
                    <input type="search" name="search_items" placeholder="search members, reg_number, search phone number" id="search_items">
                    <button type="submit" name="searchBtn" id="searchBtn" class="main_searchbtn">Search <i class="fas fa-search"></i></button>
                    <button type="submit" name="searchBtn" id="searchBtn" class="mobilesearchbtn" ><i class="fas fa-search"></i></button>
                </form>
                
            </div>
            <div class="other_menu">
                <a href="#" title="Our Gallery">Admin Portal</a>
            </div>
            <div class="login">
                <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                <div class="login_option">
                    <div>
                        <button id="loginBtn"><a href="../controller/logout.php"><i class="fas fa-power-off"></i>Log out</a></button>
                    </div>    
                </div>
            </div>
            <div class="cart" id="user_data">
                <a href="javascript:void(0);" id="user_name">
                     <span>Hello, Admin</span> 
                    <div class="user_img">
                        <i class="fas fa-user-tie"></i>
                    </div>
                </a>
            </div>
            <div class="menu_icon">
                <a href="javascript:void(0)"><i class="fas fa-bars"></i></a>
            </div>
        </header>
    
        
        <div class="admin_main">
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out </a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Registered users" class="page_navs" data-page="users"><i class="fas fa-users"></i> Users</a></li>
                        <li><a href="javascript:void(0);" class="addMenu" title="Manage currencies"><i class="fas fa-money-check-alt"></i>Currencies <i class="fas fa-chevron-down"></i></a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="Add currencies" class="page_navs" data-page="add_currency"><i class="fas fa-money-check-alt"></i>Add currency</a></li>
                                <li><a href="javascript:void(0);" id="addMenu" title="Currency list and rates" class="page_navs" data-page="currencies"><i class="fas fa-coins"></i>Currency lists</a></li>
                            </ul>
                        </li>
                        
                        
                        <li><a href="javascript:void(0);" id="approveDep" class="page_navs" data-page="approve_deposit"><i class="fas fa-coins"></i>Approve Deposits</a></li>
                        <li><a href="javascript:void(0);" id="approvewithd" class="page_navs" data-page="approve_withdrawals"><i class="fas fa-hand-holding-usd"></i>Approve withdrawals</a></li>
                        <li><a href="javascript:void(0);" id="cardReq" class="page_navs" data-page="card_requests"><i class="fas fa-credit-card"></i>Card Requests</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="deposit_history"><i class="fas fa-bank"></i>Deposit History</a></li>
                        <li><a href="javascript:void(0);" id="addEarnings" class="page_navs" data-page="earnings"><i class="fas fa-coins"></i>Update Earnings</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-secret"></i>Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> <a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a</button>
                    <div class="login_option">
                        <div>
                            <!-- <button id="loginBtn"><a href="../controller/logout.php">Log out <i class="fas fa-power-off"></i></a></button> -->
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="admin.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Registered users" class="page_navs" data-page="users"><i class="fas fa-users"></i> Users</a></li>
                        <li><a href="javascript:void(0);" class="addMenu" title="Manage currencies"><i class="fas fa-money-check-alt"></i>Currencies <i class="fas fa-chevron-down"></i></a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="Add currencies" class="page_navs" data-page="add_currency"><i class="fas fa-money-check-alt"></i>Add currency</a></li>
                                <li><a href="javascript:void(0);" id="addMenu" title="Currency list and rates" class="page_navs" data-page="currencies"><i class="fas fa-coins"></i>Currency lists</a></li>
                            </ul>
                        </li>
                        
                        
                        <li><a href="javascript:void(0);" id="approveDep" class="page_navs" data-page="approve_deposit"><i class="fas fa-coins"></i>Approve Deposits</a></li>
                        <li><a href="javascript:void(0);" id="approvewithd" class="page_navs" data-page="approve_withdrawals"><i class="fas fa-hand-holding-usd"></i>Approve withdrawals</a></li>
                        <li><a href="javascript:void(0);" id="cardReq" class="page_navs" data-page="card_requests"><i class="fas fa-credit-card"></i>Card Requests</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="deposit_history"><i class="fas fa-bank"></i>Deposit History</a></li>
                        <li><a href="javascript:void(0);" id="addEarnings" class="page_navs" data-page="earnings"><i class="fas fa-coins"></i>Update Earnings</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-secret"></i>Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <section id="contents">
                <div class="success_message">
                    <p>
                        <?php
                            if(isset($_SESSION['success'])){
                                echo $_SESSION['success'];
                                unset($_SESSION['success']);
                            }
                        ?>
                    </p>
                </div>
                <div class="error_message">
                    <p>
                        <?php
                            if(isset($_SESSION['error'])){
                                echo $_SESSION['error'];
                                unset($_SESSION['error']);
                            }
                        ?>
                    </p>
                </div>
                <!-- user details -->
                <?php

                    if(isset($_GET['user'])){
                        $get_details = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                        $get_details->bindvalue("user_id", $_GET['user']);
                        $get_details->execute();
                        $details = $get_details->fetchAll();
                        foreach($details as $detail):
                ?>
                <div class="user_details">
                    
                    <h3><?php echo $detail->first_name . " " . $detail->last_name;?></h3>
                    <hr>
                    <div class="name">
                        <p>Balance: <?php
                            $get_wallet = $connectdb->prepare("SELECT SUM(amount) AS total_wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                            $get_wallet->bindvalue("user_id", $detail->user_id);
                            $get_wallet->execute();
                            if(!$get_wallet->rowCount() > 0){
                                echo "£0.00";
                            }else{
                            $wallet = $get_wallet->fetch();
                            echo "£".number_format($wallet->total_wallet).".00";}
                        ?> <i class="fas fa-wallet"></i>
                        </p>
                        <p id="wallet_details">Interest: <?php
                            $get_earnings = $connectdb->prepare("SELECT earnings FROM users WHERE user_id = :user_id");
                            $get_earnings->bindvalue("user_id", $detail->user_id);
                            $get_earnings->execute();
                            if(!$get_earnings->rowCount() > 0){
                                echo "£0.00";
                            }else{
                            $earn = $get_earnings->fetch();
                            echo "£".number_format($earn->earnings, 2, ".");
                        }
                        ?> <a href="javascript:void(0);" title="edit wallet" id="edit_pen"><i class="fas fa-coins"></i></a>
                        </p>

                        <p style="cursor:pointer"onclick="sendDm('<?php echo $detail->user_id?>')">Send Message <i class="fas fa-envelope"></i></p>

                        <p>
                            <i class="fas fa-gem"></i> <?php echo $detail->account_type." Account"?>;
                        </p>
                    </div>
                    <div class="user_address">
                        <p><?php echo $detail->user_address?></p>
                        <p><?php echo $detail->country?></p>
                    </div>
                    <div class="other_info">
                        <h3>Currencies</h3>
                        <div class="assets">
                            <?php
                                $get_asset = $connectdb->prepare("SELECT user_id, currency_id, SUM(amount) AS total_sum FROM deposits WHERE user_id = :user_id GROUP BY currency_id");
                                $get_asset->bindvalue("user_id", $detail->user_id);
                                $get_asset->execute();
                                $assets = $get_asset->fetchAll();
                                foreach($assets as $asset):
                            ?>
                            <div class="asset_cards">
                                <?php 
                                    $get_cur = $connectdb->prepare("SELECT * FROM currencies WHERE currency_id = :currency_id");
                                    $get_cur->bindvalue("currency_id", $asset->currency_id);
                                    $get_cur->execute();
                                    $moneys = $get_cur->fetchAll();
                                    foreach($moneys as $money):
                                ?>
                                <p><?php echo $money->currency?></p>
                                <div class="asset_info">
                                    <p>
                                        <?php
                                            /* if($money->currency === "Ethereum"){
                                                echo "<i class='fas fa-ethereum></i>";
                                            }elseif($money->currency === "Bitcoin"){
                                                echo "<i class='fas fa-bitcoin></i>"; 
                                            }else{
                                                echo "<i class='fas fa-gg-circle></i>";
                                            } */
                                        ?>
                                        <i class="fab fa-gg-circle"></i>
                                    </p>
                                    <p><?php echo number_format($asset->total_sum * $money->dollar_rate, 2, '.')?></p>
                                </div>
                                
                                <?php endforeach?>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <?php 
                            if(!$get_asset->rowCount() > 0){
                                echo "<p id='no_money' class='not_found'>You have no asset!</p>";
                            }
                        ?>
                    
                    </div>
                    <!-- referral list -->
                    <div class="allResults" id="user_referrals">
                    <p id="ref_id">referral_id: <?php echo $detail->ref_id; ?></p>
                    <h2>referrals</h2>
                            
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Full Name</td>
                                    <td>Date registered</td>
                                    <td>Earnings</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM users WHERE referrer = :referrer ORDER BY reg_date");
                                    $get_all->bindvalue("referrer", $detail->ref_id);
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    
                                    <td><a href="javascript:void(0)" title="click to view user details" onclick="showUser('<?php echo $all->user_id?>')"><?php echo $all->first_name." ".$all->last_name?></a></td>
                                    <td><?php echo date("jS M, Y", strtotime($all->reg_date))?></td>
                                    <td>
                                    <?php
                                        $get_ref_earn = $connectdb->prepare("SELECT SUM(amount) AS earnings FROM deposits WHERE user_id = :user_id");
                                        $get_ref_earn->bindvalue("user_id", $all->user_id);
                                        $get_ref_earn->execute();
                                        if(!$get_ref_earn->rowCount() > 0){
                                            echo "No Deposit";
                                        }else{
                                            $earnings = $get_ref_earn->fetch();
                                            $earning = $earnings->earnings * (10/100);
                                        echo "£ ".number_format($earning, 2, '.');
                                        }
                                        

                                    ?>
                                </td>
                                </tr>
                                <?php 
                                    $n++;
                                    endforeach;   
                                ?>

                            </tbody>
                            
                        </table>
                        <div class="ref_total">
                            <?php
                                $get_all_ref = $connectdb->prepare("SELECT users.ref_id, users.referrer, users.user_id, deposits.user_id, SUM(deposits.amount * (10/100)) AS total_ref FROM users, deposits WHERE users.referrer = :referrer AND users.user_id = deposits.user_id");
                                $get_all_ref->bindvalue("referrer", $detail->ref_id);
                                $get_all_ref->execute();
                                $all_earns = $get_all_ref->fetchAll();
                                foreach($all_earns as $all_earn){
                                    
                                    echo "<p style='text-align:center; padding:10px; font-weight:bold; font-size:1rem;'>Total Earnings: £".number_format($all_earn->total_ref, 2, '.')."</p>";
                                }
                            ?>
                        </div>
                        <?php
                            if(!$get_all->rowCount() > 0){
                                echo "<p class='not_found'>You have no referrals!</p>";
                            } 
                        ?>
                    </div>
                </div>
                <?php 
                    endforeach;
                }  
                ?>
                <div id="dashboard">
                    
                    <div class="cards" id="card1">
                        <a href="javascript:void(0)" data-page="deposit_history" class="page_navs">
                            <p>Todays Deposits</p>
                            <div class="infos">
                                <i class="fas fa-money-check"></i>
                                <?php
                                    $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE date(deposit_date) = CURDATE() LIMIT 10");
                                    
                                    $get_deposit->execute();
                                    
                                    
                                ?>
                                <p>
                                    <?php
                                        
                                        if(!$get_deposit->rowCount() > 0){
                                            echo "£ 0.00";
                                        }else{
                                            $stat = $get_deposit->fetch();
                                            echo "£ ".number_format($stat->wallet, 2, ".");
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card3">
                        <a href="javascript:void(0)">
                            <p>Wiithdrawals</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <p>
                                    <?php
                                        $get_withdr = $connectdb->prepare("SELECT SUM(amount) AS total_withdrawal FROM withdrawals WHERE date(withdrawal_date) = CURDATE() AND withdrawal_status = 1");
                                        $get_withdr->execute();
                                        if(!$get_withdr->rowCount() > 0){
                                            echo "£ 0.00";
                                        }else{
                                            $amount = $get_withdr->fetch();
                                            echo number_format($amount->total_withdrawal, 2, ".");
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card0">
                        <a href="javascript:void(0)" class="page_navs" data-page="approve_withdrawals">
                            <p>Withdrawal Request</p>
                            <div class="infos">
                                <i class="fas fa-spinner"></i>
                                <p>
                                    <?php
                                        $get_with_stat = $connectdb->prepare("SELECT withdrawal_status FROM withdrawals WHERE withdrawal_status = 0");
                                        
                                        $get_with_stat->execute();
                                        if(!$get_with_stat->rowCount() > 0){
                                            echo "No request";
                                        }else{
                                            echo $get_with_stat->rowCount();
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card2">
                        <a href="javascript:void(0)" class="page_navs" data-page="users">
                            <p>Users</p>
                            <div class="infos">
                                <i class="fas fa-users"></i>
                                <p>
                                    <?php
                                        $get_users = $connectdb->prepare("SELECT * FROM users  WHERE user_email != 'admin'");
                                        
                                        $get_users->execute();
                                        if(!$get_users->rowCount() > 0){
                                            echo "No user";
                                        }else{
                                            echo $get_users->rowCount();
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card4">
                        <a href="javascript:void(0)" data-page="approve_deposit" class="page_navs">
                            <p>Deposit requests</p>
                            <div class="infos">
                                <i class="fas fa-wallet"></i>
                                <p>
                                    <?php
                                        $get_dep = $connectdb->prepare("SELECT * FROM deposit_requests");
                                        
                                        $get_dep->execute();
                                        if(!$get_dep->rowCount() > 0){
                                            echo "No requests";
                                        }else{
                                            echo $get_dep->rowCount();
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card5">
                        <a href="javascript:void(0)" data-page="card_requests" class="page_navs">
                            <p>Card requests</p>
                            <div class="infos">
                                <i class="fas fa-credit-card"></i>
                                <p>
                                    <?php
                                        $get_dep = $connectdb->prepare("SELECT * FROM cards WHERE card_status = 0");
                                        
                                        $get_dep->execute();
                                        if(!$get_dep->rowCount() > 0){
                                            echo "No requests";
                                        }else{
                                            echo $get_dep->rowCount();
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                   
                </div>
                <div class="summary_reports">
                    <div class="allResults displays" id="allMembers">
                        <h2>Deposits today</h2>
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Client</td>
                                    <td>Amount</td>
                                    <td>Currency</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM deposits WHERE date(deposit_date) = CURDATE() ORDER BY deposit_date");
                                    
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php 
                                        $get_user = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_user->bindvalue("user_id", $all->user_id);
                                        $get_user->execute();
                                        $names = $get_user->fetchAll();
                                        foreach($names as $name){
                                            echo $name->first_name. " ".$name->last_name;
                                        }
                                    ?></td>
                                    <td><?php echo "$ ".number_format($all->amount);?></td>
                                    <td><?php 
                                    $get_currency = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                    $get_currency->bindvalue("currency_id", $all->currency_id);
                                    $get_currency->execute();
                                    $curr = $get_currency->fetch();
                                    echo $curr->currency;?></td>
                                </tr>
                                <?php 
                                    $n++;
                                    endforeach;   
                                ?>

                            </tbody>
                            
                        </table>
                        <?php
                            if(!$get_all->rowCount() > 0){
                                echo "<p class='not_found'>No Deposit yet!</p>";
                            } 
                        ?>
                    </div>
                    <div class="allResults displays" id="AllWithdrawal">
                        <h2>Todays withdrawals</h2>
                        
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Client</td>
                                    <td>Amount</td>
                                    <td>Currency</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM withdrawals WHERE date(withdrawal_date) = CURDATE() AND withdrawal_status = 1 ORDER BY withdrawal_date");
                                    
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td>
                                    <?php 
                                        $get_user = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_user->bindvalue("user_id", $all->user_id);
                                        $get_user->execute();
                                        $names = $get_user->fetchAll();
                                        foreach($names as $name){
                                            echo $name->first_name. " ".$name->last_name;
                                        }
                                    ?></td>
                                    <td><?php echo "$ ".number_format($all->amount);?></td>
                                    <td><?php $get_currency = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                    $get_currency->bindvalue("currency_id", $all->currency);
                                    $get_currency->execute();
                                    $curr = $get_currency->fetch();
                                    echo $curr->currency;?></td>
                                </tr>
                                <?php 
                                    $n++; endforeach;   
                                ?>

                            </tbody>
                            
                        </table>
                        <?php
                            if(!$get_all->rowCount() > 0){
                                echo "<p class='not_found'>No withdrawal yet!</p>";
                            } 
                        ?>
                    </div>
                </div>
                <!-- All users -->
                <div class="management" id="users">
                    <h2>Clients list</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchUsers" placeholder="Enter keyword">
                    </div>
                    <table id="user_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Client</td>
                                <td>Phone</td>
                                <td>Email</td>
                                <td>Account No.</td>
                                <td>Password</td>
                                <td>Adress</td>
                                <td>Country</td>
                                <td>Referred by</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM users WHERE user_email != 'admin' ORDER BY reg_date DESC");
                                
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            
                            <tr>
                            
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td>
                                <a href="javascript:void(0)" title="click to view user details" onclick="showUser('<?php echo $all->user_id?>')">
                                    <?php echo
                                    $all->first_name. " ".$all->last_name;
                                    
                                ?></a></td>
                                <td><?php echo $all->phone_number;?></td>
                                <td><?php echo $all->user_email;?></td>
                                <td><?php echo $all->account_number;?></td>
                                <td><?php echo $all->user_password;?></td>
                                <td><?php echo $all->user_address;?></td>
                                <td><?php echo $all->country?></td>
                                <td><?php 
                                    $get_ref = $connectdb->prepare("SELECT * FROM users WHERE ref_id = :ref_id");
                                    $get_ref->bindvalue("ref_id", $all->referrer);
                                    $get_ref->execute();
                                    if(!$get_ref->rowCount() > 0){
                                        echo "Self";
                                    }else{
                                        $refs = $get_ref->fetchAll();
                                        foreach($refs as $ref){
                                            echo $ref->first_name. " " . $ref->last_name;
                                        }
                                    }
                                    
                                    
                                ?></td>
                            
                            </tr>
                            
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No result!</p>";
                        } 
                    ?>
                </div>
                <!-- add currency -->
                <div id="add_currency" class="displays management">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Add currency with exchange rate</h3>
                        <form method="POST"  id="addCatForm" action="../controller/add_currency.php">
                            
                            <div class="inputs">
                                <div class="data">
                                    <label for="currency">Enter currency name</label>
                                    <input type="text" name="currency" id="currency">
                                </div>
                                <div class="data">
                                    <label for="rate">Enter exchange rate (£)</label>
                                    <input type="number" name="dollar_rate" id="dollar_rate">
                                </div>
                                
                                <button type="submit" id="addCurrency" name="addCurrency">Add currency <i class="fas fa-money-check"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- currency list -->
                <div class="management" id="currencies">
                    <h2>Currencies and rates</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchCurrency" placeholder="Enter keyword">
                    </div>
                    <table id="cur_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Currency</td>
                                <td>Exchange rate (£)</td>
                                
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM currencies ORDER BY dollar_rate DESC");
                                
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            
                            <tr>
                            
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                
                                
                                <td><?php echo $all->currency;?></td>
                                <td class="prices">
                                <a href="javascript:void(0)" data-form="check<?php echo $all->currency_id?>" class="each_prices"><?php echo $all->dollar_rate;?></a>
                                <form method="POST" id="check<?php echo $all->currency_id?>" class="priceForm" action="../controller/update_rate.php">
                                    <input type="hidden" name="item_id" id="item_id" value="<?php echo $all->currency_id?>">
                                    <input type="text" name="item_prize" id="item_prize" title="Click to edit price" value="<?php echo $all->dollar_rate;?>"><button type="submit" name="change_prize" id="changePrize" class="changePrizes"><i class="fas fa-check"></i></button>
                                    <a href="javascript:void(0)" class="closeForm"><i class="fas fa-window-close"></i></a>
                                </form>
                            </td>
                                
                            
                            </tr>
                            
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No result!</p>";
                        } 
                    ?>
                </div>
                <!-- Approve deposits list -->
                <div class="management" id="approve_deposit">
                    
                    <h2>Confirm deposits</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchApp" placeholder="Enter keyword">
                    </div>
                    <table id="app_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Client</td>
                                <td>Country</td>
                                <td>Amount (£)</td>
                                <td>Currency</td>
                                <td>Value</td>
                                <td>Trx_Number</td>
                                <td>Date</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM deposit_requests ORDER BY deposit_req_date");
                                
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            
                            <tr>
                            
                                <td><button><a style="text-align:center; color:red; padding:5px;" href="javascript:void(0)" title="Approve payment" onclick="approveDeposit('<?php echo $all->deposit_id;?>')"><?php echo $n?></a></button></td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $usernames = $get_user_dep->fetchAll();
                                        foreach($usernames as $username){
                                            echo $username->first_name. " ". $username->last_name;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT country FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $username = $get_user_dep->fetch();
                                        echo $username->country;
                                    ?>
                                </td>
                                <td><?php echo "£".number_format($all->amount)?></td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                        $get_user_dep->bindvalue("currency_id", $all->currency_id);
                                        $get_user_dep->execute();
                                        $currencies = $get_user_dep->fetch();
                                        echo $currencies->currency;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
                                        $get_rate->bindvalue("currency_id", $all->currency_id);
                                        $get_rate->execute();
                                        $rates = $get_rate->fetch();
                                        $rate = $rates->dollar_rate;

                                        $value = $all->amount * $rate;
                                        echo $value;
                                    ?>
                                </td>
                                <td><?php echo $all->trx_number?></td>
                                <td><?php echo date("jS M, Y", strtotime($all->deposit_req_date))?></td>
                            </tr>
                            
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No record found!</p>";
                        } 
                    ?>
                </div>
                <!-- Approve withdrawals list -->
                <div class="management" id="approve_withdrawals">
                    
                    <h2>Confirm withdrawals</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchWith" placeholder="Enter keyword">
                    </div>
                    <table id="with_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Client</td>
                                <td>Country</td>
                                <td>Amount (£)</td>
                                <td>Currency</td>
                                <td>Value</td>
                                <td>Trx_Number</td>
                                <td>Date</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM withdrawals ORDER BY withdrawal_date");
                                
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            
                            <tr>
                            
                                <td><button><a style="text-align:center; color:red; padding:5px;" href="javascript:void(0)" title="Show User" onclick="showUser('<?php echo $all->user_id;?>')"><?php echo $n?></a></button></td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $usernames = $get_user_dep->fetchAll();
                                        foreach($usernames as $username){
                                            echo $username->first_name. " ". $username->last_name;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT country FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $username = $get_user_dep->fetch();
                                        echo $username->country;
                                    ?>
                                </td>
                                <td><?php echo "£".number_format($all->amount)?></td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                        $get_user_dep->bindvalue("currency_id", $all->currency);
                                        $get_user_dep->execute();
                                        $currencies = $get_user_dep->fetch();
                                        echo $currencies->currency;
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
                                        $get_rate->bindvalue("currency_id", $all->currency);
                                        $get_rate->execute();
                                        $rates = $get_rate->fetch();
                                        $rate = $rates->dollar_rate;

                                        $value = $all->amount * $rate;
                                        echo $value;
                                    ?>
                                </td>
                                <td><?php echo $all->trx_number?></td>
                                <td><?php echo date("jS M, Y", strtotime($all->withdrawal_date))?></td>
                            </tr>
                            
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No record found!</p>";
                        } 
                    ?>
                </div>
                <!-- Approve card requests -->
                <div class="management" id="card_requests">
                    
                    <h2>Confirm Card Requests</h2>
                    <hr>
                    <div class="search">
                        <input type="search" id="searchCard" placeholder="Enter keyword">
                    </div>
                    <table id="card_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Client</td>
                                <td>Country</td>
                                <td>Card type</td>
                                <td>Request Date</td>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM cards ORDER BY request_date");
                                
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            
                            <tr>
                            
                                <td><button><a style="text-align:center; color:red; padding:5px;" href="javascript:void(0)" title="Approve card" onclick="approveCard('<?php echo $all->card_id;?>')"><?php echo $n?></a></button></td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $usernames = $get_user_dep->fetchAll();
                                        foreach($usernames as $username){
                                            echo $username->first_name. " ". $username->last_name;
                                        }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                        $get_user_dep = $connectdb->prepare("SELECT country FROM users WHERE user_id = :user_id");
                                        $get_user_dep->bindvalue("user_id", $all->user_id);
                                        $get_user_dep->execute();
                                        $username = $get_user_dep->fetch();
                                        echo $username->country;
                                    ?>
                                </td>
                                <td><?php echo $all->card_type?></td>
                                
                                
                                <td><?php echo date("jS M, Y", strtotime($all->request_date))?></td>
                            </tr>
                            
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No record found!</p>";
                        } 
                    ?>
                </div>
                <!-- deposit history -->
                <div class="management" id="deposit_history">
                    <div class="search_deposit">
                        <h3>Select date</h3>
                        <form action="" method="POST">
                            <div class="views">
                                <div class="date_range">
                                    <label for="from">Pick a date (from)</label><br>
                                    <input type="date" name="from" id="from">
                                </div>
                                <div class="date_range">
                                    <label for="to">Pick a date (to)</label><br>
                                    <input type="date" name="to" id="to">
                                </div>
                            </div>
                            
                            <button type="submit" name="search_date" id="search_date">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="current_search">
                        <h2>Deposits for today</h2>
                        <hr>
                        <div class="search">
                            <input type="search" id="searchDep" placeholder="Enter keyword">
                        </div>
                        <table id="dep_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Client</td>
                                    <td>Country</td>
                                    <td>Amount (£)</td>
                                    <td>Currency</td>
                                    <td>Value</td>
                                    <td>Trx_Number</td>
                                    <td>Date</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM deposits WHERE date(deposit_date) = CURDATE() ORDER BY deposit_date");
                                    
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                
                                <tr>
                                
                                    <td style="text-align:center; color:red;"><?php echo $n?></td>
                                    <td>
                                        <?php
                                            $get_user_dep = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                            $get_user_dep->bindvalue("user_id", $all->user_id);
                                            $get_user_dep->execute();
                                            $usernames = $get_user_dep->fetchAll();
                                            foreach($usernames as $username){
                                                echo $username->first_name. " ". $username->last_name;
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $get_user_dep = $connectdb->prepare("SELECT country FROM users WHERE user_id = :user_id");
                                            $get_user_dep->bindvalue("user_id", $all->user_id);
                                            $get_user_dep->execute();
                                            $username = $get_user_dep->fetch();
                                            echo $username->country;
                                        ?>
                                    </td>
                                    <td><?php echo "$".number_format($all->amount, 2, ".")?></td>
                                    <td>
                                        <?php
                                            $get_user_dep = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                            $get_user_dep->bindvalue("currency_id", $all->currency_id);
                                            $get_user_dep->execute();
                                            $currencies = $get_user_dep->fetch();
                                            echo $currencies->currency;
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
                                            $get_rate->bindvalue("currency_id", $all->currency_id);
                                            $get_rate->execute();
                                            $rates = $get_rate->fetch();
                                            $rate = $rates->dollar_rate;

                                            $value = $all->amount * $rate;
                                            echo $value;
                                        ?>
                                    </td>
                                    <td><?php echo $all->trx_number?></td>
                                    <td><?php echo date("jS M, Y", strtotime($all->deposit_date))?></td>
                                </tr>
                                
                                <?php 
                                    $n++;
                                    endforeach;   
                                ?>

                            </tbody>
                            
                        </table>
                        <?php
                            if(!$get_all->rowCount() > 0){
                                echo "<p class='not_found'>No record found!</p>";
                            } 
                        ?>
                    </div>
                    
                </div>
                
                <!-- update earnings -->
                <div class="management displays" id="earnings">
                    <div class="info"></div>
                    <div class="add_user_form">
                        <h3>Update user earnings</h3>
                        <form>
                            <div class="inputs">
                                <div class="data">
                                    <label for="user_earn">Client</label>
                                    <select name="user_earn" id="user_earn">
                                        <option value=""selected>Select client</option>
                                        <?php
                                            $get_clients = $connectdb->prepare("SELECT * FROM users WHERE user_email != 'Admin@recovolt.com' ORDER BY reg_date");
                                            $get_clients->execute();
                                            $clients = $get_clients->fetchAll();
                                            foreach($clients as $client):
                                        ?>
                                        <option value="<?php echo $client->user_id?>"><?php echo $client->first_name. " ". $client->last_name?></option>
                                        <?php endforeach?>
                                    </select>
                                </div>
                                <div class="data">
                                    <label for="earning">Earnings (£)</label>
                                    <div class="earning_val">
                                        <input type="number" name="user_earning" id="user_earning">
                                    </div>
                                    
                                </div>
                                <button type="submit" name="update_earnings" id="update_earnings"> Update earning <i class="fas fa-coins"></i></button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </section>

        </div>
        
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
                    
                    
                    <div id="chat2">
                        <?php
                            $get_chats = $connectdb->prepare("SELECT * FROM chats ORDER BY chat_time");
                            $get_chats->execute();
                            $chats = $get_chats->fetchAll();
                            foreach($chats as $chat):
                        ?>
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                
                                <p><a href="javascript:void(0)" title="Send private message" onclick="sendDm('<?php echo $chat->sender?>')">
                                    <?php
                                        $get_sender = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id");
                                        $get_sender->bindvalue("user_id", $chat->sender);
                                        $get_sender->execute();
                                        $senders = $get_sender->fetchAll();
                                        foreach($senders as $sender){
                                            echo $sender->first_name. " ". $sender->last_name;
                                        }
                                        if(!$get_sender->rowCount() > 0){
                                            echo "Admin";
                                        }
                                    ?>
                                    </a>
                                </p>
                            </div>
                            <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238);; font-size:.rem; float:right"><?php echo date("M jS, h:i", strtotime($chat->chat_time))?></span></p>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                
                 <!-- <form action="" method="POST" id="chat_box">
                    <input type="text" name="messages" id="messages" placeholder="Type your message here">
                    <input type="hidden" name="recipient" id="recipient"value="admin">
                    <input type="hidden" name="sender" id="sender" value="Admin">
                    <button type="submit" id="submit_chat" name="submit_chat" title="Send"><i class="fas fa-paper-plane"></i></button>
                 </form> -->   
                    
                
            </div>
        </div>

        <script src="../jquery.js"></script>
    <script src="../script.js"></script>
    <!-- refresh chat section and scroll chat page to bottom -->
    <script>
        setInterval(function() {
            $("#chat2").load("admin.php #chat2");
            let d = $(".all_chat");
            d.scrollTop(d.prop("scrollHeight"));
        }, 3000);
        
    </script>
</body>
</html>

<?php 
                
    }else{
        header("Location: ../index.html");
    }
?>