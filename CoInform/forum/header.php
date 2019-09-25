<?php 
session_start();
?>
<html>
<head>
 	<title>CoInform forum</title>
	<link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
	<link rel="stylesheet" href="../css/style.css" type="text/css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">CoInform</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../index.php">Home </a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Forum <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../policies.php">Policies</a>
      </li>
      <?php if (isset($_SESSION['user_name']) && ($_SESSION['user_type']==1)) { ?>
      <li class="nav-item">
        <a class="nav-link" href="../add_event.php">Add Event</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../add_action.php">Add Action</a>
      </li>
  <?php } ?>

    	</ul>
    </div>
    <div class="float-right">
    	<ul class="navbar-nav">
    		 <li class="nav-item">
    		 	<?php if (isset($_SESSION['user_name'])) {?>
        			<a class="nav-link" href="../logout.php">Logout</a>
    			<?php } else {?>
    				<a class="nav-link" href="../login.php">Login</a>
    			<?php }?>
      </li>
    </ul>
  </div>
</nav>
