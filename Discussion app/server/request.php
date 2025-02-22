<?php
// print_r($_POST); in the form of array
session_start();
include("../common/db.php");
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("insert into `users`
    (`username`,`email`,`password`,`address`) values ('$username','$email','$password','$address'); ");
    $result = $user->execute();
     $user->insert_id;
    if ($result) {
        $_SESSION["see"] = ["username" => $username, "email" => $email,"user_id"=>$user->insert_id];
        header("location: /soft");
    } else {
        echo "Not Registered ";
    }
}
// request for login..
else if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username="";
    $user_id=0;
   $query="select * from users where email='$email' and password='$password'";
   $result = $conn->query($query);

    if ($result->num_rows==1) {
        foreach($result as $row){
            $username= $row["username"];
            $user_id=$row["id"];
        }
        $_SESSION["see"] = ["username" => $username, "email" => $email,"user_id"=>$user_id];
        header("location: /soft");
    } else {
        echo "Not Registered ";
    }
   
}
// request for logout..
else if(isset($_GET['logout'])){
    session_unset();
    header("location: /soft");
}
// request for question asking...
else if(isset($_POST['ask'])){
    // print_r($_POST);
    // print_r($_SESSION);

    $title = $_POST['title'];
    $description = $_POST['description'];
    $category_id = $_POST['category'];
    $user_id = $_SESSION['see']['user_id'];

    $question = $conn->prepare("insert into `questions`
    (`title`,`description`,`category_id`,`user_id`) values ('$title','$description','$category_id','$user_id'); ");
    $result = $question->execute();
     $question->insert_id;
    if ($result) {
        header("location: /soft");
    } else {
        echo "question is not Proceed ";
    } 
}
else if (isset($_POST['ans'])){
//  print_r($_POST);
    $answer = $_POST['ans'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['see']['user_id'];

    $query = $conn->prepare("insert into `answers`
    (`answer`,`question_id`,`user_id`) values ('$answer','$question_id','$user_id');");
    $result = $query->execute();
    if ($result) {
        header("location: /soft?q-id=$question_id");
    } else {
        echo "Answer is not Submitted ";
    } 
}
// for Delete request..
else if(isset($_GET['delete'])){
    $qid=$_GET['delete'];
    $query = $conn->prepare("delete from  questions where id=$qid");
    $result = $query->execute();
    if ($result) {
        header("location: /soft");
    }else{
        echo "Question not deleted ! ";
    }
}
?>
