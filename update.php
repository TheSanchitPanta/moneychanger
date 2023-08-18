<?php
require $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    //DELETE
    if(isset($_REQUEST['id']))
    {
        $id = $_REQUEST['id'];
        // $unit = $_REQUEST['unit'];
        $buy = $_REQUEST['buy'];
        $sell = $_REQUEST['sell'];
    
        $query = "UPDATE `moneyexchange` SET `buy` = '$buy', `sell` = '$sell' WHERE `moneyexchange`.`id` = $id";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
        {
           
            header("Location: /admin.php");
        }
        
    }
    
    
?>

