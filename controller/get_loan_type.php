<?php
    include "connections.php";

    if(isset($_POST['loan_type']) && !empty($_POST['loan_type'])){
        $loan = $_POST['loan_type'];
        $get_duration = $connectdb->prepare("SELECT * FROM loan_types WHERE loan_type = :loan_type");
        $get_duration->bindvalue("loan_type", $loan);
        $get_duration->execute();
        
        $times = $get_duration->fetchAll();
        foreach($times as $time):
    
?>      
        <option value="<?php echo $time->duration?>"><?php echo $time->duration?> days</option>
         <?php endforeach;?>

<?php }else{
    echo "<option>Selct loan types</option>";
}