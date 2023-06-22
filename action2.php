<?php
/*  Cart => [manage | edit | update | add | Insert | Delete |]
*/ 

ob_start(); // Output Buffering Start
session_start();
$pageTitle = 'Home';
include 'init.php';

if(isset($_SESSION['user'])){
//condition ? true: false;
// if(isset($_POST["item_id"])){
$action=isset($_GET['action']) ? $_GET['action'] : 1;


// if($action == ($_GET['action']){


echo $action;




// }
}//end of session


else{
    header('Location: index.php'); //redirect index page to login 
    exit();
}
?>





<?php
//include "includes/template/footer.php";
 include $tpl . 'footer.php';
 ob_end_flash();   // Release the output
?>