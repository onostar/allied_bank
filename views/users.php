<?php
    session_start();
    require "../controller/connections.php";
    if(isset($_SESSION['user'])){
        $username = $_SESSION['user'];
    
    $user_details = $connectdb->prepare("SELECT * FROM users WHERE user_email = :user_email || account_number = :account_number");
    $user_details->bindvalue("user_email", $username);
    $user_details->bindvalue("account_number", $username);
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
            <h2>Account management</h2>
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
                        <p id="nots"><a class="page_navs" data-page="notifications" href="javascript:void(0)" title="view notifications"> <i class="fas fa-bell"></i><span><?php $get_not = $connectdb->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND not_status = 0");
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
    
        
        <div class="admin_main">
            <aside class="main_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><i class="far fa-user"></i> Account <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php">Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="users.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Deposit funds" class="page_navs" data-page="invest"><i class="fas fa-coins"></i>Deposit </a></li>
                        <li><a href="javascript:void(0);" id="addMenu" title="Withdraw from account" class="page_navs" data-page="withdrawal"><i class="fas fa-money-check-alt"></i>Withdrawal</a></li>
                        
                        <li><a href="javascript:void(0);" class="addMenu" title="Manage Loans"><i class="fas fa-bank"></i>Loans <i style="float:right"class="fas fa-chevron-down"></i></a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="apply for loan" class="page_navs" data-page="loan_request"><i class="fas fa-money-check-alt"></i>Apply for loan</a></li>
                                <li><a href="javascript:void(0);" id="addMenu" title="Loan status and history" class="page_navs" data-page="loan_history"><i class="fas fa-coins"></i>Loan history</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="assets" title="my commodities"><i class="fas fa-money-check"></i>My Currencies</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="referrals"><i class="fas fa-users"></i>Rewards & Referals</a></li>
                        <li><a href="javascript:void(0);" title="Transfer money to other banks" id="transfer" class="page_navs" data-page="transfers"><i class="fas fa-hand-holding-usd"></i>Bank Transfers</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="deposit_history"><i class="fas fa-money-check-alt"></i>Transaction History</a></li>
                        <li><a href="javascript:void(0);" id="creditcard" class="page_navs" data-page="debit_card"><i class="fas fa-credit-card"></i>Debit cards</a></li>
                        <li><a href="javascript:void(0);" id="updateUser" class="page_navs" data-page="profile"><i class="fas fa-user-secret"></i>Update Profile</a></li>
                    </ul>
                </nav>
            </aside>
            <aside class="mobile_menu" id="mobile_log">
                <div class="login">
                    <button id="loginDiv"><img src="<?php echo "../passports/".$user->passport?>" alt="passport"> <?php echo "Hi, ".$user->last_name . " " . $user->first_name;?> <i class="fas fa-chevron-down"></i></button>
                    <div class="login_option">
                        <div>
                            <button id="loginBtn"><a href="../controller/logout.php"><i class="fas fa-power-off"></i>Log out</a></button>
                            
                        </div>
                    </div>
                </div>
                <nav>
                    <h3><a href="users.php" title="Home"><i class="fas fa-home"></i> Dashboard</a></h3>
                    <ul>        
                        <li><a href="javascript:void(0);" id="addCat" title="Deposit funds" class="page_navs" data-page="invest"><i class="fas fa-coins"></i>Deposit </a></li>
                        <li><a href="javascript:void(0);" id="addMenu" title="Withdraw from account" class="page_navs" data-page="withdrawal"><i class="fas fa-money-check-alt"></i>Withdrawal</a></li>
                        
                        <li><a href="javascript:void(0);" class="addMenu" title="Manage Loans"><i class="fas fa-bank"></i>Loans <i style="float:right"class="fas fa-chevron-down"></i></a>
                            <ul class="nav2Menu">
                                <li><a href="javascript:void(0);" id="addMenu" title="apply for loan" class="page_navs" data-page="loan_request"><i class="fas fa-money-check-alt"></i>Apply for loan</a></li>
                                <li><a href="javascript:void(0);" id="addMenu" title="Loan status and history" class="page_navs" data-page="loan_history"><i class="fas fa-coins"></i>Loan history</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="assets" title="my commodities"><i class="fas fa-money-check"></i>My Currencies</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="referrals"><i class="fas fa-users"></i>Rewards & Referals</a></li>
                        <li><a href="javascript:void(0);" title="Transfer money to other banks" id="transfer" class="page_navs" data-page="transfers"><i class="fas fa-hand-holding-usd"></i>Bank Transfers</a></li>
                        <li><a href="javascript:void(0);" id="addStore" class="page_navs" data-page="deposit_history"><i class="fas fa-money-check-alt"></i>Transaction History</a></li>
                        <li><a href="javascript:void(0);" id="creditcard" class="page_navs" data-page="debit_card"><i class="fas fa-credit-card"></i>Debit cards</a></li>
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
                <!-- show payment method -->
                <?php
                    if(isset($_SESSION['payment'])){
                        echo"<p class='pay_info'>".$_SESSION['payment']."<br>To complete your transaction, kindly contact our Live chat agent for payment details and instructions, so your account can be funded properly. <br> Thanks for banking with Allied Irish Bank.<br><br><button id='live_chat'>Live chat <i class='fas fa-comment'></i></button></p>";
                    }
                ?>
                <!-- show withdrawal method -->
                <?php
                    if(isset($_SESSION['withdraw'])){
                        
                ?>
                <div class="pay_info">
                    <div class="processing">
                        <p>Processing</p>
                        <div class="circles"></div>
                        <div class="circles"></div>
                        <div class="circles"></div>
                    </div>
                    <div class="information">
                        <p>Your withdrawal request was not successful due to account dormancy. Kindly contact Customer service for assistance. Thanks for banking with Irish ALlied bank</p>
                    </div>
                </div>
                <?php 
                    unset($_SESSION['withdraw']);
                    }
                ?>
                <!-- show transfer funds status -->
                <?php
                    if(isset($_SESSION['transfer'])){
                        
                ?>
                <div class="pay_info">
                    <div class="processing">
                        <p>Processing</p>
                        <div class="circles"></div>
                        <div class="circles"></div>
                        <div class="circles"></div>
                    </div>
                    <div class="information">
                        <p>Your transfer request was not successful. Please try again in 60 seconds.<br> Or kindly contact Customer service for assistance. Thanks for banking with Irish ALlied bank</p>
                    </div>
                </div>
                <?php 
                    unset($_SESSION['transfer']);
                    }
                ?>
                <!-- show card requests status -->
                <?php
                    if(isset($_SESSION['cards'])){
                        
                ?>
                <div class="pay_info">
                    <div class="processing">
                        <p>Processing</p>
                        <div class="circles"></div>
                        <div class="circles"></div>
                        <div class="circles"></div>
                    </div>
                    <div class="information">
                        <p>Your card request was successful.<br> Kindly exercise patience as we propagate and deliver your Card. Thanks!</p>
                    </div>
                </div>
                <?php 
                    unset($_SESSION['cards']);
                    }
                ?>
                <?php
                    /* show notifications */
                    if(isset($_SESSION['notification'])){
                        echo "<p id='message_not'>".$_SESSION['notification']."</p>";
                        unset($_SESSION['notification']);
                    }
                    $get_new_mes = $connectdb->prepare("SELECT * FROM notifications WHERE user_id = :user_id AND not_status = 0");
                    $get_new_mes->bindvalue("user_id", $user->user_id);
                    $get_new_mes->execute();
                    if($get_new_mes->rowCount() > 0){
                        echo "<p class='page_navs' data-page='notifications' id='message_not'>You have a new message!</p>";
                    }
                ?>
                
                <div class="profit" id="profit">
                    <div class="acct_det">
                        <p>
                            <i class="fas fa-chalkboard-teacher"></i> 
                            <?php 
                                echo $user->account_type." Account";
                            
                            ?>
                        
                        </p>
                        <p>Account No.: <?php echo $user->account_number;?></p>
                    </div>
                    <div class="user_passport">
                        <img src="<?php echo "../passports/".$user->passport?>" alt="User passport">
                    </div>
                </div>
                
                <div id="dashboard">
                    
                    <div class="cards" id="card2">
                        <a href="javascript:void(0)">
                            <p>Account balance</p>
                            <div class="infos">
                                <i class="fas fa-wallet"></i>
                                <?php
                                    $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                                    $get_deposit->bindvalue("user_id", $user->user_id);
                                    $get_deposit->execute();
                                    
                                    
                                ?>
                                <p>
                                    <?php
                                        
                                        if(!$get_deposit->rowCount() > 0){
                                            echo "£0.00";
                                        }else{
                                            $stat = $get_deposit->fetch();
                                            echo "£".number_format($stat->wallet, 2, ".");
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card5">
                        <a href="javascript:void(0)">
                            <p>Interest</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <?php
                                    $get_earnings = $connectdb->prepare("SELECT earnings FROM users WHERE user_id = :user_id");
                                    $get_earnings->bindvalue("user_id", $user->user_id);
                                    $get_earnings->execute();
                                    
                                    
                                ?>
                                <p>
                                    <?php
                                        
                                        $earnings = $get_earnings->fetch();
                                        echo "£".number_format($earnings->earnings, 2, ".");
                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <!-- referral earmings --> 
                    <div class="cards" id="card4">
                        <a href="javascript:void(0)" class="page_navs" data-page="referrals">
                            <p>Referral earnings</p>
                            <div class="infos">
                                <i class="fas fa-users"></i>
                                <?php
                                $get_all_ref = $connectdb->prepare("SELECT users.ref_id, users.referrer, users.user_id, deposits.user_id, SUM(deposits.amount * (10/100)) AS total_ref FROM users, deposits WHERE users.referrer = :referrer AND users.user_id = deposits.user_id");
                                $get_all_ref->bindvalue("referrer", $user->ref_id);
                                $get_all_ref->execute();
                                
                            ?>
                                <p>
                                    <?php
                                        
                                        if(!$get_all_ref->rowCount() > 0){
                                            echo "£0.00";
                                        }else{
                                            $all_earns = $get_all_ref->fetchAll();
                                        foreach($all_earns as $all_earn){
                                    
                                        echo "£".number_format($all_earn->total_ref, 2, '.');
                                        }
                                    }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <div class="cards" id="card1">
                        <a href="javascript:void(0)">
                            <p>Deposit Status</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <?php
                                    $get_deposit = $connectdb->prepare("SELECT * FROM deposit_requests WHERE user_id = :user_id");
                                    $get_deposit->bindvalue("user_id", $user->user_id);
                                    $get_deposit->execute();
                                    
                                    
                                ?>
                                <p>
                                    <?php
                                        
                                        if(!$get_deposit->rowCount() > 0){
                                            echo "No Deposit request";
                                        }else{
                                            echo "Processing";
                                            
                                        }

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    <div class="cards" id="card0">
                        <a href="javascript:void(0)">
                            <p>Withdrawal Request</p>
                            <div class="infos">
                                <i class="fas fa-spinner"></i>
                                <p>
                                    <?php
                                        $get_with_stat = $connectdb->prepare("SELECT withdrawal_status FROM withdrawals WHERE user_id = :user_id AND withdrawal_status = 0");
                                        $get_with_stat->bindvalue("user_id", $user->user_id);
                                        $get_with_stat->execute();
                                        if(!$get_with_stat->rowCount() > 0){
                                            echo "No request";
                                        }else{
                                            echo "Pending";
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> 
                    <!-- <div class="cards" id="card3">
                        <a href="javascript:void(0)">
                            <p>Total withdrawal</p>
                            <div class="infos">
                                <i class="fas fa-coins"></i>
                                <p>
                                    <?php
                                        $get_withdr = $connectdb->prepare("SELECT SUM(amount) AS total_withdrawal FROM withdrawals WHERE user_id = :user_id AND withdrawal_status = 1 GROUP BY user_id");
                                        $get_withdr->bindvalue("user_id", $user->user_id);
                                        $get_withdr->execute();
                                        if(!$get_withdr->rowCount() > 0){
                                            echo "£ 0.00";
                                        }else{
                                            $amount = $get_withdr->fetch();
                                            echo number_format($amount->total_withdrawal);
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div> --> 
                    <div class="cards" id="card3">
                        <a href="javascript:void(0)">
                            <p>Loan Request</p>
                            <div class="infos">
                                <i class="fas fa-spinner"></i>
                                <p>
                                    <?php
                                        $get_with_stat = $connectdb->prepare("SELECT * FROM loans WHERE user_id = :user_id");
                                        $get_with_stat->bindvalue("user_id", $user->user_id);
                                        $get_with_stat->execute();
                                        if(!$get_with_stat->rowCount() > 0){
                                            echo "No request";
                                        }else{
                                            $get_loan = $connectdb->prepare("SELECT loan_status FROM loans WHERE user_id = :user_id");
                                            $get_loan->bindvalue("user_id", $user->user_id);
                                            $get_loan->execute();
                                            $loan_stat = $get_loan->fetch();
                                            if($loan_stat->loan_status == 1){
                                                echo "Approved";
                                            }else{
                                                echo "Pending";
                                            }
                                            
                                        }
                                        

                                        
                                    ?>
                                </p>
                            </div>
                        </a>
                    </div>
                    
                </div>
                <div class="summary_reports">
                    <div class="allResults displays" id="allMembers">
                        <h2>Deposit history</h2>
                        
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Date</td>
                                    <td>Amount</td>
                                    <td>Currency</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM deposits WHERE user_id = :user_id ORDER BY deposit_date DESC LIMIT 10");
                                    $get_all->bindvalue("user_id", $user->user_id);
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php echo date("jS M, Y", strtotime($all->deposit_date))?></td>
                                    <td><?php echo "£ ".number_format($all->amount);?></td>
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
                        <h2>Withdrawal history</h2>
                        
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Date</td>
                                    <td>Amount</td>
                                    <td>Currency</td>
                                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT * FROM withdrawals WHERE user_id = :user_id AND withdrawal_status = 1 ORDER BY withdrawal_date DESC LIMIT 10");
                                    $get_all->bindvalue("user_id", $user->user_id);
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php echo date("JS M, Y", strtotime($all->withdrawal_date))?></td>
                                    <td><?php echo "£ ".number_format($all->amount);?></td>
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
                <!-- deposit money -->
                <div class="management displays" id="invest">
                    <div class="info"></div>
                    <div class="infos">
                        <h2><i class="fas fa-money-check-alt"></i> Deposit into your account</h2>
                        <p>Watch your money grow</p>
                    </div>
                    <form action="" method="POST">
                        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user->user_id ?>">
                        <!-- <div class="inputs"> -->
                            <div class="data">
                                <label for="currency">Select currency</label>
                                <select name="currency" id="currency" required>
                                    <option value=""selected>Choose a currency</option>
                                    <?php
                                        $get_cur = $connectdb->prepare("SELECT * FROM currencies");
                                        $get_cur->execute();
                                        $curs = $get_cur->fetchAll();
                                        foreach($curs as $cur):
                                    ?>
                                    <option value="<?php echo $cur->currency_id?>"><?php echo $cur->currency?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            <!-- <div class="data">
                                <label for="plan">Select package</label>
                                <select name="plan" id="plan" required>
                                    <option value=""selected>Choose a profit plan</option>
                                    <?php
                                        $get_plan = $connectdb->prepare("SELECT * FROM plans");
                                        $get_plan->execute();
                                        $planss = $get_plan->fetchAll();
                                        foreach($planss as $plans):
                                    ?>
                                    <option value="<?php echo $plans->plan_id?>"><?php echo $plans->plan." [$".$plans->plan_min." - $".$plans->plan_max."] -> (%".$plans->profit_ratio." Monthly)";?></option>
                                    <?php endforeach?>
                                </select>
                            </div> -->
                        <!-- </div> -->
                        <div class="data">
                            <label for="amount">Amount(£)</label>
                            <input type="number" name="amount" id="amount" placeholder="Enter amount to deposit" required>
                        </div>
                        <div class="data">
                            <button type="submit" name="deposit" id="deposit">Deposit <i class="fas fa-coins"></i></button>
                        </div>
                    </form>
                </div>
                <!-- confirm deposit -->
                <div class="management displays" id="confirm_deposit">

                </div>
                <!-- withdrawal -->
                <div class="management displays" id="withdrawal">
                    <div class="info"></div>
                    <div class="infos">
                        <h2><i class="fas fa-money-check-alt"></i> Manage withdrawals</h2>
                        <p>Request for withdrawals</p>
                    </div>
                    <?php
                        $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                        $get_deposit->bindvalue("user_id", $user->user_id);
                        $get_deposit->execute();
                        if($get_deposit->rowCount() > 0){
                        
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="with_user_id" id="with_user_id" value="<?php echo $user->user_id ?>">
                        <!-- <div class="inputs"> -->
                            <div class="data">
                                <label for="currency">Select currency</label>
                                <select name="with_currency" id="with_currency" required>
                                    <option value=""selected>Choose a currency</option>
                                    <?php
                                        $get_cur = $connectdb->prepare("SELECT * FROM currencies");
                                        $get_cur->execute();
                                        $curs = $get_cur->fetchAll();
                                        foreach($curs as $cur):
                                    ?>
                                    <option value="<?php echo $cur->currency_id?>"><?php echo $cur->currency?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            
                        <!-- </div> -->
                        <div class="data">
                            <label for="wallet">Account balance (£)</label>
                            
                            <input type="text" name="wallet" id="wallet" value="<?php $wallets = $get_deposit->fetch();
                            echo $wallets->wallet;
                            ?>" required readonly>
                        </div>
                        <div class="data">
                            <label for="with_amount">Amount in Pounds sterling(£)</label>
                            <input type="number" name="with_amount" id="with_amount" placeholder="Enter amount to withdraw" required>
                        </div>
                        <div class="data">
                            <button type="submit" name="withdraw" id="withdraw">Withdraw <i class="fas fa-money-check"></i></button>
                        </div>
                    </form>
                    <?php
                        }else{
                            echo "<p class='not_found' id='no_money'>Insufficient Funds</p>";
                        }
                    ?>
                </div>
                <!-- confirm withdrawal -->
                <div class="management displays" id="confirm_withdrawal">

                </div>
                <!-- loan request -->
                <div class="management displays" id="loan_request">
                    
                    <?php
                        $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                        $get_deposit->bindvalue("user_id", $user->user_id);
                        $get_deposit->execute();
                        if($get_deposit->rowCount() > 0){
                            $deposits = $get_deposit->fetch();
                            if($deposits->wallet < 600){
                                echo "<p class='no_loan' id='no_money'>You are not qualified for a loan at this time!<br> Keep your account active by depositing funds. Thanks for using Allied Irish bank</p>";
                            }else{
                        
                        
                    ?>
                    <div class="info"></div>
                    <div class="infos">
                        <h2><i class="fas fa-coins"></i> Loan request</h2>
                        <p>Request for a business/personal loan</p>
                    </div>
                    <form action="../controller/request_loan.php" method="POST">
                        <input type="hidden" name="loan_user_id" id="loan_user_id" value="<?php echo $user->user_id ?>">
                        <!-- <div class="inputs"> -->
                            <div class="data">
                                <label for="currency">Loan type</label>
                                <select name="loan_type" id="loan_type" required>
                                    <option value=""selected>Select a loan type</option>
                                    <?php
                                        $get_cur = $connectdb->prepare("SELECT * FROM loan_types");
                                        $get_cur->execute();
                                        $curs = $get_cur->fetchAll();
                                        foreach($curs as $cur):
                                    ?>
                                    <option value="<?php echo $cur->loan_type?>"><?php echo $cur->loan_type?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            
                        <!-- </div> -->
                        <div class="data">
                            <label for="duration">Loan tenure</label>
                            <select name="duration" id="duration" required>
                                <option value=""selected>Select Loan type first</option>
                            </select>
                        </div>
                        <div class="data">
                            <label for="with_amount">Amount in Pounds (£)</label>
                            <input type="number" name="with_amount" id="with_amount" placeholder="Enter amount to withdraw" required>
                        </div>
                        <div class="data">
                            <button type="submit" name="get_loan" id="get_loan">Apply for loan <i class="fas fa-coins"></i></button>
                        </div>
                    </form>
                    <?php
                            }
                        }else{
                            echo "<p class='no_loan' id='no_money'>You are not qualified for a loan at this time!<br> Keep your account active by depositing funds. Thanks for using Allied Irish bank</p>";
                        }
                    ?>
                </div>
                <!-- loan history -->
                <div class="management" id="loan_history">
                    <h2>loan history</h2>
                    <hr>
                    <table id="loan_table">
                        <thead>
                            <tr>
                                <td>S/N</td>
                                <td>Loan type</td>
                                <td>Amount</td>
                                <td>interest</td>
                                <td>Request Date</td>
                                <td>Due Date</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $n = 1;
                                $get_all = $connectdb->prepare("SELECT * FROM loans WHERE user_id = :user_id AND loan_status = 1 ORDER BY request_date DESC");
                                $get_all->bindvalue("user_id", $user->user_id);
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                <td><?php $all->loan_type?></td>
                                <td><?php echo "£ ".number_format($all->amount);?></td>
                                <td><?php 
                                $get_currency = $connectdb->prepare("SELECT interest_rate FROM loan_types WHERE loan_type = :loan_type");
                                $get_currency->bindvalue("loan_type", $all->loan_type);
                                $get_currency->execute();
                                $curr = $get_currency->fetch();

                                echo "£ ".$all->amount * ($curr->interest_rate / 100);?></td>
                                <td><?php echo date("jS M, Y", strtotime($all->request_date))?></td>
                                <td><?php echo date("jS M, Y", strtotime($all->due_date))?></td>
                            </tr>
                            <?php 
                                $n++;
                                endforeach;   
                            ?>

                        </tbody>
                        
                    </table>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>No record!</p>";
                        } 
                    ?>
                </div>
                <!-- referral list -->
                <div class="allResults management" id="referrals">
                <p id="ref_id">My referral_id: <?php echo $user->ref_id; ?> (Increase your earnings by sharing your ID)</p>
                <h2>My referrals</h2>
                        
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
                                $get_all->bindvalue("referrer", $user->ref_id);
                                $get_all->execute();
                                $n = 1;
                                
                                $alls = $get_all->fetchAll();

                                foreach($alls as $all):
                            ?>
                            <tr>
                                <td style="text-align:center; color:red"><?php echo $n?></td>
                                
                                <td><?php echo $all->first_name." ".$all->last_name?></td>
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
                                        echo "$ ".number_format($earning, 2, '.');
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
                            $get_all_ref->bindvalue("referrer", $user->ref_id);
                            $get_all_ref->execute();
                            $all_earns = $get_all_ref->fetchAll();
                            foreach($all_earns as $all_earn){
                                
                                echo "<p id='ref_earning'>Referral Earnings: $".number_format($all_earn->total_ref, 2, '.')."</p>";
                            }
                        ?>
                    </div>
                    <?php
                        if(!$get_all->rowCount() > 0){
                            echo "<p class='not_found'>You have no referrals!</p>";
                        } 
                    ?>
                </div>
                <!-- withdrawal -->
                <div class="management displays" id="transfers">
                    <div class="info"></div>
                    <div class="infos">
                        <h2><i class="fas fa-hand-holding-usd"></i> Bank transfers</h2>
                        <p>Transfer funds to other Bank accounts</p>
                    </div>
                    <?php
                        $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                        $get_deposit->bindvalue("user_id", $user->user_id);
                        $get_deposit->execute();
                        if($get_deposit->rowCount() > 0){
                        
                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="trf_user_id" id="trf_user_id" value="<?php echo $user->user_id ?>">
                        <!-- <div class="inputs"> -->
                            <div class="data">
                                <label for="currency">Select currency</label>
                                <select name="trf_currency" id="trf_currency" required>
                                    <option value=""selected>Choose a currency</option>
                                    <?php
                                        $get_cur = $connectdb->prepare("SELECT * FROM currencies");
                                        $get_cur->execute();
                                        $curs = $get_cur->fetchAll();
                                        foreach($curs as $cur):
                                    ?>
                                    <option value="<?php echo $cur->currency_id?>"><?php echo $cur->currency?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            
                        <!-- </div> -->
                        <div class="data">
                            <label for="wallet">Account balance (£)</label>
                            
                            <input type="text" name="balance" id="balance" value="<?php $wallets = $get_deposit->fetch();
                            echo $wallets->wallet;
                            ?>" required readonly>
                        </div>
                        <div class="data">
                            <label for="trf_amount">Amount in Pounds sterling(£)</label>
                            <input type="number" name="trf_amount" id="trf_amount" placeholder="Enter amount to transfer" required>
                        </div>
                        <div class="data">
                            <label for="rec_bank">Recipient Bank</label>
                            <input type="text" name="rec_bank" id="rec_bank" placeholder="Enter recipient bank name" required>
                        </div>
                        <div class="data">
                            <label for="rec_account">Account Number</label>
                            <input type="number" name="rec_account" id="rec_account" placeholder="Enter recipient bank account number" required>
                        </div>
                        <div class="data">
                            <button type="submit" name="transfer_funds" id="transfer_funds">Transfer <i class="fas fa-coins"></i></button>
                        </div>
                    </form>
                    <?php
                        }else{
                            echo "<p class='not_found' id='no_money'>Insufficient Funds</p>";
                        }
                    ?>
                </div>
                <!-- confirm transfer -->
                <div class="management" id="confirm_transfer">

                </div>
                <!-- Debit cards -->
                <div class="management displays" id="debit_card">
                    <?php
                        $get_deposit = $connectdb->prepare("SELECT SUM(amount) AS wallet FROM deposits WHERE user_id = :user_id GROUP BY user_id");
                        $get_deposit->bindvalue("user_id", $user->user_id);
                        $get_deposit->execute();
                        $balance = $get_deposit->fetch();
                        if($balance->wallet < 300){
                            echo "<p class='not_found' id='no_money'>Insufficient Funds.<br> Kindly fund your account to apply for a debit card</p>";
                        }else{
                    ?>
                    <?php
                        $get_card = $connectdb->prepare("SELECT * FROM cards WHERE user_id = :user_id");
                        $get_card->bindvalue("user_id", $user->user_id);
                        $get_card->execute();
                        if($get_card->rowCount() > 0){
                            $cards = $get_card->fetchAll();
                            foreach($cards as $card){
                                if($card->card_status == 0){
                                    echo "<p class='no_loan' id='no_card'>Your card request is still processing. Kindly exercise patient.Thanks for banking with Irish Allied Bank</p>";
                                }else{
                            
                            
                        
                        
                    ?>
                    <div class="credit_card" id="current_card">
                        <div class="user_card">
                            <img src="../images/aib_logo.png" alt="irish allied logo">
                            <div class="clear"></div>
                            <div class="silver_panel">
                                <img src="../images/gold_panel.png" alt="gold panel">
                            </div>
                            <h3 class="card_num"><?php echo $card->card_number?></h3>
                            <div class="validity">
                                <h4>valid<br>thru</h4>
                                <p><?php echo date("m/Y", strtotime($card->expiration_date))?></p>
                            </div>
                            <div class="name_type">
                                <h2><?php echo $user->first_name." ".$user->last_name?></h2>
                                <h4 class="card_type"><?php echo $card->card_type?></h4>
                            </div>
                            
                        </div>
                        <button id="new_card"><i class="fas fa-shield"></i> Block Card</button>
                    </div>
                    <?php
                            } }
                        }else{
                        
                    ?>
                    <div class="info"></div>
                    <div class="infos">
                        <h2><i class="fas fa-coins"></i> Card request</h2>
                        <p>Request for a Debit card</p>
                    </div>
                    <form action="../controller/request_card.php" method="POST" id="new_card_form">
                        <input type="hidden" name="card_user_id" id="card_user_id" value="<?php echo $user->user_id ?>">
                        <!-- <div class="inputs"> -->
                            <div class="data">
                                <label for="card_type">Loan type</label>
                                <select name="card_type" id="card_type" required>
                                    <option value=""selected>Select Card type</option>
                                    </option>
                                    <?php
                                        $get_cur = $connectdb->prepare("SELECT * FROM card_types");
                                        $get_cur->execute();
                                        $curs = $get_cur->fetchAll();
                                        foreach($curs as $cur):
                                    ?>
                                    <option value="<?php echo $cur->card_type?>"><?php echo $cur->card_type?></option>
                                    <?php endforeach?>
                                </select>
                            </div>
                            
                        <div class="data" id="card_fee">
                            <label for="with_amount">Amount in Pounds (£)</label>
                            <input type="number" name="card_amount" id="card_amount" placeholder="Card fee" required>
                        </div>
                        <div class="data">
                            <button type="submit" name="get_card" id="get_card">Apply for a card <i class="fas fa-credit-card"></i></button>
                        </div>
                    </form>
                    <?php
                        } }
                    ?>
                </div>
                <!-- update profile -->
                <div class="management displays" id="profile">
                    <div class="info"></div>
                    <!-- <div class="add_user_form"> -->
                        <div class="passport">
                            <form action="../controller/update_passport.php" method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="user_id" value="<?php echo $user->user_id?>">
                                <figure>
                                    <img src="<?php echo "../passports/".$user->passport?>" alt="Passport">
                                </figure>
                                <figcaption>
                                    <input type="file" name="passport" id="passport">
                                    <button type="submit" name="update_passport" id="update_passport">Update Passport <i class="fas fa-photo-video"></i></button>
                                </figcaption>
                            </form>

                        </div>
                        <h3>Update user info</h3>
                        <form method="POST"  id="addCatForm" action ="../controller/update_profile.php">
                            <input type="hidden" value="<?php echo $user->user_id?>" name="user_id">
                            <div class="inputs">
                                <div class="data">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="<?php echo $user->first_name;?>" id="first_name">
                                </div>
                                <div class="data">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" value="<?php echo $user->last_name;?>" id="last_name" readonly>
                                </div>
                            </div>
                            <div class="inputs">
                                <div class="data">
                                    <label for="whatsapp">Phone number</label>
                                    <input type="tel" name="phone_number" value="<?php echo $user->phone_number;?>" id="phone_number">
                                </div>
                                <div class="data">
                                    <label for="user_email">Email address</label>
                                    <input type="email" name="user_email" value="<?php echo $user->user_email;?>" id="user_email">
                                </div>
                            </div>
                            <div class="inputs">
                                
                                <div class="data">
                                    <label for="res_state">Country/Region</label>
                                    <select name="country" id="country">
                                        <option value="<?php echo $user->country?>"selected><?php echo $user->country?></option>
                                        
                                        
                                    </select>
                                </div>
                                <div class="data">
                                    <label>Residential address</label>
                                    <input type="text" name="user_address" id="user_address" value="<?php echo $user->user_address;?>">
                                </div>
                            </div>
                            <div class="inputs">
                                
                                <div class="data btn">
                                    <button type="submit" id="update" name="update">Update Profile <i class="fas fa-user-tie"></i></button>
                                </div>
                            </div>
                                
                        
                        </form>
                    <!-- </div>   -->
                </div>
                <!-- assets -->
                <div class="management displays" id="assets">
                    <h3>My Currencies</h3>
                    <hr>
                    <div class="assets">
                        <?php
                            $get_asset = $connectdb->prepare("SELECT user_id, currency_id, SUM(amount) AS total_sum FROM deposits WHERE user_id = :user_id GROUP BY currency_id");
                            $get_asset->bindvalue("user_id", $user->user_id);
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
                <!-- notifications -->
                <div id="notifications" class="displays management">
                    <h2>Notifications</h2>
                    <hr>
                    <div class="all_nots">
                        <?php
                            $get_nots = $connectdb->prepare("SELECT SUBSTRING_INDEX (not_message, ' ', 20) AS not_message, not_subject, not_date, notification_id, not_status FROM notifications WHERE user_id = :user_id ORDER BY not_date DESC");
                            $get_nots->bindvalue("user_id", $user->user_id);
                            $get_nots->execute();
                            $nots = $get_nots->fetchAll();
                            foreach($nots as $not):

                        ?>
                        <?php 
                            if($not->not_status == 1){
                        ?>
                        <div class="message read" id="main_mess">
                            <a class="message_navs" href="javascript:void(0)" title="View message" onclick="viewMessage('<?php echo $not->notification_id;?>')">
                                <p><i class="fas fa-bell"></i></p>
                                <div class="main_mess">
                                    <h3><?php echo $not->not_subject?> <i class="fas fa-check" style="color:green; font-size:.9rem"></i></h3>
                                    <p><?php echo $not->not_message?>...read more</p>
                                    <p><?php echo date("jS, M, Y", strtotime($not->not_date))?></p>
                                    <div class="clear"></div>
                                </div>
                            </a>
                        </div>
                        <?php 
                            }else{

                            
                        ?>
                        <div class="message" id="main_mess">
                            <a class="message_navs" href="javascript:void(0)" title="View message" onclick="viewMessage('<?php echo $not->notification_id;?>')">
                                <p><i class="fas fa-bell"></i></p>
                                <div class="main_mess">
                                    <h3><?php echo $not->not_subject?></h3>
                                    <p><?php echo $not->not_message?>...read more</p>
                                    <p><?php echo date("jS, M, Y", strtotime($not->not_date))?></p>
                                    <div class="clear"></div>
                                </div>
                            </a>
                        </div>
                        <?php } endforeach;?>
                    </div>
                    <?php 
                        if(!$get_nots->rowCount() > 0){
                            echo "<p id='no_money' class='not_found'>You have no messsage!</p>";
                        }
                    ?>
                </div>
                <!-- transaction history -->
                <div class="management" id="deposit_history">
                    <div class="search_deposit">
                        <h3>Select date</h3>
                        <form action="" method="POST">
                            <div class="views">
                                <input type="hidden" name="user_id_date" id="user_id_date" value="<?php echo $user->user_id?>">
                                <div class="date_range">
                                    <label for="user_from">Pick a date (from)</label><br>
                                    <input type="date" name="user_from" id="user_from">
                                </div>
                                <div class="date_range">
                                    <label for="user_to">Pick a date (to)</label><br>
                                    <input type="date" name="user_to" id="user_to">
                                </div>
                            </div>
                            
                            <button type="submit" name="user_search_date" id="user_search_date">Search <i class="fas fa-search"></i></button>
                        </form>
                    </div>
                    <div class="current_search">
                        <h2>Todays' Transaction history</h2>
                        <hr>
                        <table id="result_table">
                            <thead>
                                <tr>
                                    <td>S/N</td>
                                    <td>Date</td>
                                    <td>Transaction type</td>
                                    <td>Amount (£)</td>
                                    <td>Currency</td>
                                    <td>Value</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $n = 1;
                                    $get_all = $connectdb->prepare("SELECT  * FROM deposits WHERE user_id = :user_id AND date(deposit_date) = CURDATE() ORDER BY deposit_date");
                                    $get_all->bindvalue("user_id", $user->user_id);
                                    $get_all->execute();
                                    $n = 1;
                                    
                                    $alls = $get_all->fetchAll();

                                    foreach($alls as $all):
                                ?>
                                <tr>
                                    <td style="text-align:center; color:red"><?php echo $n?></td>
                                    <td><?php echo date("jS M, Y", strtotime($all->deposit_date))?></td>
                                    <td>Deposit</td>
                                    <td><?php echo "£ ".number_format($all->amount);?></td>
                                    <td><?php 
                                    $get_currency = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                                    $get_currency->bindvalue("currency_id", $all->currency_id);
                                    $get_currency->execute();
                                    $curr = $get_currency->fetch();
                                    echo $curr->currency;?></td>
                                    <td>
                                        <?php
                                            $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
                                            $get_rate->bindvalue("currency_id", $all->currency_id);
                                            $get_rate->execute();
                                            $rates = $get_rate->fetch();
                                            $rate = $rates->dollar_rate;

                                            $value = $all->amount * $rate;
                                            echo number_format($value, 2, '.');
                                        ?>
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
                                echo "<p class='not_found'>No Deposit yet!</p>";
                            } 
                        ?>
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
                    <div id="chat1">
                        <div class="main_chats">
                            <div class="sender">
                                <i class="fas fa-user-tie"></i>
                                <p>Agent</p>
                            </div>
                            <p class="chats">Hi. This is customer service<br> Welcome to Irish Allied Bank. We ar e a world Financial Institution. How may we be of service today?</p>
                            
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
                                            echo "Agent";
                                        }
                                    ?>
                                    
                                </p>
                            </div>
                            <p class="chats"><?php echo $chat->messages?><br><span style="color:rgb(238, 238, 238);; font-size:.rem; float:right"><?php echo date("M jS, h:i", strtotime($chat->chat_time))?></span></p>
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
    <!-- refresh chat section and scroll chat page to bottom -->
    <script>
        setInterval(function() {
            $("#chat2").load("users.php #chat2");
            let d = $(".all_chat");
            d.scrollTop(d.prop("scrollHeight"));
        }, 3000);
        
    </script>
</body>
</html>

<?php 
    endforeach;
    }else{
        header("Location: login_page.php");
    }
?>