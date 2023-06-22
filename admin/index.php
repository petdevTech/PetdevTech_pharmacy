 <?php
 session_start();
 $noNavBar =''; 
 $pageTitle='Login'; 
 if(isset($_SESSION['Username'])){
    header('Location: dashboard.php'); //redirect to dashboard page
 }
 include 'init.php';
?>

<?php

if ($_SERVER['REQUEST_METHOD']== 'POST'){
$username =$_POST['username'];
$password =$_POST['password'];
$hashedPass=sha1($password);

//chec if the user exists in database

$stmt=$conn->prepare("SELECT `UserID`,`Username` , `Password`
                      FROM
                         users 
                      WHERE
                           `Username` =?
                      AND 
                           `Password` = ? 
                      AND 
                            GroupID =1  
                      LIMIT 1");
$stmt->execute(array($username , $hashedPass));
$row = $stmt ->fetch();
$count = $stmt->rowCount();
 echo $count;

//if count >0 this means the database contain record about this username

if ($count > 0){
$_SESSION['Username'] = $username;
$_SESSION['ID'] = $row['UserID'];
header('location: dashboard.php'); //redirect to dashboard page
exit();
} 
// else{
//    echo '<div class="text-center the-errors">There is no such user </div>';
// }

}

?>

<div id ="login" class="container-fluid login-page">
   <h1 class="text-center">
      <span class="selected" data-class="login">Login</span>
   </h1>
 
   <form id="loginadmin" class="loginadmin" action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
   <h4 class="text-center">Admin</h4>

      <div class="form-floating">
         <input 
               class="form-control" 
               id="floatinguser"
               type="text" 
               name="username" 
               placeholder="Username"
               autocomplete="off">
               <label for="floatinguser">Username</label>
      </div>
      <div class="form-floating">
         <input  
               class="form-control" 
               id="floatingpass"
               type="password" 
               name="password" 
               placeholder="Password" 
               autocomplete="new-password">
               <label for="floatingpass">Password</label>
      </div>
        <input  class ="btn btn-primary btn-block" name="login" type="submit" value="Login"/> 


   <!-- <input id="floatinguser" class="form-control input-lg" type="text" name="user" autocomplete="off"/>
   <label for="floatinguser">Username</label>

   <input id="floatingpass" class="form-control input-lg" type="text" name="pass" autocomplete="new-password"/>
   <label for="floatingpass">Password</label>

   <input  class ="btn btn-lg btn-primary btn-block" type="submit" value="Login"/> 
-->
   </form> 

</div>
<?php
//include "includes/template/footer.php";
 include $tpl . 'footer.php';
?>