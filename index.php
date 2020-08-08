<?php require_once('header.php'); ?>
  <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
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

  <main role="main" class="inner cover">
    <p class="lead">add your journal for the day!</p>
    <!-- I had to Google what bop meant. I am very uncool -->
    <p class="lead">
      <a href="signup.php" class="btn btn-lg btn-secondary">Sign Up</a>
      <a href="login.php" class="btn btn-lg btn-secondary orange">Login</a>
    </p>
  </main>
  <footer class="mastfoot mt-auto">
    <div class="inner">
      <p> &copy; Copyright <?php echo date('yy'); ?></p>
    </div>
  </footer>
</div>
</body>
</html>
<!-- Design and layout relies on help from Bootstrap cover example - https://getbootstrap.com/docs/4.5/examples/cover/ -->
