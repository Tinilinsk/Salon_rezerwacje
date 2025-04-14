<?php
session_start();
require 'db_config.php';

echo "<a href='index.html'>Home</a><br><br>";
if (isset($_POST['login']) && isset($_POST['haslo'])) {
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];

    $sql = "SELECT * FROM admin WHERE login = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        if (password_verify($haslo, $row['haslo'])) {
            $_SESSION['admin'] = $row['login'];
            header("Location: admin.php");
            exit();
        } else {
            echo "Złe hasło!";
        }
    } else {
        echo "Nie ma takiego użytkownika!";
    }
}



?>

<h2>Logowanie do panelu admina</h2>
<form method="post">
    Login: <input type="text" name="login" required><br><br>
    Hasło: <input type="password" name="haslo" required><br><br>
    <button type="submit">Zaloguj się</button>
</form>
