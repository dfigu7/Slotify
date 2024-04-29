<?php
include("../../config.php");

if(isset($_POST['userId'])){
    $userId = $_POST['userId'];

    $userQuery = mysqli_query($con, "DELETE FROM users WHERE id='$userId'");
}
else{
    echo "UserId was not passed into deleteUser.php";
}

?>