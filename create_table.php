<?php
$db = new SQLite3('database.sqlite');

$query = <<<SQL
CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    password TEXT NOT NULL
);
SQL;

$db->exec($query);
echo "Table 'users' created successfully.";
?>
