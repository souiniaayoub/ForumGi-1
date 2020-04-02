<?php

//add_news.php

$connect = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start();
$error = [];
$description = '';
$title = '';
$date = '';
$location = '';
$image = '';

// script to upload image 


// Check if image file is a actual image or fake image


if (isset($_FILES["fileToUpload"]["name"])) {

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));



    // Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        $error[] = 'Sorry, your file is too large.';
        $uploadOk = 0;
    }
    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $error[] = ' Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        }
    }
} else {
    $error[] = " please add a file " . $_FILES["fileToUpload"]["name"] . "";
}





// finsh script upload image

if (empty($_POST["title"])) {
    $error[] = '<p class="text-danger">title is required</p>';
} else {
    $title = $_POST["title"];
}

if (empty($_POST["description"])) {
    $error[] = '<p class="text-danger">description is required</p>';
} else {
    $description = $_POST["description"];
}
if (empty($_POST["date"])) {
    $error[] = '<p class="text-danger">date is required</p>';
} else {
    $date = $_POST["date"];
}
if (empty($_POST["location"])) {
    $error[] = '<p class="text-danger">Location is required</p>';
} else {
    $location = $_POST["location"];
}


if ($error == []) {
    $query = "
 INSERT INTO event 
 (nameEvent,locationEvent, descriptionEvent, dateEvent,ImageEvent) 
 VALUES (:nameEvent,:locationEvent ,:descriptionEvent, :dateEvent,:ImageEvent)
 ";
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':nameEvent' => $title,
            ':locationEvent'    => $location,
            ':descriptionEvent' => $description,
            ':dateEvent' => $date,
            ':ImageEvent'  => $target_file,
        )
    );
    $success = "New Added Succesfully !";
    echo "good";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    // exit;
} else {
    $failed = "Sorry, there was an error uploading your file!!!";
}
