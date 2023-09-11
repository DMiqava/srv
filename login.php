<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $db = new SQLite3('database.sqlite');

    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username, SQLITE3_TEXT);
    $result = $stmt->execute();
    $row = $result->fetchArray(SQLITE3_ASSOC);

    if ($row && password_verify($password, $row['password'])) {
        echo "Login successful!";
    } else {
        echo "Login failed!";
    }
}
?>
