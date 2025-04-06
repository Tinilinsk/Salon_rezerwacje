<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

require 'db_config.php';

echo "<a href='logout.php'>Wyloguj</a><br><br>";

$result = $conn->query("SELECT * FROM rezerwacje ORDER BY termin DESC");

echo "<h1>Panel administratora - Rezerwacje</h1>";
echo "<table border='1'>
<tr>
<th>ID</th>
<th>Usługa</th>
<th>Imię</th>
<th>Nazwisko</th>
<th>Telefon</th>
<th>Termin</th>
<th>Status</th>
<th>Data dodania</th>
</tr>";

while($row = $result->fetch_assoc()) {
    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['usluga']."</td>
        <td>".$row['imie']."</td>
        <td>".$row['nazwisko']."</td>
        <td>".$row['telefon']."</td>
        <td>".$row['termin']."</td>
        <td>".$row['status']."</td>
        <td>".$row['created_at']."</td>
    </tr>";
}

echo "</table>";

$conn->close();
?>
