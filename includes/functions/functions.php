<?php

// /**
//  **video num 113
//  **Get all functions v1.0
//  **Function To Get All Records From any Database Table
//  */

// function getAllFrom($tablename, $orderBy, $where = NULL){
//    global $conn;
//    $sql = $where == NULL ? '' : $where;
//    $getAll = $conn->prepare("SELECT * FROM $tablename $sql ORDER BY $orderBy DESC");
//    $getAll->execute();
//    $all = $getAll->fetchAll();
//    return $all;
// }

/**
 **video num 113
 **Get all functions v2.0
 **Function To Get All Records From any Database Table
 */

function getAllFrom($field, $table, $where = NULL, $and = NULL,  $orderField, $ordering = "DESC"){
   global $conn;
   $sql = $where == NULL ? '' : $where;
   $getAll = $conn->prepare("SELECT $field FROM $table $where $and ORDER BY $orderField $ordering");
   $getAll->execute();
   $all = $getAll->fetchAll();
   return $all;
}


/************************************************************************************************
 ***The following functions are not userd any more  and getAllFrom() function is used instead ***
 ***********************************************************************************************/

         /**
          **video num 82
         **Get Latest categoies function v1.0
         **Function To Get Categories From Database [Users, Items , Comments]
         */

         function getCat(){
            global $conn;
            $getCat = $conn->prepare("SELECT * FROM categories ORDER BY ID ASC");
            $getCat->execute();
            $cats = $getCat->fetchAll();
            return $cats;
         }



         /**
          **video num 82
         **Get Latest items function v1.0
         **Function To Get items From Database [Users, Items , Comments]
         */
         /*
         function getItem($where , $value){
            global $conn;
            $getItem = $conn->prepare("SELECT * FROM items WHERE $where = ? ORDER BY Item_ID DESC");
            $getItem->execute(array($value));
            $items = $getItem->fetchAll();
            return $items;
         }
         */

         /**
          **video num 109
         **Get Latest items function v2.0
         **Function To Get items From Database [Users, Items , Comments]
         */

         function getItem($where , $value, $approve = NULL){
            global $conn;
            $sql = $approve == NULL ? 'AND Approve = 1' : '';
            /*
            if ($approve == NULL){
               $sql = 'AND Approve = 1';
            }else{
               $sql = NULL;
            }
            */
            $getItem = $conn->prepare("SELECT * FROM items WHERE $where = ? $sql ORDER BY Item_ID DESC");
            $getItem->execute(array($value));
            $items = $getItem->fetchAll();
            return $items;
         }


/************************************************************************************************
 ********************** Till Here getAllFrom() function is used instead ************************
 ***********************************************************************************************/




/**
 **check if user is not Activated
 **function to check the regstatus of the user
 */
function checkUserStatus($user){  
   global $conn;
   $stmt5=$conn->prepare("SELECT 
                           `Username` , `RegStatus`
                        FROM
                           users 
                        WHERE
                           `Username` =?
                        AND 
                           `RegStatus` = 0 ");
   $stmt5->execute(array($user));
   $status = $stmt5->rowCount();
   return $status;
}


/*
**video num 34
**check items function v1.0
**function that checks for an item in database[this function accepts parameters]
**$select = the item to select [Example : user , items , categories]
**$from = the table to select from [Example : users , items , categories]
**$value = the value of select [Example : petros , box , electronics ]
*/

function checkItem($select , $from , $value ){
   global $conn;
   $stmtFun = $conn->prepare("SELECT $select FROM $from WHERE $select = ?");
   $stmtFun -> execute(array($value));
   $count = $stmtFun->rowCount();
   //echo $count;  //this will print the value on the page ,
                   //there is situations where we don't want to print the value 
                   //but want to save the value to deal with it in another way.
    return $count; //thus there is a need for return
   }


   



























   function getTitle(){
      global  $pageTitle;

      if(isset( $pageTitle)) {
       echo  $pageTitle; }

      else{
    echo 'Default';}

   }



/*
** video num 32
** home redirect function v1.0
**[that accepts parameters]
** $erroMsg = echo the error message
**$seconds = seconds before redirecting
*/
/*
function redirectHome($errorMsg , $seconds = 3){
    echo "<div class='alert alert-danger'>$errorMsg</div>";
    echo "<div class='alert alert-info'>You will be redirected to Home Page after $seconds Seconds";
    header("refresh: $seconds; url=index.php");
    exit();
}
*/


/*
** video num 35
** home redirect function v2.0
**[that accepts parameters]
** $erroMsg = echo the error message
**$seconds = seconds before redirecting
*/


function redirectHome($Msg , $url = null , $seconds = 3){
   if($url === null){
      $url = 'index.php';
      $link = 'Home Page';
   } 
   else{
      
           if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){
              $url = $_SERVER['HTTP_REFERER'];
              $link = 'Previous Page';
           }else{
              $url = 'index.php';
              $link = 'Home Page';
           }
            /***If Condition Short Notation****/
         //  $url =isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '' ? $_SERVER['HTTP_REFERER'] : 'index.php';
  
   }
  
     echo $Msg;
     echo "<div class='alert alert-info'>You will be redirected to   $link   after $seconds Seconds";
     header("refresh: $seconds; url=$url");
     exit();
  }
  


   /*
**count number of items function v1.0
**function to count number of items rows
**$Item = the item to count
**$table = the tabl to choose from
*/

function countItem($item , $table){
   global $conn;
   $stmt2 = $conn->prepare("SELECT COUNT($item) FROM $table");
   $stmt2->execute();
   return $stmt2->fetchColumn();
}



?>