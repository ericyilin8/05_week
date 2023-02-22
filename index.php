<?php
require('database.php');


$query = 'select * from todolist';// PUT YOUR SQL QUERY HERE
// Example: $query = 'SELECT * FROM customers';

$statement = $db->prepare($query);
$statement->execute();
$todos = $statement->fetchAll();
$statement->closeCursor(); 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>To Do List</h1></header>
    <main>
        <section>
                <h2>Add Item</h2>
                <form action="insert_item.php" method="POST">
                    <label for="Title">Title:</label>
                    <input type="text" id="Title" name="Title" required>
                    <label for="Description">Description:</label>
                    <input type="text" id="Description" name="Description" required>
                    <button>Submit</button>
                </form>
        </section>
        <section>
            <?php foreach ($todos as $todo) : ?>
                <p><span class="bold">Title:</span> <?php echo $todo['Title']; ?></p>
                <p><span class="bold">Description:</span> <?php echo $todo['Description']; ?></p>
                <form action="delete_item.php" method="POST">
                        <input type="hidden" name="ItemNum" value="<?php echo $todo['ItemNum']; ?>">
                        <button>Delete</button>
                </form>
                <br>
            <?php endforeach; ?>
        </section>
    </main>
</body>
</html>