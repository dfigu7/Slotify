<?php

if(isset($_POST['loginButton'])){
    //Login button was pressed
    $username = $_POST['loginUsername'];
    $password = $_POST['loginPassword'];

    //Marrim te dhenat i vendosim te funksioni qe krijuam te Account
    $result = $account->login($username, $password);

    if($result == true){
        $_SESSION['userLoggedIn'] = $username;
        header("Location: index.php");
    }
}

?>