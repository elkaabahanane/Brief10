<?php
include ('includes/header.php');
// session_destroy();
// print_r($_SESSION);
?>
<table class="table">
    <tr>
        <td>NOM</td>
        <td>PRIX</td>
        <td>QUANTITY</td>
        <td>TOTAL</td>
    </tr>
    <?php
        foreach ($_SESSION as $key => $value):
    ?>
    <tr>
        <td><?php  echo  $value['NOM']?></td>
        <td><?php  echo  $value['Prix']?></td>
        <td><?php  echo $value['Quantity']?></td>
        <td><?php  echo  $value['Total']?></td>
    </tr>
    <form action="checkouts.php" method="POST">
        <input type="hidden" name="NOM" value="<?php  echo @ $value['NOM']?>">            
        <input type="hidden"  name="Prix" value="<?php  echo @ $value['Prix']?>">            
        <input type="hidden"  name="Quantity" value="<?php  echo @ $value['Quantity']?>">            
        <input type="hidden"  name="Total" value="<?php  echo @ $value['Total']?>"> 
        <input type="submit" value="BUY NOW">     

    </form>
    
    
    
        <?php endforeach; ?>

        <?php 
         if(isset($_POST['submit'])){
             $NOM = $_POST['NOM'];
             $Prix = $_POST['Prix'];
             $Quantity = $_POST['Quantity'];
             $Total = $_POST['Total'];
             
            $sqlQuery = "INSERT INTO `commande`(`ID`, `DATE_COMMANDE`, `NOM`, `Prix`, `Quantity`, `Total`) VALUES ('0','getdate()','$NOM','$Prix','$Quantity','$Total')";
            
            $result= query($sqlQuery);
            }
    ?>
</table>