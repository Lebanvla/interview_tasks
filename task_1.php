<?php
    include("./logic/task_1.php");
?>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>
    Задание 1
    </title>
</head>
<body class="container">
<h3>
    Результат работы:
</h3>

<table class="table table-bordered text-center">
<?=$first_row?>
<?php
foreach($students as $student => $balls){
    // Записываем данные студентов в таблицу
    ?>
    <tr>
    <td><?=$student?></td>
    <?php
    foreach($subjects as $subject){
    ?>
        <td><?=(isset($balls[$subject]) ? $balls[$subject] : '')?></td>
    <?php
    }
    ?>
    </tr>
    <?php
}
?>
</table>

</body>