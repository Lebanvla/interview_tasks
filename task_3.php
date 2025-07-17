<?php
    $host = "localhost";
    $username = "root";
    $password = "qq";
    $port = null;
    $connection = new mysqli($host, $username, $password, "site", $port);


    function get_comments(mysqli $connection): mysqli_result{
        $result = $connection->query("select text from comments;");
        return $result;
    }
?>


<?php
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        include("./templates/task_3.php");
    }
    else{
        include("./logic/task_3.php");
    }
?>