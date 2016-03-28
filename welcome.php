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
      <table style="width:100%;">
          <tr>
              <td style="width:90%;">
                  <h2 align = "center"> Internships </h2>
              </td>
              <td style="width:10%;">
                  <form action="logout.php">
                      <button align = "right" class="btn btn-lg btn-primary btn-block">Logout</button>
                  </form>
              </td>
          </tr>
      </table>
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
      echo "<table align=\"center\" border=\"1\" style=\"width:60%\">";
      $i = 0;
      while($row = mysqli_fetch_array($retval)){
            echo "<tr align=\"center\">";
            echo "<td style=\"width:10%\"><h4>".$row["cid"]."</h4></td>";
            echo "<td><h4>".$row["cname"]."</h4></td>";
            echo "<td style=\"width:10%\"><h4>".$row["quota"]."</h4></td>";
            echo "<form action=\"dropRow.php\" method=\"post\">
                    <input name=\"rowId\" type=\"hidden\" value = \"".$i."\">
                    <td style=\"width:5%\">
                        <button name="."\"cancel\"
                        class=\"btn btn-lg btn-primary btn-block\" type=\"submit\">
                            <h4>Cancel </h4>
                        </button>
                    </td>
                </form>
            </tr>";
          $i++;
      }
      echo "</table>";
      echo "</br>";
      echo "<table align=\"center\" style=\"width:60%\">";
      echo "<tr align=\"center\"><td><button id=\"applyButton\" class=\"btn btn-lg btn-primary btn-block\"> <h4> Apply for Internship </h4></button></td></tr>";
      echo "</table>";

    ?>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>

</html>
