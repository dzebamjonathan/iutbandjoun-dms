<?php
session_start();

require_once '../vendor/autoload.php';
require_once '../classes/database.php';


$DB = new DB();


//define variables 
$first_name = $last_name = $email = $department = $password = $registration_number = $telephone_number = $date_of_birth
    = $gender = "";

// array to hold all errors
$errors = array();

// by default get this user data and put on the form
$user = $DB->selectWhere('users', "id = {$_SESSION['active_user']}");


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $first_name = test_input($_POST["first_name"]);

    $last_name = test_input($_POST["last_name"]);

    $email = test_input($_POST["email"]);

    $department = test_input($_POST["department"]);

    $password = test_input($_POST["password"]);

    $registration_number = test_input($_POST["registration_number"]);

    $telephone_number = test_input($_POST["telephone_number"]);

    $date_of_birth = test_input($_POST["date_of_birth"]);

    $gender = test_input($_POST["gender"]);




    if (empty($first_name)) {

        $errors['first_name_error'] = "your first name is required";
    } else {
        if (!filter_var($first_name, FILTER_SANITIZE_STRING)) {
            $errors['first_name_error'] = "first name must be a valid string";
        }
    }

    if (empty($last_name)) {
        $errors['last_name_error'] = "your last name is required ";
    } else {
        if (!filter_var($first_name, FILTER_SANITIZE_STRING)) {
            $errors['last_name_error'] = "your last name most be a valid string";
        }
    }

    if (empty($email)) {
        $errors['email_error'] = "Email address is required";
    } else {
        // check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email_error'] = "Your email address is not valid";
        }
    }
    if (empty($registration_number)) {
        $errors['registration_number_error'] = " enter your matricule";
    } else {
        // check if refistration number  is valid
        if (!filter_var($registration_number, FILTER_SANITIZE_STRING)) {
            $errors['regristration_number_error'] = "Your matricule number is not valid";
        }
    }

    if (empty($telephone_number)) {
        $errors['telephone_number_error'] = " enter your telephone number";
    } else {
        // check if phone mumber is valid
        if (!filter_var($telephone_number, FILTER_VALIDATE_INT)) {
            $errors['telephone_number_error'] = "Your phone number is not valid";
        }
    }

    // get all data
    $data = array(
        'first_name' => $first_name,
        'last_name' => $last_name,
        'email' => $email,
        'registration_number' => $registration_number,
        'password' => $password,
        'date_of_birth' => $date_of_birth,
        'gender' => $gender,
        'telephone_number' => $telephone_number,
        'department' => $department,
        'image' => 'default'
    );

    $condition = "id = {$_SESSION['active_user']}";
    $DB->update($data, 'users', $condition);
}



//function

function test_input($data_collected)
{

    $data_collected = trim($data_collected);

    $data_collected = stripcslashes($data_collected);

    $data_collected = htmlspecialchars($data_collected);

    return $data_collected;
}

function validation_first_name($first_name)
{
    $first_name = filter_var($first_name, FILTER_SANITIZE_STRING);
    return $first_name;
}



$loader = new \Twig\Loader\FilesystemLoader('../resources/views/account');
$twig = new \Twig\Environment($loader);

// $flash_message = $_SESSION['success_message'];

if(isset($flash_message) && !empty($flash_message)) {
    // show the template for this file
    echo $twig->render('dashboard.twig', [
        // 'flash_message' => $flash_message,
        'user' => $user
    ]);
}else {
    // show the template for this file
    echo $twig->render('settings.twig', ['user' => $user]);
}



