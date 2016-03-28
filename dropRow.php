<?php
    session_start();
    echo "here";
    $row_num = $_POST['rowId'];
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
    $row = mysqli_fetch_array($retval);
    for($i=0; i<$row_num-1;$i++){
        $row = mysqli_fetch_array($retval);
    }
    $sql = "DELETE FROM apply WHERE sid=".$user_id." AND cid= '".$row['cid']."'";
    if(!mysqli_query($conn, $sql)){
        echo "delete could not be processed";
    }
    header("Location:welcome.php");
    exit();
 ?>
