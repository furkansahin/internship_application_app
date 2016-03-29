<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Signin Page</title>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div style="width: 350px;" class="container">
        <form class="form-signin" action="index.php" method="post">
          <h2 align="center" class="form-signin-heading">Please login</h2>
          <br/>
          <label for="userName" class="sr-only">User Name</label>
          <input type="text" id="userName" name="userName" class="form-control" placeholder="User Name" required autofocus>
          <br/>
          <label for="password" class="sr-only">Password</label>
          <input type="password" id="password"  name="password" class="form-control" placeholder="Password" required>
          <br/>
          <br/>

          <button id= "loginButton" class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        </form>
      </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>

    <?php

    $user = $_POST['userName'];
    $pass = $_POST['password'];
    if ($user)
    {
      $servername = "localhost";
      $username = "mehmet.sahin";
      $password = "lyd7i7xk";

      // Create connection
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error)
      {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM student WHERE sname = '".$user."' AND sid = ".$pass;
      mysqli_select_db($conn, 'mehmet_sahin');
      $retval = mysqli_query(  $conn, $sql );
      $count = mysqli_fetch_array($retval, MYSQLI_NUM);

      if (!$count[0])
      {
        echo "<script type='text/jscript'>alert('Email or Pass is not matching.')</script>";
      }
      else
      {
        session_start();
        $_SESSION["sid"] = $pass;
        header("Location:welcome.php");
        exit();
      }
    }
?>
  </body>

</html>
