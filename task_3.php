<?php
    include("./logic/task_3.php");
    
    if($_SERVER["REQUEST_METHOD"] === "GET"){
        $title = "Задание 3";
        include("./templates/header.php");
        ?>

        <body class="container">
            <h1 class="text-center">
                Комментарии
            </h1>
            <section style="background-color: #f7f6f6;">
                <div class="container my-5 py-5 text-body">
                
                <?php
                    $comments = get_comments($connection);
                    while ($row = $comments->fetch_row()) {
                ?>
                <div class="row d-flex justify-content-center">
                    <div class="card mb-3">
                        <div class="card-body">
                            <div class="d-flex flex-start">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h6 class="text-primary mb-0">
                                            <span class="text-body ms-2">
                                                <?=htmlspecialchars($row[0])?>
                                            </span>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                    <?php
                    }
                    ?>

                </div>
            </section>

            
            <br>
            <form action="task_3.php" name="add_comment" method="post">
                <div class="mb-3">
                    <label class="form-label">Комментарий</label>
                    <input type="text" class="form-control" id="commentary_text" name="commentary_text">
                    <div id="commentary_help" class="form-text">Введите текст своего комментария</div>
                </div>
                <button type="submit" class="btn btn-success">Написать комментарий</button>
            </form>
        </body>
        <?php
    }
    else{
        create_comment($connection);
    }
?>