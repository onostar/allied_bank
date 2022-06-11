<?php
    include "connections.php";
    session_start();

    $currency = htmlspecialchars(stripslashes($_POST['with_currency']));
    $wallet = htmlspecialchars(stripslashes($_POST['wallet']));
    $amount = htmlspecialchars(stripslashes($_POST['with_amount']));
    $user_id = htmlspecialchars(stripslashes($_POST['with_user_id']));

    if($amount > $wallet){
        echo "<p class='not_found' id='no_money'>Insufficient fund</p>";
    }else{

    

    /* get amount rate and calculate */
    $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
    $get_rate->bindvalue("currency_id", $currency);
    $get_rate->execute();
    $cur_rate = $get_rate->fetch();
    $rate = $cur_rate->dollar_rate;

    $conversion = $amount * $rate;


?>
    <div class="info"></div>
    <div class="infos">
        <h2><i class="fas fa-money-check-alt"></i> Confirm your withdrawal</h2>
        <p></p>
    </div>
    <form action="../controller/withdraw.php" method="POST">
    <input type="hidden" name="with_user_id" id="with_user_id" value="<?php echo $user_id ?>">
<!-- <div class="inputs"> -->
    <div class="data">
        <label for="currency">Select currency</label>
        <select name="currency" id="currency" required readonly>
            <option value="<?php echo $currency?>" selected> <?php
                $get_curen = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                $get_curen->bindvalue("currency_id", $currency);
                $get_curen->execute();
                $curen = $get_curen->fetch();
                echo $curen->currency;

                
            ?></option>
            
        </select>
    </div>
    <div class="data">
        <label for="wallet">Account Balance (£)</label>
        
        <input type="text" name="wallet" id="wallet" value="<?php echo $wallet?>" required readonly>
    </div>
    <div class="data">
        <label for="with_amount">Amount in Pounds(£)</label>
        <input type="number" name="with_amount" id="with_amount" placeholder="Enter amount to withdraw" value="<?php echo $amount?>"required readonly>
    </div>
        <div class="data">
            <label for="amount"><?php $get_curplan = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                        $get_curplan->bindvalue("currency_id", $currency);
                        $get_curplan->execute();
                        $curpl = $get_curplan->fetch();
                        echo $curpl->currency;?> value</label>
            <input type="number" name="currency_amount" id="currency_amount" value="<?php echo $conversion;?>"required readonly>
        </div>
        
        <div class="data">
            <button type="submit" name="confirm_withdraw" id="confirm_withdraw">Confirm withdrawal <i class="fas fa-money-check"></i></button>
        </div>
    </form>

    <?php }?>