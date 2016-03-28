<?php
    session_start();
    if ($_SESSION["full"] == 1){
        $message = "You can only apply to 3 different internships in the same time";
        echo "HAAAY";
        header("Location:welcome.php");
        exit();
    }
    else{
        $user_id = $_SESSION["sid"];
        $servername = "localhost";
        $username = "mehmet.sahin";
        $password = "lyd7i7xk";

        $conn = new mysqli($servername, $username, $password);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "(SELECT * FROM company) EXCEPT (SELECT cid, cname, quota FROM company NATURAL JOIN apply WHERE sid=$user_id)";
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
                              <h4>Add</h4>
                          </button>
                      </td>
                  </form>
              </tr>";
            $i++;
        }
        echo "</table>";
        echo "</br>";
        echo "<table align=\"center\" style=\"width:60%\">";
        echo "<form action=\"addInternship.php\" method=\"post\">
              <tr align=\"center\">
                  <td>
                      <button id=\"applyButton\" class=\"btn btn-lg btn-primary btn-block\">
                          <h4> Apply for Internship </h4>
                      </button>
                  </td>
              </tr>
              </form>";
        echo "</table>";
    }
 ?>
