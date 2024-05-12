<?php
require "connect.php";

$sql = "SELECT ordini.id AS ordine_id, ordini.id_utente, utenti.nome AS nome_utente, utenti.cognome AS cognome_utente, panini.nome AS panino, panini.descrizione AS descrizione_panino, panini.costo AS costo_panino, bevande.nome AS bevanda, bevande.descrizione AS descrizione_bevanda, bevande.costo AS costo_bevanda
        FROM ordini
        INNER JOIN utenti ON ordini.id_utente = utenti.ID
        LEFT JOIN panini_ordinati ON ordini.id = panini_ordinati.id_ordine
        LEFT JOIN panini ON panini_ordinati.id_panino = panini.id
        LEFT JOIN bevande_ordinate ON ordini.id = bevande_ordinate.id_ordine
        LEFT JOIN bevande ON bevande_ordinate.id_bevanda = bevande.id";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>ID Ordine</th>
                <th>ID Utente</th>
                <th>Nome Utente</th>
                <th>Cognome Utente</th>
                <th>Panino</th>
                <th>Descrizione Panino</th>
                <th>Costo Panino</th>
                <th>Bevanda</th>
                <th>Descrizione Bevanda</th>
                <th>Costo Bevanda</th>
                <th>Azioni</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo '<form action="deleteOrd.php" method="post">
                <tr>
                    <td><input type="radio" name="id" value"'.$row['id'].'"></td>
                    <td>' . $row["ordine_id"] . '</td>
                    <td>' . $row["id_utente"] . '</td>
                    <td>' . $row["nome_utente"] . '</td>
                    <td>' . $row["cognome_utente"] . '</td>
                    <td>' . $row["panino"] . '</td>
                    <td>' . $row["descrizione_panino"] . '</td>
                    <td>' . $row["costo_panino"] . '</td>
                    <td>' . $row["bevanda"] . '</td>
                    <td>' . $row["descrizione_bevanda"] . '</td>
                    <td>' . $row["costo_bevanda"] . '</td>
                    
                </tr>
              </form>';
    }
    echo '</table><input type="submit">';
} else {
    echo "Nessun risultato trovato.";
}
echo "<button><a href='adminInterface.html'>Menu</a></button>";
$conn->close();
?>