<?php
    include "connections.php";
    session_start();

    $currency = htmlspecialchars(stripslashes($_POST['trf_currency']));
    $wallet = htmlspecialchars(stripslashes($_POST['balance']));
    $amount = htmlspecialchars(stripslashes($_POST['trf_amount']));
    $user_id = htmlspecialchars(stripslashes($_POST['trf_user_id']));
    $bank = htmlspecialchars(stripslashes($_POST['rec_bank']));
    $acn = htmlspecialchars(stripslashes($_POST['rec_account']));

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
        <h2><i class="fas fa-money-check-alt"></i> Confirm your transfer</h2>
        <p></p>
    </div>
    <form action="../controller/transfer.php" method="POST">
    <input type="hidden" name="trf_user_id" id="with_user_id" value="<?php echo $user_id ?>">
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
        
        <input type="text" name="balance" id="balance" value="<?php echo $wallet?>" required readonly>
    </div>
    <div class="data">
        <label for="with_amount">Amount in Pounds(£)</label>
        <input type="number" name="trf_amount" id="trf_amount" placeholder="Enter amount to transfer" value="<?php echo $amount?>"required readonly>
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
            <label for="rec_bank">Recipient bank</label>
            <input type="text" name="rec_bank" id="rec_bank" placeholder="Enter recipient bank" value="<?php echo $bank?>"required readonly>
        </div>
        <div class="data">
            <label for="rec_bank">Recipient Account Number</label>
            <input type="text" name="rec_bank" id="rec_account" placeholder="Enter recipient account number" value="<?php echo $acn?>"required readonly>
        </div>
        <div class="data">
            <button type="submit" name="confirm_transfer" id="confirm_transfer">Confirm transfer <i class="fas fa-money-check"></i></button>
        </div>
    </form>

    <?php }?>