<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista użytkowników</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f0f2f5;
            color: #333;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }       

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #2c3e50;
        }

        .table-wrapper {
            overflow-x: auto;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
            background-color: #fff;
        }

        .users-table {
            width: 100%;
            border-collapse: collapse;
            min-width: 600px;
        }

        .users-table thead {
            background-color: #2980b9;
            color: white;
        }

        .users-table th, .users-table td {
            padding: 12px 15px;
            text-align: left;
        }

        .users-table tbody tr {
            border-bottom: 1px solid #ddd;
            transition: background-color 0.3s;
        }

        .users-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .users-table tbody tr:hover {
            background-color: #dceefc;
        }   

        @media (max-width: 768px) {
            .users-table th, .users-table td {
                padding: 10px;
            }
        }

    </style>
</head>
<body>
    <div class="container">
        <h1>Lista użytkowników</h1>
        <div class="table-wrapper">
            <?php
            // Połączenie z bazą
            $conn = new mysqli("localhost", "root", "", "baza");
            if ($conn->connect_error) die("Błąd połączenia: " . $conn->connect_error);

            $result = $conn->query("SELECT * FROM users");

            // Tworzymy tabelę w PHP
            echo '<table class="users-table">';
            echo '<thead>
                    <tr>
                        <th>ID</th>
                        <th>Imię</th>
                        <th>Nazwisko</th>
                        <th>Wiek</th>
                        <th>Email</th>
                    </tr>
                  </thead>';
            echo '<tbody>';

            while ($row = $result->fetch_array()) {
                echo '<tr>';
                echo '<td>' . htmlspecialchars($row[0]) . '</td>';
                echo '<td>' . htmlspecialchars($row[1]) . '</td>';
                echo '<td>' . htmlspecialchars($row[2]) . '</td>';
                echo '<td>' . htmlspecialchars($row[3]) . '</td>';
                echo '<td>' . htmlspecialchars($row[4]) . '</td>';
                echo '</tr>';
            }

            echo '</tbody></table>';

            $conn->close();
            ?>
        </div>
    </div>
</body>
</html>
