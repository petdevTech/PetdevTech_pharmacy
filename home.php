<?php
ob_start(); // Output Buffering Start
session_start();
$pageTitle = 'Items';
include 'init.php';

?>
 <?php
     $allCats = getAllFrom('Name , CatID', 'categories', '', '',  'CatID','ASC');
?>

<header class="p-3 bg-dark text-white">
     <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
       
          <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" onchange="showCat(this.value)">
               <option selected>Select Category</option>
               <?php 
               foreach($allCats as $cat){
                  
               echo '<option value="'.$cat['CatID'].'">'  . $cat['Name'] .' </option>';
               // echo $cat['Name'];
             
               }?>
          </select>

        
      </div>
     </div>
</header>


<div id="selectedItems"><b>Person info will be listed here...</b></div>

<script>
 //function to get user select from Category in the Home page 
 function showCat(str) {
        if (str == "") {
            document.getElementById("selectedItems").innerHTML = "";
            return;
        } else {
            var xhr = new XMLHttpRequest();
            xhr.open("GET","action2.php?action="+str);
          //   console.log(xmlhttp)

            xhr.onload = () => {
          //   xmlhttp.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                document.getElementById("selectedItems").innerHTML = xhr.responseText;
            }
            };
            xhr.send()

        }
    }
</script>

<?php
  
//include "includes/template/footer.php";
 include $tpl . 'footer.php';
 ob_end_flush(); // Release the output
?>