<?php
    include 'header.php';
    if(isset($_SESSION['formPostData'])){
        $postedData = $_SESSION['formPostData'];
    }
    else{
        header('Location: ITSupportSystemLogin.php');
      }
      include 'menuBar.php';
      include 'logoutButton.php';
      include 'footer.php';
    
    if($postedData['role'] === "Admin"){
           echo "<h2 class=\"h2prob\">Your New Account is created successfully.</h2>
           <br><br><p class=\"makeSure\">Please make sure to Logout</p>";
        }
    if($postedData['role'] === "Manager"){
            echo "<h2 class=\"h2prob\">Your Password is resetted successfully.</h2>
            <br><br><p class=\"makeSure\">Please make sure to Logout</p>";
        }
    
    
?>