<?php
    include "connections.php";
    session_start();

    $from = $_POST['from'];
    $to = $_POST['to'];

?>

<h2>Deposits between "<?php echo $from?>" AND "<?php echo $to?></h2>
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
            <td>Amount ($)</td>
            <td>Currency</td>
            <td>Value</td>
            <td>Trx_Number</td>
            <td>Date</td>
            
        </tr>
    </thead>
    <tbody>
<?php
    $n = 1;
    $get_all = $connectdb->prepare("SELECT * FROM deposits WHERE date(deposit_date) BETWEEN '$from' AND '$to' ORDER BY deposit_date");
    
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
    <td><?php echo "$".number_format($all->amount)?></td>
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