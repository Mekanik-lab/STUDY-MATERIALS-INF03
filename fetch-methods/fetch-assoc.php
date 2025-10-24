<?php
$conn = new mysqli("localhost", "root", "", "baza");
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users");

//Odbywa się to za pomocą nazw kolumn, ponieważ fetch_assoc() zwraca tablicę asocjacyjną.
while ($row = $result->fetch_assoc()) {
    echo "ID: " . $row['id'] . "<br>";
    echo "Imię: " . $row['imie'] . "<br>";
    echo "Nazwisko: " . $row['nazwisko'] . "<br>";
    echo "Wiek: " . $row['wiek'] . "<br>";
    echo "Email: " . $row['email'] . "<br><hr>";
}

$conn->close();
?>
