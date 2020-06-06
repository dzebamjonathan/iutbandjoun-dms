<?php

class Attachment
{
    private $connction;

    public function __construct($db)
    {
        $this->connection = $db;
    }

    public function uploadAttachment($filename)
    {
        $target_dir = "attachments"; // where to store the attachment

        $target_file = $target_dir . basename($_FILES[$filename]["name"]); //attached file
        
        if (move_uploaded_file($_FILES[$filename]["tmp_name"], $target_file)) {
            
            // insert references of the uploaded file to the attachment table
            $data = array(
                'user_id' => 1, // sample user id for now
                'url_list' => $target_file
            );

            // insert into database
            $this->connection->insert($data, 'attachments');

        } else {

            echo "Sorry, there was an error uploading your file.";
            die();
        }
    }

}
