<?php
$conn = new mysqli("localhost", "root", "", "baza");
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users");

while ($row = $result->fetch_row()) {
    echo "ID: " . $row[0] . "<br>";
    echo "Imię: " . $row[1] . "<br>";
    echo "Nazwisko: " . $row[2] . "<br>";
    echo "Wiek: " . $row[3] . "<br>";
    echo "Email: " . $row[4] . "<br><hr>";
}

$conn->close();
?>
