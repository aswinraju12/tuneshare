<?php require_once('header.php'); ?>
<body class="add">
<div class="container inner saved">
<header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Journal Entry</h3>
      <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="add.php">Add Journal Entry</a>
        <a class="nav-link" href="view.php">View Journal</a>
      </nav>
    </div>
  </header>
<h1> TuneShare - Share Your Fave Tunes & Join The Community </h1>
<main>
    <?php

    $user_name = filter_input(INPUT_POST, 'user_name');
    $password = filter_input(INPUT_POST, 'password');
    $conpassword = filter_input(INPUT_POST, 'conpassword');

    $ok = true;

    if (empty($user_name)) {
        echo "<p class='error'>Please provide username </p>";
        $ok = false;
    }

    if (empty($password) || empty($conpassword)) {
        echo "<p class='error'>Please provide your password!</p>";
        $ok = false;
    }

    if ($password!=$conpassword) {
        echo "<p class='error'>Please put in a correct password!</p>";
        $ok = false;
    }
 

    if ($ok === true) {
        try {
            require_once('connect.php');
            if (!empty($id)) {
                $sql = "UPDATE user_data SET user_name = :user_name, password = :password WHERE user_id = :user_id;";
            } else {
                //this is a new tune we are adding to our app 
                // set up an SQL command to save the info 
                $sql = "INSERT INTO user_data (user_name, password) VALUES (:user_name, :password)";
            }
            $param_password = password_hash($password, PASSWORD_DEFAULT);
            $statement = $db->prepare($sql);

            $statement->bindParam(':user_name', $user_name);
            $statement->bindParam(':password', $password);
            $statement->bindParam(":password", $param_password);

            //if we are updating, bind :user_id 
            if (!empty($id)) {
                $statement->bindParam(':user_id', $id);
            }

            // execute the insert
            $statement->execute();

            // show message
            echo "<p> register success </p>";

            // disconnecting
            $statement->closeCursor();
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            //show error message to user
            echo "<p> Sorry! We weren't able to process your submission at this time. We've alerted our admins and will let you know when things are fixed! </p> ";
            echo $error_message;
            //email app admin with error
            mail('youremailhere@gmail.com', 'TuneShare Error', 'Error :' . $error_message);
        }
    }
    ?>
    <a href="index.php" class="btn btn-lg btn-secondary orange"> Back to Form </a>
</main>
<?php require_once('footer.php'); ?>
