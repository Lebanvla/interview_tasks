<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <title>
    Задание 3
    </title>
</head>




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
                                        <?=$row[0]?>
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