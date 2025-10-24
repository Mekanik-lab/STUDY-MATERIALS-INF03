<?php
// ==============================================
// ściąga PHP + MySQL + Formularze + Bezpieczeństwo
// + Tablice, fetch, potęgi, pierwiastki, kolejność działań
// ==============================================

/* 
  Komentarz wieloliniowy:
  Ten plik zawiera zestawienie wszystkich ważnych metod,
  składni, operatorów i funkcji potrzebnych na Inf 03.
*/

// ----------------------------------------------
// 1. Zmienne i typy
// ----------------------------------------------
$imie = "Jan";    // string
$wiek = 20;       // integer
$aktywny = true;  // boolean
$oceny = [5,4,3]; // tablica

// ----------------------------------------------
// 2. Operatory
// ----------------------------------------------
// Arytmetyczne: + - * / % ** (potęgowanie)
// Potęgowanie: 2 ** 3 = 8
// Pierwiastki: sqrt(16) = 4

// Wiązanie operatorów (associativity)
// ** ma wiązanie prawe (right-associative)
// np. 2 ** 3 ** 2 = 2 ** (3 ** 2) = 2 ** 9 = 512
// pozostałe operatory mają wiązanie lewe (left-associative)

// Kolejność wykonywania działań (precedence):
// 1. ()
// 2. **
// 3. * / %
// 4. + -
// 5. porównania
// 6. &&
// 7. ||

// ----------------------------------------------
// 3. Komentarze
// ----------------------------------------------
// komentarz jednolinijkowy 1
# komentarz jednolinijkowy 2

/*
  komentarz wieloliniowy
  można pisać wiele linijek
*/

// ----------------------------------------------
// 4. Stringi
// ----------------------------------------------
$tekst1 = 'Cześć $imie\n';     // brak interpolacji, \n nie działa
$tekst2 = "Cześć $imie\n";     // interpolacja działa, \n = nowa linia

// Heredoc (wielolinijkowy, interpoluje zmienne)
$tekst3 = <<<EOD
Heredoc:
Witaj $imie
Nowa linia działa
EOD;

// Nowdoc (wielolinijkowy, bez interpolacji)
$tekst4 = <<<'EOD'
Nowdoc:
Witaj $imie
\ntutaj \n nie działa
EOD;

// ----------------------------------------------
// 5. Formularze HTML (przykład)
// ----------------------------------------------
// <form action="process.php" method="post">
//   Imię: <input type="text" name="imie">
//   <input type="submit" value="Wyślij">
// </form>

// PHP odbiór danych
$imie = $_POST['imie'] ?? "Gość"; // operator null coalescing
$imie = htmlspecialchars($imie);  // zamienia znaki <, >, ", ' na encje HTML

// ----------------------------------------------
// 6. GET vs POST
// ----------------------------------------------
/*
GET:
- dane w URL
- limit ~2000 znaków
- mniej bezpieczne
POST:
- dane w body request
- brak limitu
- bezpieczniejsze dla formularzy
*/

// ----------------------------------------------
// 7. XAMPP / MySQL połączenie
// ----------------------------------------------
$conn = new mysqli("localhost", "root", "", "moja_baza");

if($conn->connect_error){
    die("Błąd połączenia: " . $conn->connect_error); // die() kończy skrypt
}

// Metody $conn
$conn->query("SELECT * FROM users");   // wykonuje zapytanie SQL
$conn->real_escape_string("test");     // zabezpieczenie danych przed SQL Injection
$conn->close();                        // zamyka połączenie
$conn->error;                           // zwraca błąd zapytania

// ----------------------------------------------
// 8. SQL Injection (co to jest)
// ----------------------------------------------
/*
Atak polegający na wstrzyknięciu niechcianego kodu SQL
przez formularz. Przykład niebezpieczny:

$sql = "SELECT * FROM users WHERE imie = '".$_POST['imie']."'";
$result = $conn->query($sql);

Rozwiązanie: używać prepared statements lub real_escape_string
*/

// ----------------------------------------------
// 9. die() / exit()
// ----------------------------------------------
die("Koniec skryptu"); // kończy wykonywanie skryptu
// exit("Koniec skryptu"); // działa tak samo

// ----------------------------------------------
// 10. htmlspecialchars
// ----------------------------------------------
$input = '<script>alert("XSS")</script>';
echo htmlspecialchars($input); 
// Funkcja zamienia znaki specjalne na encje HTML:
// < → &lt;, > → &gt;, " → &quot;, ' → &#039;

// ----------------------------------------------
// 11. Operator ->
// ----------------------------------------------
/*
Służy do dostępu do metod i właściwości obiektu.
Przykład:
$conn->query("SELECT * FROM users");
$conn->close();
*/

// ----------------------------------------------
// 12. Tablice w PHP
// ----------------------------------------------
// Deklaracja tablic
$tab1 = array(1,2,3);   // starsza składnia
$tab2 = [4,5,6];        // nowa składnia
$tabAsoc = ["imie"=>"Jan", "wiek"=>20]; // tablica asocjacyjna

// Dostęp do elementów
echo $tab2[0];           // 4
echo $tabAsoc["imie"];   // Jan

// Iterowanie po tablicach
foreach($tab2 as $wartosc){
    // $wartosc = 4, potem 5, potem 6
}

foreach($tabAsoc as $klucz => $wartosc){
    // $klucz = "imie", $wartosc = "Jan"
}

// ----------------------------------------------
// 13. Fetch w MySQL
// ----------------------------------------------
$result = $conn->query("SELECT * FROM users");

// fetch_assoc() - zwraca tablicę asocjacyjną
// Klucze = nazwy kolumn, wartości = dane z wiersza
while($row = $result->fetch_assoc()){
    echo $row["imie"]; // np. Jan
}

// fetch_row() - zwraca tablicę indeksowaną numerycznie
// Klucze = liczby 0,1,2... odpowiadają kolumnom, wartości = dane
while($row = $result->fetch_row()){
    echo $row[0]; // pierwsza kolumna
}

// fetch_array() - zwraca tablicę asocjacyjną i numeryczną
// Można użyć $row[0] lub $row["imie"]
while($row = $result->fetch_array()){
    echo $row["imie"];
    echo $row[0];
}

// fetch_object() - zwraca obiekt
// Właściwości = nazwy kolumn, wartości = dane
while($obj = $result->fetch_object()){
    echo $obj->imie;
}

// ----------------------------------------------
// 14. Funkcje tablic
// ----------------------------------------------
count($tab2);          // liczba elementów
array_push($tab2, 7);  // dodaje element na końcu
array_pop($tab2);       // usuwa ostatni element
array_shift($tab2);     // usuwa pierwszy element
array_unshift($tab2,0); // dodaje element na początku
in_array(5, $tab2);     // true jeśli 5 jest w tablicy

// ==============================================
// Koniec ściągi PHP
// ==============================================
?>
