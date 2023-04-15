<?php
    include 'header.php';

    function myHtmlspecialchars($s, $flags = null) {
        if (is_string($s)) {
        return ($flags === null) ?
            htmlspecialchars($s) :
            htmlspecialchars($s, $flags);
        } else {
        return "";
            }
    }

    $formComplete = false;

    $theTitle = myHtmlspecialchars($_POST["theTitle"] ?? "", ENT_QUOTES);
    $firstName = myHtmlspecialchars($_POST["firstName"] ?? "", ENT_QUOTES);
    $lastName = myHtmlspecialchars($_POST["lastName"] ?? "", ENT_QUOTES);
    $role = myHtmlspecialchars($_POST["role"] ?? "", ENT_QUOTES);

    if (isset($_POST["submit"]) && $_POST["submit"] === "Submit") {

        $formComplete = true;
        $errorMessages = [];

        if (!in_array($theTitle, ["Mr", "Mrs", "Ms", "Mx"])) {
            $formComplete = false;
            array_push($errorMessages, "Title missing");
        }
        if (trim($firstName) === "") {
            $formComplete = false;
            array_push($errorMessages, "First Name missing");
        }
        if (trim($lastName) === "") {
            $formComplete = false;
            array_push($errorMessages, "Last Name missing");
        }
        if (!in_array($role, ["Admin", "Manager", "CEO"])) {
            $formComplete = false;
            array_push($errorMessages, "Role missing");
        }

        if ($formComplete) {
            $_SESSION['formPostData'] = $_POST;
            header('Location: problem.php');
        }
    else {
            echo "<div class=\"vErrors\"><p class=\"VEbold\">Validation errors:</p><ul>";
            foreach ($errorMessages as $errorMessage) {
                echo "<li>$errorMessage</li>";
            }
            echo "</ul></div>";
    }
}
include 'menuBar.php';
    if (!$formComplete) {

?>

<html>    
    <body>
         <br>
         <br>
        <div id="welcomeBox">

            <h1 class="middleText">Welcome to IT Support System</h1>
            
            <br>
                        
            <form action="ITSupportSystemLogin.php" method="POST" class="ProblemReg">

                <div>
                    <label for="theTitle" class="formLabel">Title</label><br>
                    <select title="theTitle" name="theTitle" class="firstFormField inARow">
                        <option value=""<?php
                            if ($theTitle === "") {
                                echo " selected";
                            }
                        ?>>--Please choose --</option>
                        <option value="Mr"<?php
                            if ($theTitle === "Mr") {
                                echo " selected";
                            }
                        ?>>Mr</option>
                        <option value="Mrs"<?php
                            if ($theTitle === "Mrs") {
                                echo " selected";
                            }
                        ?>>Mrs</option>
                        <option value="Ms"<?php
                            if ($theTitle === "Ms") {
                                echo " selected";
                            }
                        ?>>Ms</option>
                        <option value="Mx"<?php
                            if ($theTitle === "Mx") {
                                echo " selected";
                            }
                        ?>>Mx</option>
                    </select>
                </div>
                            <br>
                <div class="nameLabel">
                    <label for="firstName" class="formLabel">First Name</label>
                    <input title="firstName" type="text" name="firstName" value="<?=$firstName?>" class="inARow">
                </div>

                <div class="nameLabel">
                    <label for="lastName" class="formLabel">Last Name</label>
                    <input title="lastName" type="text" name="lastName" value="<?=$lastName?>" class="inARow">
                </div>

                <div class="role">
                    <label for="role" class="formLabel">Role</label>
                    <select title="role"  name="role" class="inARow">
                        <option value=""<?php
                            if ($role === "") {
                                echo " selected";
                            }
                        ?>>--Please choose --</option>
                        <option value="Admin"<?php
                            if ($role === "Admin") {
                                echo " selected";
                            }
                        ?>>Admin</option>
                        <option value="Manager"<?php
                            if ($role === "Manager") {
                                echo " selected";
                            }
                        ?>>Manager</option>
                        <option value="CEO"<?php
                            if ($role === "CEO") {
                                echo " selected";
                            }
                        ?>>CEO</option>
                    </select>
                </div>

                <div>
                    <input type="submit" name="submit" value="Submit" class="lastFormField blueButton">
                </div>

            </form>
            
            <?php
            }
            ?>
            <br>
        </div> 


    </body>


</html>

<?php
    include 'footer.php';
?>