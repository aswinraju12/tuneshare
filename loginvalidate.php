<?php require_once('connect.php');
$ok = true; 

$user_name = trim(filter_input(INPUT_POST, 'user_name')); 
$password = trim(filter_input(INPUT_POST, 'password'));

if(empty($user_name)) {
    echo "<p> Please provide your username! </p>"; 
    $ok = false; 
}
if(empty ($password)){
    echo "<p> Please provide your password! </p>"; 
    $ok = false; 
}


if($ok === true ) {
    $sql = "SELECT user_id, user_name, password FROM user_data WHERE user_name = :user_name"; 
    $stmt = $db->prepare($sql); 
    $stmt->bindParam(":user_name", $user_name); 
    $stmt->execute(); 
    if($stmt->rowCount() == 1){
        if($row = $stmt->fetch()) {
            if(password_verify($password, $row["password"])) {
                session_start(); 
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION["user_name"] = $row["user_name"];  
                header("location:view.php"); 
            }
            else {
                echo "<p> Problem validating your password!</p>"; 
            }
        }
        else {
            echo "<p> Error accessing your data!</p>";  
        }
    }
    else {
        echo "<p> No user found!</p>"; 
    } 
}
else {
    echo "<p> Sorry something went wrong! </p>"; 
}
$stmt->closeCursor();
?>