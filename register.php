<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $db = new SQLite3('database.sqlite');

    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $stmt->bindParam(':password', $password, SQLITE3_TEXT);

    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Registration failed!";
    }
}
?>
