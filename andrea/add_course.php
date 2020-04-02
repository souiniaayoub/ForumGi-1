<?php

//add_news.php

$connect = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start();
$error = [];
$description = '';
$title = '';
$teacher = '';
$level = '';
$image = '';

// script to upload image 


// Check if image file is a actual image or fake image


if (isset($_FILES["fileToUpload"]["name"])) {

    $target_dir = "courses/";
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


/// pdf requelement 
if (isset($_FILES["pdf"]["name"])) {

    $target_dir = "courses/";
    $pdf = $target_dir . basename($_FILES["pdf"]["name"]);
    $uploadOk = 1;
    $pdfFileType = strtolower(pathinfo($pdf, PATHINFO_EXTENSION));


    // Check if file already exists
    if (file_exists($pdf)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    $path_parts = pathinfo($_FILES["pdf"]["name"]);
    $extension = $path_parts['extension'];

    if ($extension != "docx" && $extension != "pdf") {
        $error[] = ' Sorry, only pdf, docx files are allowed.';
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["pdf"]["size"] > 500000) {
        $error[] = 'Sorry, your file is too large.';
        echo 'Sorry, your file is too large.';
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["pdf"]["tmp_name"], $pdf)) {
            echo "The file " . basename($_FILES["pdf"]["name"]) . " has been uploaded.";
        }
    }
} else {
    $error[] = " please add a file " . $_FILES["pdf"]["name"] . "";
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
if (empty($_POST["level"])) {
    $error[] = '<p class="text-danger">level is required</p>';
} else {
    $level = $_POST["level"];
}
if (empty($_POST["teacher"])) {
    $error[] = '<p class="text-danger">teacher is required</p>';
} else {
    $teacher = $_POST["teacher"];
}


if ($error == []) {
    $query = "
 INSERT INTO course 
 (nameCourse, descriptionCourse, level,Imagecourse,teacherId,pdf) 
 VALUES (:nameCourse, :descriptionCourse, :level,:Imagecourse,:teacherId,:pdf)
 ";
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':nameCourse' => $title,
            ':descriptionCourse'    => $description,
            ':level' => $level,
            ':Imagecourse' => $target_file,
            ':teacherId'  => $teacher,
            ':pdf' => $pdf
        )
    );
    $success = "New Added Succesfully !";
} else {
    $failed = "Sorry, there was an error uploading your file!!!";
}

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;


/*
$data = array(
    'error'  => $error
);

echo json_encode($data);
*/
