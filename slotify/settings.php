<?php
include("includes/includedFiles.php");
?>

<div class="entityInfo">

    <div class="centerSection">
        <div class="userInfo">
            <h1><?php echo $userLoggedIn->getFirstAndLastName();?></h1>
        </div>

        <div class="buttonItems">
            <div class="button" onclick="openPage('updateDetails.php')">USER DETAILS</div>
            <div class="button" onclick="logout()">LOGOUT</div>
        </div>
    </div>
</div>