<?php
    include "connections.php";
    session_start();

    $from = $_POST['user_from'];
    $to = $_POST['user_to'];
    $id = $_POST['user_id_date'];

?>

<h2>Deposits between "<?php echo date("jS M, Y", strtotime($from))?>" AND "<?php echo date("jS M, Y", strtotime($to))?>"</h2>
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
            $get_all = $connectdb->prepare("SELECT * FROM deposits WHERE user_id = :user_id AND date(deposit_date) BETWEEN '$from' AND '$to' ORDER BY deposit_date");
            $get_all->bindvalue("user_id", $id);
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