<?php
 ob_start();
 session_start();
 include 'init.php';
?>

<!-- <div class="container">
    <div class="row">  -->
        <?php
        if (isset($_GET['name'])){
            $tag = $_GET['name'];
            echo "<h1 class='text-center'>" . $tag . "</h1>";

            echo '<div class="container item-pic">';
            echo '<div class="row">';

            $tagItems = getAllFrom("*", "items", "WHERE Tags like '%$tag%'", "AND Approve = 1", "ItemID" );
            foreach($tagItems as $item){
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


            <?php
            }

            echo '</div>'; //End of row
            echo '</div>'; //end of container


        }else {
            echo 'You Must Add Page ID';
        }
        ?>
    </div>
</div>



<?php
//include "includes/template/footer.php";
 include $tpl . 'footer.php';
 ob_end_flash();
?>