<?php
    include "connections.php";

    if(isset($_POST['card_type']) && !empty($_POST['card_type'])){
        $card = $_POST['card_type'];
        $get_card = $connectdb->prepare("SELECT * FROM card_types WHERE card_type = :card_type");
        $get_card->bindvalue("card_type", $card);
        $get_card->execute();
        
        $times = $get_card->fetchAll();
        foreach($times as $time):
    
?>      
        <label for="with_amount">Amount in Pounds (£)</label>
        <input type="number" name="card_amount" id="card_amount" value="<?php echo $time->amount?>"placeholder="Card fee" required>

<?php endforeach; }else{
    echo "<option>Selct loan types</option>";
}