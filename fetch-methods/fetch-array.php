<?php
$conn = new mysqli("localhost", "root", "", "baza");
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users");

while ($row = $result->fetch_array()) {
    echo "ID: " . $row[0] . " / " . $row['id'] . "<br>";
    echo "Imię: " . $row[1] . " / " . $row['imie'] . "<br>";
    echo "Nazwisko: " . $row[2] . " / " . $row['nazwisko'] . "<br>";
    echo "Wiek: " . $row[3] . " / " . $row['wiek'] . "<br>";
    echo "Email: " . $row[4] . " / " . $row['email'] . "<br><hr>";
}

$conn->close();
?>
