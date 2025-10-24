<?php
$conn = new mysqli("localhost", "root", "", "baza");
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users");

//Odbywa się to za pomocą indeksów numerycznych lub nazw kolumn, ponieważ fetch_array() zwraca oba typy tablic: indeksowaną numerycznie i asocjacyjną.
while ($row = $result->fetch_array()) {
    echo "ID: " . $row[0] . "<br>";
    echo "Imię: " . $row[1] . "<br>";
    echo "Nazwisko: " . $row[2] . "<br>";
    echo "Wiek: " . $row[3] . "<br>";
    echo "Email: " . $row[4] . "<br><hr>";
}

$conn->close();
?>
