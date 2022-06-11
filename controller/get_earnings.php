<?php
    include "connections.php";

    if(isset($_POST['user_earn']) && !empty($_POST['user_earn'])){
        $user = $_POST['user_earn'];
        $get_earning = $connectdb->prepare("SELECT * FROM users WHERE user_id = :user_id ORDER BY user_id");
        $get_earning->bindvalue("user_id", $user);
        $get_earning->execute();
        
        $earns = $get_earning->fetchAll();
        foreach($earns as $earn):
    
?>      
        <input type="number" name="user_earning" id="user_earning" value="<?php echo $earn->earnings?>">
         <?php endforeach;?>

<?php }else{
    echo "<input type='text' name='user_earning' id='user_earning' placeholder='Update Earnings'>";
}