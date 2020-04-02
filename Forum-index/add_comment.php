<?php

//add_comment.php

$connect = new PDO('mysql:host=localhost;dbname=forum', 'root', '');
session_start();
$error = '';
$comment_name = '';
$comment_content = '';

if (empty($_POST["comment_name"])) {
    $error .= '<p class="text-danger">Name is required</p>';
} else {
    $comment_name = $_POST["comment_name"];
}

if (empty($_POST["comment_content"])) {
    $error .= '<p class="text-danger">Comment is required</p>';
} else {
    $comment_content = $_POST["comment_content"];
}

if ($error == '') {
    $query = "
 INSERT INTO questions 
 (parrent_comment_id, comment, comment_sender_name,subject) 
 VALUES (:parent_comment_id, :comment, :comment_sender_name,:subject)
 ";
    $statement = $connect->prepare($query);

    $statement->execute(
        array(
            ':parent_comment_id' => $_POST['comment_id'],
            ':comment'    => $comment_content,
            ':comment_sender_name' => $_SESSION['firstName'],
            ':subject' => $comment_name
        )
    );
    $error = '<label class="text-success">Comment Added</label>';
}

$data = array(
    'error'  => $error
);

echo json_encode($data);
