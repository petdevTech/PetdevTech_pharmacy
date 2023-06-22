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


if($action == ($_GET['action']){
?>



<div class="container item-pic">
    <div class="row"> 
    
        <?php
            $allItems = getAllFrom('*', 'items', 'WHERE Cat_ID ="'.$action.'"' , '',  'ItemID','');
            foreach($allItems as $item){
                $imgsource = empty($item['Image'])? 'admin/uploads/items/default/pill3.png' : "admin/uploads/items/" . $item['Image'];
        ?>


            <div class="cardy-class col-md-3 col-sm-6">
                <div class="card cardy h-100">

                    <div class="card-header">
                        <h3>
                            <a href="items.php?itemid=<?php echo $item['ItemID'];?>"> <?php echo $item['Name'];?> </a>
                            <i class="fa-solid fa-cart-shopping float-end cart add-cart cart1"></i>
                            <!-- <span><link rel="icon" type="image/x-icon" href="cart-add.ico" class="float-end"></span> -->
                        </h3>
                    </div>
                    <!-- <div class="imgbox">
                        <img src="cough3.png" class="card-img-top img-fluid" alt="...">
                    </div> -->
                    

                    <div class="card-body item-card">
                        <img class = "card-img-top" src="<?php echo $imgsource; ?>" alt = "" />
                        <span class="price-tag">$ <?php echo $item['Price']; ?></span>

                        <div class = "thumbnail item-card">
                            <div class = "caption">
                                <p><?php echo $item['Description'] ?> </p>
                                <div class="date"><?php echo $item['AddDate'];?> </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- end of card-->
            </div> <!-- end of col-->

       
               
            <?php }
            ?>

        </div><!--End of row-->
    </div> <!-- end of container-->





<?php
}
elseif($action == 'manage'){
    echo 'welcome to manage page';

    // $q = intval($_GET['q']);
?>


<?php
}
elseif($action == 'add'){
    echo 'welcome to add page';
    
}//end of add action


elseif($action == 'edit'){
    echo 'welcome to manage page';
}
elseif($action == 'update'){
    echo 'welcome to manage page';
}

elseif($action == 'remove'){
    echo 'welcome to manage page';
    foreach($_SESSION["shopping_cart"] as $keys => $values){
        if($values["item_id"] == $_POST["item_id"]){
            unset($_SESSION["shopping_cart"][$keys]);
        }
    }
}


// }//end of post[item_id] to check if the 

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