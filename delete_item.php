<?php
require("database.php");

$ItemNum = filter_input(INPUT_POST, "ItemNum", FILTER_VALIDATE_INT);

if ($ItemNum) {
    $query = 'DELETE FROM todolist
                WHERE ItemNum = :ItemNum';
    $statement = $db->prepare($query);
    $statement->bindValue(":ItemNum", $ItemNum);
    $success = $statement->execute();
    $statement->closeCursor();
}

include("index.php");