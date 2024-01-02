    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>

    <!-- Render All Elements Normally -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="css/all.min.css">
    <!-- Main Template CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">

    <?php 
        require_once 'connect.php';
        $id    = $_GET['id'];
        $state = $PDO -> prepare('SELECT * FROM todos WHERE id = ?');
        $state -> execute([$id]);

        $todo = $state -> fetch(PDO::FETCH_OBJ);
        //UPDATE
        if (isset($_POST['update'])) {
            
            $todo  = htmlspecialchars($_POST['todo']);
            if (empty($todo)) {
                include_once 'include/alert.php';
            } else {
                $state = $PDO->prepare('UPDATE todos SET todo = ? WHERE id = ?');
                $state->execute([$todo, $id]);
                header('Location: index.php');
                exit();
            }
        }
    ?>

        <div class="todo">

            <div class="todo-header">
                <div class="title">
                    <h1>Todo List</h1>
                    <a href="index.php">
                        <i class="fa-solid fa-arrow-left"></i>
                        Back
                    </a>
                </div>
                <form method="post">
                    <input type="text" name="todo" id="todo" value="<?php if (isset($todo -> todo)) {echo $todo -> todo ;} ?>">

                    
                    <button class="button-86" role="button">
                        <input class="button-86" role="button" type="update" name="update" value="Update">
                    </button>
                    
                </form>
            </div>

            

        </div>
    </div>

</body>
</html>
