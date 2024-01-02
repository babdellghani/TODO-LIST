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
        //SHOW
        require_once 'connect.php';
        $state = $PDO -> query('SELECT * FROM todos ORDER BY id DESC');
        $todos = $state -> fetchAll(PDO::FETCH_OBJ);

        //ADD
        if (isset($_POST['submit'])) {
            $todo  = ucwords(htmlspecialchars($_POST['todo']));
            $completed = 0;
            if (empty($todo)) {
                include_once 'include/alert.php';
            } else {
                $state = $PDO->prepare('INSERT INTO todos VALUES (null,?,?)');
                $state->execute([$todo, $completed]);
                header('Location: index.php');
                exit();
            } 
        }

        
    ?>

        <div class="todo">

            <div class="todo-header">
                <h1>Todo List <i class="fa-solid fa-clipboard-list fa-bounce"></i></h1>
                <form method="post" id="your_form">
                    <input type="text" name="todo" id="todo" placeholder="Add Your Todo">

                    
                    <button class="button-86" role="button">
                        <input class="button-86" role="button" type="submit" name="submit" value="Add">
                    </button>
                    
                </form>
            </div>

            <div class="todo-content">
                
                <?php
                    
                    if ($state->rowCount() !== 0) { 
                        foreach ($todos as $todo) :
                ?>

                <div class="item">
                    
                    <form action="check.php?id=<?= $todo -> id ?>" method="post">
                        <input type="checkbox" class="ui-checkbox" <?= $todo -> completed == 1 ? 'checked' : '' ?> name="completed" id="<?= $todo -> id ?>">
                    </form>  

                    <label for="<?= $todo -> id ?>">
                        <?php 
                            if ($todo -> completed == 1) {
                                echo '<strike><p>' . $todo -> todo . '</p></strike>';
                            } else {
                                echo '<p>' . $todo -> todo . '</p>';
                            }
                        ?>
                    </label>
                    
                    <div class="buttons">
                        <a href="update.php?id=<?= $todo -> id ?>" class="button-87" role="button">
                            <i class="fa-regular fa-pen-to-square"></i>
                        </a>

                        <a href="delete.php?id=<?= $todo -> id ?>" class="button-87" role="button" onclick="return confirm('Are you sure?')">
                            <i class="fa-regular fa-trash-can"></i>
                        </a>
                    </div>
                </div>
                <hr>
                
                <?php endforeach; 
                        } else { 
                ?>
                            <h2 style="text-align: center;">There is no todo</h2>
                <?php }
                ?>

            </div>
        </div>
    </div>

<script>
    const checkoxes = document.querySelectorAll('input[type="checkbox"]');
    checkoxes.forEach(ch => {
        ch.onclick = function() {
            this.parentNode.submit();
        }
    })
</script>

    
</body>
</html>
