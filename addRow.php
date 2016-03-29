<?php
    session_start();
    $cid = $_POST["cid"];
    $int_num = $_SESSION["int_num"];
    $user_id = $_SESSION["sid"];
    $servername = "localhost";
    $username = "mehmet.sahin";
    $password = "lyd7i7xk";

    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error)
    {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM company WHERE cid='".$cid."';";
    mysqli_select_db($conn, 'mehmet_sahin');
    $retval = mysqli_query(  $conn, $sql );
    $row_count = mysqli_num_rows($retval);
    $row = mysqli_fetch_array($retval);

    $sql = "SELECT * FROM apply WHERE cid='".$cid."';";
    $retval2 = mysqli_query(  $conn, $sql );
    $row_count2 = mysqli_num_rows($retval2);

    $sql = "SELECT * FROM apply WHERE cid='".$cid."' AND sid =".$user_id.";";
    $retval3 = mysqli_query(  $conn, $sql );
    $row_count3 = mysqli_num_rows($retval3);

    if($row_count == 0)
    {
        echo "<script>alert(\"Not a valid company id!\");</script>";
    }
    else if ($row_count2 >= $row["quota"])
    {
        echo "<script>alert(\"Company quota is full!\");</script>";
    }
    else if ($row_count3 > 0)
    {
        echo "<script>alert(\"You have already applied to this company!\");</script>";
    }
    else
    {
        $sql = "INSERT INTO apply VALUES (".$user_id.",'".$row["cid"]."');";
        if(!mysqli_query($conn, $sql))
        {
            echo "<script>alert(\"INSERT could not be processed!\");</script>";
        }
    }
    header("Location:addInternship.php");
    exit();
 ?>
