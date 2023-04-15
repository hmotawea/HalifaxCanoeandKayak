<?php
    include 'header.php';
    if(isset($_SESSION['formPostData'])){
        $postedData = $_SESSION['formPostData'];
    }
    else{
        header('Location: ITSupportSystemLogin.php');
    }
    include 'menuBar.php';
?>
       <br><p></p><br><p></p>
                <a href="logout.php" class="rightSide paddingRightOnly">
                    <button type="button" class="redButton">Logout</button>
                </a>
                <br>

        <div class="prob">
            <h1 class="h1prob">Hello <?=$postedData['theTitle']?>. <?=$postedData['firstName']?> <?=$postedData['lastName']?></h1>
            <br>
            <h2 class="h2prob">Please click on the appropiate link:</h2>

            <?php
                if($postedData['role'] === "Admin"){
            ?>
                <a href="isnt-working.php" class="link">My Computer is not working</a>
                <br>
                <br>
                <a href="new-account.php" class="link">Create New Account</a>

            <?php
            }
                if($postedData['role'] === "Manager"){
            ?>
                <a href="isnt-working.php" class="link">My Computer is not working</a>
                <br>
                <br>
                <a href="lost-password.php" class="link">I forgot My Password</a>
            
            <?php
            }
                if($postedData['role'] === "CEO"){
            ?>
                <a href="isnt-working.php" class="link">My Computer is not working</a>
                <br>
                <br>
                <a href="need-help.php" class="link">I need help</a>
            
            <?php
            }
        
            ?>
        </div>


<?php
    include 'footer.php';
?>