<?php
    include 'header.php';
    if(isset($_SESSION['formPostData'])){
        include 'menuBar.php';
        include 'logoutButton.php';
        include 'footer.php';
        
?> 


<div id="welcomeBox">
        <a href="send-email.php"><h2 class="h2prob">Click here to send email to reset the passowrd</h2></a>
</div>

<?php
}
else{
    header('Location: ITSupportSystemLogin.php');
}


?>