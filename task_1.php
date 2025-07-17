<?php
    $title = "Задание 1";
    include("./logic/task_1.php");
    include("./templates/header.php");
?>
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