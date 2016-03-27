<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome!</title>
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
      <h2 align = "center"> Internships <h2/>
          <form action="logout.php">
              <button align = "right" class="btn btn-lg btn-primary btn-block">Logout</button>
          <form/>
    <?php
      session_start();
      $user_id = $_SESSION["sid"];
      $servername = "localhost";
      $username = "mehmet.sahin";
      $password = "lyd7i7xk";

      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT * FROM company NATURAL JOIN apply WHERE sid=$user_id";
      mysqli_select_db($conn, 'mehmet_sahin');
      $retval = mysqli_query(  $conn, $sql );
      echo "<table border=\"1\" style=\"width:100%\">";
      $i = 0;
      while($row = mysqli_fetch_array($retval)){
          echo "<tr>";
            echo "<td>".$row["cid"]."</td>";
            echo "<td>".$row["cname"]."</td>";
            echo "<td>".$row["quota"]."</td>";
            echo "<td><button id="."\"cancel".$i."\" class=\"btn btn-lg btn-primary btn-block\"> Cancel </button></td>";
          echo "</tr>";
          $i++;
      }
      echo "</table>";
    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
