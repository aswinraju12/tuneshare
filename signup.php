<?php require_once('header.php'); ?>
<body class="add">
<div class="container inner">
<header class="masthead mb-auto">
    <div class="inner">
      <h3 class="masthead-brand">Journal Entry</h3>
      <nav class="nav nav-masthead justify-content-center">
      <a class="nav-link" href="index.php">Home</a>
        <a class="nav-link" href="add.php">Add Journal Entry</a>
        <a class="nav-link" href="view.php">View Journal</a>
      </nav>
    </div>
    <main>
      <form action="signupproccess.php" method="post" enctype="multipart/form-data" class="form">
        <div class="form-group">
          <label for="user_name"> enter a Username  </label>
          <input type="text" name="user_name" class="form-control" id="user_name">
        </div>
        <div class="form-group">
          <label for="password"> choose a Password  </label>
          <input type="password" name="password" class="form-control" id="password">
        </div>
        <div class="form-group">
          <label for="conpassword"> enter your password again  </label>
          <input type="password" name="conpassword" class="form-control" id="conpassword">
        </div>
        <input type="submit" name="submit" value="Submit" class="btn">
      </form>
    </main>
    <?php require_once('footer.php'); ?>