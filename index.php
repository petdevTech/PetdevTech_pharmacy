<?php
 ob_start();
session_start();
$pageTitle = 'HomePage';
 include 'init.php';
?>

<!-- <header>
        <div class="overlay">
            <nav>
                <h2>Shop</h2>
                <ul>
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li class="cart">
                        <a href="cart.html">
                            <ion-icon name="basket"></ion-icon>Cart <span>0</span>
                        </a>
                    </li>
                    </ul>
                </ul>
            </nav>
        </div>
    </header> -->


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
//include "includes/template/footer.php";
 include $tpl . 'footer.php';
 ob_end_flash();
?>