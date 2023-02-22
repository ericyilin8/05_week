<?php
require("database.php");

$Title = filter_input(INPUT_POST, "Title", FILTER_UNSAFE_RAW);
$Description = filter_input(INPUT_POST, "Description", FILTER_UNSAFE_RAW);

if ($Title) {
    $query = 'insert into todolist (Title, Description) 
    values (:Title, :Description)';
    $statement = $db->prepare($query);
    $statement->bindValue(":Title", $Title);
    $statement->bindValue(":Description", $Description);
    $success = $statement->execute();
    $statement->closeCursor();
}

include("index.php");