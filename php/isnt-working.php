<?php
    include 'header.php';
    if(isset($_SESSION['formPostData'])){
        include 'menuBar.php';
        include 'logoutButton.php';
        include 'footer.php';
?> 


<div id="welcomeBox">
        <br>
        <h2 class="h2prob">So your Computer is not working</h2>
        <br>
        <img class="gif" src="../images/IT.gif"/>
        <br>
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