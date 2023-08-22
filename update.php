<?php
require $_SERVER['DOCUMENT_ROOT'] . '/database.php';

    //DELETE
    if(isset($_REQUEST['id']))
    {
        $id = $_REQUEST['id'];

    $buy = $_REQUEST['buy'];
    $agency = $_REQUEST['agency'];
    $bank1 = $_REQUEST['bank1'];
    $bank2 = $_REQUEST['bank2'];
    $bank3 = $_REQUEST['bank3'];

    // Perform proper validation/sanitization of input values
    // ...

    // Assuming $conn is a valid database connection
    $query = "UPDATE `moneyexchange` SET `buy` = '$buy', `agency` = '$agency', `bank1` = '$bank1', `bank2` = '$bank2', `bank3` = '$bank3' WHERE `moneyexchange`.`id` = $id";
    
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Query executed successfully
    } else {
        // Query failed, handle the error
        echo "Query error: " . mysqli_error($conn);
    }
} 

        if($query_run)
        {
           
            header("Location: /admin.php");
        }
        
    
    
?>

