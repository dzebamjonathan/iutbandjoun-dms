<?php
// Make use of session
session_start();

require_once 'vendor/autoload.php';
require "classes/database.php";

$access_error = '';
if(isset($_GET['authentication_failed'])) {
    $access_error = $_GET['authentication_failed'];
}

$loader = new \Twig\Loader\FilesystemLoader('resources/views');
$twig = new \Twig\Environment($loader);

//define variables 
$email = $password = $email_error = $password_error = "";
$errors = array();

if($_SERVER["REQUEST_METHOD"] == "POST"){
    //   var_dump($_POST);
    //   die();


    $email = test_input($_POST["email"]);

    $password = test_input($_POST["password"]);

    if(empty($email)) {
        $errors['email_error'] = "Email address is required";
    }else {
        // check if email is valid
        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email_error'] = "Your email address is not valid";
        }
    }

   
    if(empty($password)){
        $errors['password_error'] ="your password is required";
    }

    // if there are not errors, check the database for this user
    if(count($errors)) {
        // there are errors
    }else {
        // open database connection
        $db = new DB();

        // find user in database with the password and email
        $table =  'users';
        $condition = "email = '$email'";
        $verified_user = $db->selectWhere($table, $condition);

        // print("<pre>");
        // var_dump($verified_user);
        // print("</pre>");

        // confirm the user password
        if($verified_user->password == $password) {
            // create a session for this user
            $_SESSION['active_user'] = $verified_user->id;
            $_SESSION['success_message'] = 'Login success';

            // Redirect the user to the dashboard
            header("Location: account/dashboard.php");

        }else {
            print "<h1 style='color: red;'>Wrong Password!</h1><br>";
        }
    }
    
  

}

//function to verify inputs

function test_input($data_collected){
    $data_collected= trim($data_collected);

    $data_collected= stripcslashes($data_collected);

    $data_collected= htmlspecialchars($data_collected);

    return $data_collected;
}


// show the template for this file
echo $twig->render('login.twig', [
    'error' => $errors,
    'access_error' => $access_error
]);





