<?php 
//include 'connection.php';
session_start();
if (isset($_POSTE['user']))
{
$user = $_POST['user'];
$get_user = $mysqli->query("SELECT * FROM users WHERE username = '$user'");
if ($get_user->num_rows == 1)
{
    $profile_data = $get_user->fetch_assoc();
           
}

            // Redirect the user to the dashboard
            header("Location: account/settings.php");
       
} 
?>

<!DOCTYPE html>
<html>    
<head>        
 <meta charset="UTF-8">
         <title><?php echo $profile_data['username'] ?>'s Profile</title>
</head>
<body>
    <a href="setting.php">Home</a><?php echo $profile_data['username'] ?>'s Profile

    <h3> personal information </h3><?php  $visitor = $_SESSION['username']?>

           <?php  if ($user == $visitor)?>


         <a href="edit-profile.php?user=<?php echo $profile_data['username'] ?>">Edit Profile</a>            <?php

        ?>        </h3>        
        <table>
                    <tr>                
                     <td>first_name:</td><td><?php echo $profile_data['first_name'] ?></td>   
                    </tr>
                    <tr>                
                     <td>last_name:</td><td><?php echo $profile_data['last_name'] ?></td> 
                    </tr> 
                    <tr>
                        <td>email:</td><td><?php echo $profile_data['email'] ?></td>
                    </tr>
                    <tr>
                        <td>reditration_number:</td><td><?php echo $profile_data['registration_number'] ?></td> 
                    </tr>   
                    <tr>
                        <td>password:</td><td><?php echo $profile_data['password'] ?></td> 
                    </tr>             
                    <tr>
                        <td>date_of_birth:</td><td><?php echo $profile_data['date_of_birth'] ?></td> 
                    </tr> 
                    <tr>
                        <td>gender:</td><td><?php echo $profile_data['gender'] ?></td> 
                    </tr>                         
        </table> 
    </body>
</html> 














<div class="container">

    <form method="POST" action="settings.php">
        <h3 class="font-weight-bold text-center">Edit your Account</h3>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="first_name">First name {{first_name}}</label>
                <p class="mb-0 small text-danger">{{ first_name_error }}</p>
                <input id="first_name" class="form-control" type="text" name="first_name">
            </div>
            <div class="form-group col-md-6">
                <label for="last_name">Last name</label>
                <p class="mb-0 small text-danger">{{last_name_error}}</p>
                <input id="last_name" class="form-control" type="text" name="last_name" >
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="email">Email address</label>
                <p class=" mb-0 small text-danger">{{email_error}}</p>
                <input id="email" class="form-control" type="text" name="email" >
            </div>
            <div class="form-group col-md-6">
                <label for="department" class=" mb-2">Select your department</label>
                <p class=" mb-0"> </p>
                <select id="department" class="form-control" name="department">
                    <option>Telecommunications</option>
                    <option>Computer Engineering</option>
                    <option>Civil Engineering</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="password">Create a password</label>
            <input id="password" class="form-control" type="password" name="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" 
            title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required><br>
        </div>

        <div class="row">
            <div class="form-group col-md-6">
                <label for="registration_number">Registration number</label>
                <p class="mb-0 small text-danger">{{registration_number_error}}</p>
                <input id="registration_number" class="form-control" type="text" name="registration_number">
            </div>
            <div class="form-group col-md-6">
                <label for="telephone_number">Telephone number</label>
                <p class=" mb-0 small text-danger">{{telephone_number_error}}</p>
                <input id="telephone_number" class="form-control" type="text" name="telephone_number">
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="label-control">Date of birth</label>
                   
                    <input type="date" class="form-control datetimepicker" id="date_of_birth" name="date_of_birth" value="">
                   
                </div>
            </div>

            <div class="col-md-6">
                <p class="text-muted">Gender</p>
                <div class="form-radio form-check-inline">
                    <input id="male" class="form-check-input" type="radio" name="gender" value="1" selected>
                    <label for="male" class="form-check-label">Male</label>
                </div>
                <div class="form-radio form-check-inline">
                    <input id="female" class="form-check-input" type="radio" name="gender" value="0">
                    <label for="female" class="form-check-label">Female</label>
                </div>
            </div>
        </div>

        <div class="form-group text-center pt-4">
            <input type="submit" class="btn btn-warning" value="Update profile">
        </div>
    </form>

</div>