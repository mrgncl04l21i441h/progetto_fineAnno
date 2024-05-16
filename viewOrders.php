<?php
require "connect.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #fff;
        }
        th, td {
            text-align: center;
        }
        .card-body {
            border: 2px solid #007bff; 
            border-radius: 10px; 
            padding: 20px; 
        }
        .card-title {
            color: #007bff; 
            font-size: 36px;
            margin-bottom: 20px; 
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
        $sql = "SELECT ordini.id AS ordine_id, ordini.id_utente, utenti.nome AS nome_utente, utenti.cognome AS cognome_utente, panini.nome AS panino,
                panini.descrizione AS descrizione_panino, panini.costo AS costo_panino, bevande.nome AS bevanda, bevande.descrizione AS descrizione_bevanda,
                bevande.costo AS costo_bevanda, panini_ordinati.quantità AS qp, bevande_ordinate.quantità AS qb
                FROM ordini
                INNER JOIN utenti ON ordini.id_utente = utenti.ID
                LEFT JOIN panini_ordinati ON ordini.id = panini_ordinati.id_ordine
                LEFT JOIN panini ON panini_ordinati.id_panino = panini.id
                LEFT JOIN bevande_ordinate ON ordini.id = bevande_ordinate.id_ordine
                LEFT JOIN bevande ON bevande_ordinate.id_bevanda = bevande.id
                GROUP BY panini.id, bevande.id
                ";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='deleteOrder.php' method='post'>
                    <div class='card-body'>
                    <h1 class='card-title'>Orders</h1>
                    <table class='table table-bordered table-striped'>
                    <tr>
                        <th>ID Ordine</th>
                        <th>ID Utente</th>
                        <th>Nome Utente</th>
                        <th>Cognome Utente</th>
                        <th>Panino</th>
                        <th>Quantità</th>
                        <th>Descrizione Panino</th>
                        <th>Costo Panino</th>
                        <th>Bevanda</th>
                        <th>Quantità</th>
                        <th>Descrizione Bevanda</th>
                        <th>Costo Bevanda</th>
                        <th>Elimina</th>
                    </tr>
                    </thead>
                    <tbody>";
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                            <td>' . $row["ordine_id"] . '</td>
                            <td>' . $row["id_utente"] . '</td>
                            <td>' . $row["nome_utente"] . '</td>
                            <td>' . $row["cognome_utente"] . '</td>
                            <td>' . $row["panino"] . '</td>
                            <td>' . $row["qp"] . '</td>
                            <td>' . $row["descrizione_panino"] . '</td>
                            <td>' . $row["costo_panino"] . '</td>
                            <td>' . $row["bevanda"] . '</td>
                            <td>' . $row["descrizione_bevanda"] . '</td>
                            <td>' . $row["qb"] . '</td>
                            <td>' . $row["costo_bevanda"] . '</td>
                            <td><input type="radio" name="ordine" value="'.$row["ordine_id"].'"></td>
                        </tr>';
            }
            echo '</tbody>
                </table>
                <input type="submit" value="Elimina" class="btn btn-danger">
                <a href="adminInterface.html" class="btn btn-primary">Menu</a>
                </div>
            </form>';
        } else {
            ?>
            <div class='card-body'>
            <p>Nessun risultato trovato</p>
            <a href="adminInterface.html" class="btn btn-primary">Menu</a>
            </div>
            <?php
            
        }
        ?>
    </div>
</body>
</html>
