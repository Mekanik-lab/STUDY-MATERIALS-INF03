<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notatki</title>
</head>
<body>

<form action="" method="POST">

    <label for="nazwaKatalogu">Nazwa katalogu:</label>
    <input type="text" name="nazwaKatalogu" id="nazwaKatalogu">
    <br><br>

    <label for="nazwaPliku">Nazwa pliku:</label>
    <input type="text" name="nazwaPliku" id="nazwaPliku">
    <br><br>

    <label for="notatka">Notatka:</label>
    <br>

    <textarea name="notatka" id="notatka"></textarea>
    <br><br>

    <button type="submit">Zapisz</button>

</form>

<?php

if (
    isset($_POST["nazwaKatalogu"]) &&
    isset($_POST["nazwaPliku"]) &&
    isset($_POST["notatka"])
) {

    $nazwaKatalogu = trim($_POST["nazwaKatalogu"]);
    $nazwaPliku = trim($_POST["nazwaPliku"]);
    $notatka = trim($_POST["notatka"]);

    $sciezkaPliku = $nazwaKatalogu . "/" . $nazwaPliku . ".txt";

    if (!is_dir($nazwaKatalogu)) {
        mkdir($nazwaKatalogu);
    }

    $katalog = opendir($nazwaKatalogu);

    $plik = fopen($sciezkaPliku, "a");
    fwrite($plik, $notatka . PHP_EOL);
    fclose($plik);

    echo "Zapisano notatkę!<br><br>";

    $odczyt = fopen($sciezkaPliku, "r");

    while (!feof($odczyt)) {
            $linia = fgets($odczyt);
            if ($linia !== false) {
                echo htmlspecialchars($linia) . "<br>";
            }
    }

    fclose($odczyt);
    closedir($nazwaKatalogu);
    }
?>

</body>
</html>
