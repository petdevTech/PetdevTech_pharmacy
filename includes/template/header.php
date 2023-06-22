<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?php getTitle()?></title>
        <link rel="stylesheet" href="<?Php echo $css;?>bootstrap.min.css">
        <link rel="stylesheet" href="<?Php echo $css;?>all.min.css">
        <link rel="stylesheet" href="<?Php echo $css;?>jquery-ui.min.css">
        <link rel="stylesheet" href="<?Php echo $css;?>jquery.selectBoxIt.css">
        <link rel="stylesheet" href="<?Php echo $css;?>frontend.css">
        <!-- addded from cart page -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 

    </head>
    <body>



    <header>
    <div class="px-3 py-2 bg-dark text-white">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="/" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <!-- <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg> -->
          </a>

          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="#" class="nav-link text-secondary">
                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#home"/></svg> -->
                Home
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#speedometer2"/></svg> -->
                Dashboard
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#table"/></svg> -->
                Orders
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#grid"/></svg> -->
                Products
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white">
                <!-- <svg class="bi d-block mx-auto mb-1" width="24" height="24"><use xlink:href="#people-circle"/></svg> -->
                Customers
              </a>
            </li>

        <!-- Start of Session and login Button -->
            <li class="text-end nav-link">
                <?php
                    if (isset($_SESSION['user'])){?>
                        <img class = "my-image img-thumbnail rounded-circle" src="images/7.png" alt = "" />
                        <div class="btn-group my-info float-end">
                            <span class="btn dropdown-toggle " data-bs-toggle="dropdown">
                                <?php echo  $sessionUser ; ?>
                                <span class="caret"></span>
                            </span>
                            <ul class="dropdown-menu">
                                <li><a href="profile.php">Profile</a></li>
                                <li><a href="newAd.php">New Ad</a></li>
                                <li><a href="profile.php#my-items">My Items</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </div> 
                <?php
                    }else{
                ?>
                <a href="form.php" >
                    <button type="button" class="btn btn-outline-light me-2">Login/Signup</button>
                                <!-- <span class="float-end ">Login/Signup</span> -->
                </a>
                <?php } ?>

            </li>

        <!-- End of Session and login Button -->


          </ul>
        </div>
      </div>
    </div>

    

    <!-- second Line in Header -->
    <div class="px-3 py-2 border-bottom mb-3 bg-dark text-white">
      <div class="container d-flex flex-wrap justify-content-center">


        <nav class="navbar navbar-expand-lg navbar-dark">
      <!-- <div class="pics"> -->
            <div class="container containerNav">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="nav navbar-nav ms-auto">
                    <?php
                    $allCats = getAllFrom("*", "categories", "where Parent = 0", "", "CatID", "ASC");
                    foreach ($allCats as $cat){
                    echo  '<li  class="nav-item">
                                <a class="nav-link" href="categories.php?pageid= ' . $cat['CatID'] .'">
                                    ' . $cat['Name'] . '
                                </a>
                            </li>';
                    }
                    ?>

                   
                    <li class="cart">
                        <a href="cart.php">
                            <ion-icon name="basket"></ion-icon>Cart <span>0</span>
                        </a>
                    </li>

                    <!-- <li class="nav-item">
                        <a href="cart.php">
                            <i class="fa-solid fa-cart-shopping float-end cart"></i>
                        </a>
                    </li> -->
                </ul>                
                
                </div>
            </div>
        <!-- </div> End of pics Div -->
        </nav>



      </div>
    </div>
    <!--End of second Line in Header -->

  </header>




   
        
        


