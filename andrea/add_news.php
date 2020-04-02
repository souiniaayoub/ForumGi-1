<?php

//add_news.php

$connect = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start();
$error = [];
$description = '';
$title = '';
$content = '';
$image = '';

// script to upload image 


// Check if image file is a actual image or fake image


echo 123;

if (isset($_FILES["fileToUpload"]["name"])) {

    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
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


/*
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        $error .= '<p class="text-danger">File is not an image.</p>';
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    $error .= '<p class="text-danger">Sorry, your file is too large.</p>';
    $uploadOk = 0;
}
// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif"
) {
    $error .= '<p class="text-danger">Sorry, only JPG, JPEG, PNG & GIF files are allowed.</p>';
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/

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
if (empty($_POST["content"])) {
    $error[] = '<p class="text-danger">content is required</p>';
} else {
    $content = $_POST["content"];
}


if ($error == []) {
    $query = "
 INSERT INTO news 
 (titleNews, descriptionNews, contentNews,ImageNews,nbCommentsNews,dateNews) 
 VALUES (:titleNews, :descriptionNews, :contentNews,:ImageNews,:nbCommentsNews,:dateNews)
 ";
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':titleNews' => $title,
            ':descriptionNews'    => $description,
            ':contentNews' => $content,
            ':ImageNews' => $target_file,
            ':nbCommentsNews' => 0,
            ':dateNews'  => date("Y-m-d h:i:sa"),
        )
    );
    $success = "New Added Succesfully !";
} else {
    $failed = "Sorry, there was an error uploading your file!!!";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;


//echo $error;


/*
$data = array(
    'error'  => $error
);

echo json_encode($data);*/
