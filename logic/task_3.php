<?php
$commentary = htmlspecialchars($_POST["commentary_text"]);
$stmt = $connection->prepare("insert into comments(text) values(?);");
$stmt->bind_param("s", $commentary);
$stmt->execute();
$stmt->get_result();
if($stmt->errno === 0){
    header("Location: task_3.php");
    exit;
}