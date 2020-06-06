
<?php

session_start();

//require_once 'vendor/autoload.php';
require "../classes/database.php";
require "../classes/Attachment.php";

//$loader = new \Twig\Loader\FilesystemLoader('resources/views');
//$twig = new \Twig\Environment($loader);

$DB = new DB();

//define variables 
$date_sent= $content=$sender = $recipient = 
$attachments =  $level_of_studies =  $recipient = $department_id = "";

 $errors=array();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    if(isset($_POST['submit'])){

        $date_sent = test_input($_POST["date_sent"]);

        $subject = test_input($_POST["subject"]);

        $content = test_input($_POST['content']);

        $sender = test_input($_POST['sender']);

        $recipient = test_input($_POST['recipient']);

        $attachments = $_FILES['attachments'];

        $level_of_studies = test_input($_POST["level_of_studies"]);

        $department_id = test_input($_POST["department"]); 


        if(!empty($sender)){
            $errors['sender_error']="please provide your first and name";
        } else{
            if(!filter_var($sender, FILTER_SANITIZE_STRING)){
                $errors['sender_error']="your name must be a valid string";
            }

        }
      
        
        if(empty($date_sent)){
            $errors['date_sent_error']="please provide a valid date";
        } else{
            if(!filter_var($date_sent, FILTER_VALIDATE_INT)){
                $errors['date_sent_error']="your name must be a valid string";
            }
        } 

        if(empty($level_of_studies)){
            $errors['level_of_studies_error']="please provide a valid date";
        } else{
            if(!filter_var($date_sent, FILTER_VALIDATE_INT)){
                $errors['level_of_studies_error']="your level of education must be a valid string";
            }
        } 

        if(empty($recipient)){
            $errors['recipient_error']=" your destination is required";
        } else{
            if(!filter_var($recipient, FILTER_SANITIZE_STRING)){
                $errors['recipient_error']="please provide a valid destination";
            }
        } 


        // handle file upload
        if(isset($attachments) && !empty($attachments)) {
            $attachment = new Attachment($DB);

            $attachment->uploadAttachment('attachments');
            $attachment_id = $DB->lastInsertedId('attachments', 'attachment_id');
        }else {
            $attachment_id = NULL;
        }

        // get all data
        $message_data = array(
            'date_sent' => $date_sent,
            'subject'=>$subject,
            'content' => $content,
            'sender' => $sender,
            'recipient' => $recipient,
            'attachments_id' => $attachment_id,
            'level_of_studies' => $level_of_studies,
            'department_id' => $department_id or 1,    
        );

   
        $DB-> insert ($message_data, 'messages');

    }
}


function test_input($data_collected) {

    $data_collected = trim($data_collected);

    $data_collected = stripcslashes($data_collected);

    $data_collected = htmlspecialchars($data_collected);

    return $data_collected;
}
?>

<html>
<head>
<title>PHP Contact Form</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
    <div class="form-container">
        <form name="frmContact" id="" action="messages.php" method="POST"
            action="" enctype="multipart/form-data"
            onsubmit="return validateContactForm()">

            <div class="input-row">
                <label  for="date_sent" style="padding-top: 20px;">date_sent</label> <span
                    id="" class="info"></span><br /> <input
                    type="text" class="input-field" name="date_sent"
                    id="date_sent" />
            </div>
            <div class="input-row">
                <label for="sender" style="padding-top: 20px;">sender</label> <span id=""
                    class="info1"></span><br /> <input type="text"
                     name="sender" id="sender" />
            </div>
            <div class="input-row">
                <label for="recipient" style="padding-top: 20px;">recipient</label> <span id=""
                    class="info2"></span><br /> <input type="text"
                    name="recipient" id="recipient" />
            </div>
            <div class="input-row">
                <label for="level_of_studies" style="padding-top: 20px;">level_of_studies </label> <span id=""
                    class="info"></span><br /> <input type="text"
                    name="level_of_studies" id="level_of_studies" />
            </div>
            <div class="input-row">
                <label for="subject" style="padding-top: 20px;">Subject</label> <span id="subject-info"
                    class="info"></span><br /> <input type="text"
                     name="subject" id="subject" />
            </div>
            <div class="input-row">
                <label for="department" style="padding-top: 20px;" >department</label> <span id=""
                    class="info"></span><br /> <input type="text"
                    name="department" id="department" />
            </div>

            <div class="input-row">
                <label for="content" style="padding-top: 20px;">content</label> <span id=""
                    class="info"></span><br />
                <textarea name="content" id="content"
                    class="input-field" cols="60" rows="15"></textarea>
            </div><br><br>

            <div class="input-row">
                  Select file to upload:<br>
                  <input type="file" name="attachments" id="attachments">
                  <!-- <input type="submit" value="Upload Image" name="submit"> -->

            </div><br><br>


            <div>
                <input type="submit" name="submit" class="btn-submit"
                    value="submit"  id="submit"/>
            </div>
        </form>
    </div>
</body>
</html>

