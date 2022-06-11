<?php
    include "connections.php";
    session_start();

    $currency = htmlspecialchars(stripslashes($_POST['currency']));
    // $plan = htmlspecialchars(stripslashes($_POST['plan']));
    $amount = htmlspecialchars(stripslashes($_POST['amount']));
    $user_id = htmlspecialchars(stripslashes($_POST['user_id']));

    /* get amount rate and calculate */
    $get_rate = $connectdb->prepare("SELECT dollar_rate FROM currencies WHERE currency_id = :currency_id");
    $get_rate->bindvalue("currency_id", $currency);
    $get_rate->execute();
    $cur_rate = $get_rate->fetch();
    $rate = $cur_rate->dollar_rate;

    $conversion = $amount * $rate;
    /* get interest */
    /* $get_profit = $connectdb->prepare("SELECT profit_ratio FROM plans WHERE plan_id = :plan_id");
    $get_profit->bindvalue("plan_id", $plan);
    $get_profit->execute();
    $profits = $get_profit->fetch();
    $profit = $profits->profit_ratio; */
    $interest = $amount * (5/100);

?>
    <div class="info"></div>
    <div class="infos">
        <h2><i class="fas fa-money-check-alt"></i> Confirm your deposit</h2>
        <p></p>
    </div>
    <form action="../controller/deposit.php" method="POST">
        <input type="hidden" name="user_id" id="user_id" value="<?php echo $user_id ?>">
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
            <!-- <div class="data">
                <label for="plan">Select package</label>
                <select name="plan" id="plan" required>
                    <option value="<?php echo $plan ?>"selected><?php
                        $get_curplan = $connectdb->prepare("SELECT * FROM plans WHERE plan_id = :plan_id");
                        $get_curplan->bindvalue("plan_id", $plan);
                        $get_curplan->execute();
                        $curpls = $get_curplan->fetchAll();
                        foreach($curpls as $curpl){
                            echo $curpl->plan." [$".$curpl->plan_min." - $".$curpl->plan_max."] -> (%".$curpl->profit_ratio." Monthly)";
                        }

                        
                    ?></option>
                    
                </select>
            </div> -->
        <!-- </div> -->
        <div class="data">
            <label for="value">Amount(£)</label>
            <input type="number" name="amount" id="amount" placeholder="Enter amount to deposit" value="<?php echo $amount;?>"required readonly>
        </div>
        <div class="data">
            <label for="amount"><?php $get_curplan = $connectdb->prepare("SELECT currency FROM currencies WHERE currency_id = :currency_id");
                        $get_curplan->bindvalue("currency_id", $currency);
                        $get_curplan->execute();
                        $curpl = $get_curplan->fetch();
                        echo $curpl->currency;?> value</label>
            <input type="number" name="currency_amount" id="currency_amount" placeholder="Enter amount to deposit" value="<?php echo $conversion;?>"required readonly>
        </div>
        <!-- <div class="data">
            <label for="interest">Monthly Interest(Pounds)</label>
            <input type="text" name="interest" value="<?php echo $interest?>" readonly>
        </div> -->
        <div class="data">
            <button type="submit" name="confirm_deposit" id="confirm_deposit">Confirm Deposit <i class="fas fa-coins"></i></button>
        </div>
    </form>