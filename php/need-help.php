<?php
    include 'header.php';
    if(isset($_SESSION['formPostData'])){
        include 'menuBar.php';
        include 'logoutButton.php';
        include 'footer.php';
    
?> 


<div id="welcomeBox">
        <h2 class="h2prob">Please call IT Supprot System at:<br></h2>
        <h3 class="h1prob">☏ (888)-888-8888</h3>
        <br>
        <p class="makeSure">Please do not forget to logout</p>
        <br>

</div>

<?php
}
else{
    header('Location: ITSupportSystemLogin.php');
}
?>