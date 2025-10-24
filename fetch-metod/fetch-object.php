<?php
$conn = new mysqli("localhost", "root", "", "baza");
if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

$result = $conn->query("SELECT * FROM users");

while ($user = $result->fetch_object()) {
    echo "ID: " . $user->id . "<br>";
    echo "Imię: " . $user->imie . "<br>";
    echo "Nazwisko: " . $user->nazwisko . "<br>";
    echo "Wiek: " . $user->wiek . "<br>";
    echo "Email: " . $user->email . "<br><hr>";
}

$conn->close();
?>
