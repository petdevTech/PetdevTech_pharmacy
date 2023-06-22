<?php

/*  Cart => [manage | edit | update | add | Insert | Delete |]
*/ 

ob_start(); // Output Buffering Start
session_start();
$pageTitle="Items";
if(isset($_SESSION['user'])){
    include 'init.php';
//condition ? true: false;
$action=isset($_GET['action']) ? $_GET['action'] : 'manage'; 
?>




   




<?php
//if the page is main page
if($action == 'manage'){
//echo 'welcome to manage page';
?>

<div class="container-fluid my-container">
    <!-- <ul class="nav nav-tabs  role-nav"> -->
        <!-- nav-tabs will create more than 1 tab -->
        <ul class= "nav nav-pills mb-3" id="pills-tab" role="tablist">

            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="pills-products-tab" data-bs-toggle="pill" data-bs-target="#products-tab" type="button" role="tab" aria-controls="products-tab" aria-selected="true">Products</button>
            </li>

            <li class="nav-item" role="presentation">
                <button class="nav-link" id="pills-cart-tab" data-bs-toggle="pill" data-bs-target="#cart-tab" type="button" role="tab" aria-controls="cart-tab" aria-selected="false">Cart
                    <span class="badge">
                        <?php
                            if(isset($_SESSION['shopping_cart'])){
                                echo count($_SESSION['shopping_cart']);
                            }else{
                                echo "0";
                            }
                        ?>
                    </span>
                </button>
            </li>
        </ul>
        
        <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#products">Products</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#cart">
                Cart
                <span class="badge">
                    <?php
                        // if(isset($_SESSION['shopping_cart'])){
                        //     echo count($_SESSION['shopping_cart']);
                        // }else{
                        //     echo "0";
                        // }

                    ?>
                </span>
            </a>
        </li>

    </ul> -->


    
    <div class="tab-content" id="myTabContent">

        <div class="tab-pane fade show active" id="products-tab" role="tabpanel" aria-labelledby="pills-products-tab">

            <!-- <div class="container item-pic"> -->
            <div class="container item-pic">

                <div class="row"> 
                
                    <?php
                        $allItems = getAllFrom('*', 'items', 'WHERE Approve = 1', '',  'ItemID','');
                        foreach($allItems as $item){
                            $imgsource = empty($item['Image'])? 'admin/uploads/items/default/pill3.png' : "admin/uploads/items/" . $item['Image'];
                    ?>


                    <div class="cardy-class col-md-3 col-sm-6">
                        <div class="card cardy h-100">

                            <div class="card-header">
                                <h3>
                                    <a href="items.php?itemid=<?php echo $item['ItemID'];?>" id="name<?php echo $item['ItemID'];?>"> <?php echo $item['Name'];?> </a>
                                    <i class="fa-solid fa-cart-shopping float-end cart add_cart cart1"  id="<?php echo $item['ItemID'];?>"></i>
                                    <!-- <span><link rel="icon" type="image/x-icon" href="cart-add.ico" class="float-end"></span> -->
                                </h3>
                            </div>
                            <!-- <div class="imgbox">
                                <img src="cough3.png" class="card-img-top img-fluid" alt="...">
                            </div> -->
                            

                            <div class="card-body item-card">
                                <img class = "card-img-top" src="<?php echo $imgsource; ?>" alt = "" />
                                <span id="price<?php echo $item['ItemID'];?>" class="price-tag">$ <?php echo $item['Price']; ?></span>

                                <div class = "thumbnail item-card">
                                    <div class = "caption">
                                        <p><?php echo $item['Description'] ?> </p>
                                        <div class="date"><?php echo $item['AddDate'];?> </div>

                                        <!-- add quantity plus minus -->

                                        <!-- <div class="input-group" style="width:50%">
                                            <span class="input-group-btn">
                                                <button class="btn btn-white btn-minuse" type="button">-</button>
                                            </span> -->
                                            <input id="quantity<?php echo $item['ItemID'];?>" type="text" class="form-control no-padding add-color text-center height-25" maxlength="3" value="1">
                                            <!-- <span class="input-group-btn">
                                                <button class="btn btn-red btn-pluss" type="button">+</button>
                                            </span>
                                        </div>/input-group -->

                                        <!-- <button name="add" class=" btn btn-primary add_cart">Add</button> -->
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end of card-->
                    </div> <!-- end of col-->

       
               
            <?php }
            ?>

                </div><!--End of row-->
            </div> <!-- end of container-->
        </div>  <!-- end of tab-pane products-->


        <div class="tab-pane fade" id="cart-tab" role="tabpanel" aria-labelledby="pills-cart-tab">

        <!-- <div class="nav-item" id="cart"> -->
            <div class="table-responsive" id="order_table">
                <table class = "table table-bordered">  
                    <tr>
                        <th> Item Name </th>
                        <th> Quantity </th>
                        <th> Price </th>
                        <th> Total </th>
                        <th> Action </th>
                    </tr>   
                    <?php
                    if(!empty($_SESSION['shopping_cart'])){
                        $total = 0;
                        foreach($_SESSION["shopping_cart"] as $keys => $values){
                    ?>
                            <tr>
                                <td><?php echo $values["item_name"];?> </td>
                                <td>
                                     <!-- add quantity plus minus -->

                                     <div class="input-group" style="width:50%">
                                            <span class="input-group-btn">
                                                <button class="btn btn-white btn-minuse" type="button">-</button>
                                            </span>
                                            <input id="quantity<?php echo $item['ItemID'];?>" type="text" class="form-control no-padding add-color text-center height-25" maxlength="3" value="<?php echo $values["item_quantity"];?>">
                                            <span class="input-group-btn">
                                                <button class="btn btn-red btn-pluss" type="button">+</button>
                                            </span>
                                        </div><!-- /input-group -->
                                </td>
                                <!-- <td><?php// echo $values["item_quantity"];?> </td> -->
                                <td><?php echo $values["item_item_price"];?> </td>
                                <td><?php echo number_format($values["item_quantity"] * $values["item_price"] , 2);?></td>
                                <td> <button name="delete" class=" btn btn-danger btn-xs delete" id="<?php echo $values["item_id"];?>">Remove</button>  </td>
                            </tr>      
                            <?php
                            $total= $total + ($values["item_quantity"] * $values["item_price"]);
                    
                        }
                        ?>
                        
                        <tr>
                            <td> Total </td>
                            <td> <?php echo number_format($total , 2);?></td>
                            <td> <button name="delete" class=" btn btn-danger btn-xs deleted" id="<?php $values["item_id"]; ?>">Remove</button>  </td>
                        </tr>      
                    
                    <?php
                    }
                    ?>
            </div><!-- end of #order_table -->
        </div> <!-- end of tape-pane cart  -->
    </div> <!-- end of tab-content -->
</div><!-- end of my-container -->
<?php
}
elseif($action == 'add'){
    echo 'welcome to add page';
}


elseif($action == 'edit'){
    echo 'welcome to manage page';
}
elseif($action == 'update'){
    echo 'welcome to manage page';
}

elseif($action == 'delete'){
    echo 'welcome to manage page';
}


include $tpl . 'footer.php';

}//end of session


else{
    header('Location: index.php'); //redirect index page to login 
    exit();
}
ob_end_flush(); // Release the output
?>
