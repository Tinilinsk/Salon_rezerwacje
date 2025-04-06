<?php
require 'db_config.php';

$usluga = $_POST['usluga'];
$imie = $_POST['imie'];
$nazwisko = $_POST['nazwisko'];
$telefon = $_POST['telefon'];
$termin = $_POST['termin'];

$sql = "INSERT INTO rezerwacje (usluga, imie, nazwisko, telefon, termin) 
VALUES (?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $usluga, $imie, $nazwisko, $telefon, $termin);

if ($stmt->execute()) {
    echo "Rezerwacja zapisana!";
} else {
    echo "Błąd zapisu!";
}

$stmt->close();
$conn->close();
?>
