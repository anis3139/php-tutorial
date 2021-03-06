<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>PHP</title>
  <link rel="stylesheet" href="./css/style.css">
  <style>
    .logout-div {
      list-style-type: none;
    }

    .logout-div li {
      list-style: none;
      margin-bottom: 7px;
    }
  </style>
</head>

<body>

  <?php

require_once('./session.php');
 

//check route

require_once('./authCheck.php');
require_once('./route.php');
require_once('./validation.php');

// logout
if (isset($_REQUEST['logout'])) {
    $delID= $_REQUEST['logout'];
    session_destroy();
    header("Location: ./login.php");
}

?>

  <nav class="navbar navbar-expand-lg navbar-dark bg-primary logout">
    <div class="container-fluid">
      <a class="navbar-brand" href="./">PHP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse position-relative" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item">
            <a class="nav-link <?php echo $route=='home'? 'active':'' ;?> "
              aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link <?php echo $route=='user'? 'active':'' ;?>"
              aria-current="
              page" href="./user.php">User</a>
          </li>

          <li class="nav-item">
            <a class="nav-link <?php echo $route=='blogs'? 'active':'' ;?>"
              aria-current="
              page" href="./blogs.php">Blogs</a>
          </li>

        </ul>
        <div onclick="openLogout(this)" onmouseleave="logoutRemove(this)">
          <a href="#">
            <img class="rounded-circle" src="./images/download.png" width="50px" height="50px" alt="">
          </a>
          <ul class="logout-div">
            <?php  if (isset($_SESSION['name'])): ;?>
            <li>
              <?php  echo   $_SESSION['name']; ?>
              <span style="text-transform:capitalize;"> ( <?php  echo   $_SESSION['role']; ?>)</span>
            </li>
            <?php  endif ;?>
            <li>
              <a href="./password-reset.php" class="text-info">Reset Password</a>
            </li>
            <li>
              <a href="./?logout" class="text-danger" onclick="return confirm('Are u sure?')">Logout</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <script>
    var x = document.querySelector('.logout-div');

    function openLogout() {
      x.style.display = "block";
    }

    function logoutRemove() {
      setTimeout(function() {
        x.style.display = 'none';
      }, 3000);
    }
  </script>