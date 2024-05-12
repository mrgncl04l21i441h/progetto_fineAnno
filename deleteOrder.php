<?php
require "connect.php";

$ordineId = $_POST["ordine"];

if (isset($ordineId)) {

    // Prepara le query di eliminazione
    $deleteOrdineQuery = "DELETE FROM ordini WHERE id = $ordineId;";
    $deletePaniniOrdinatiQuery = "DELETE FROM panini_ordinati WHERE id_ordine = $ordineId;";
    $deleteBevandeOrdinateQuery = "DELETE FROM bevande_ordinate WHERE id_ordine = $ordineId;";

    if ($conn->query($deleteOrdineQuery) === TRUE &&
        $conn->query($deletePaniniOrdinatiQuery) === TRUE &&
        $conn->query($deleteBevandeOrdinateQuery) === TRUE) {
        echo 'Ordine eliminato con successo. \n <button href="viewOrders.php">';
    } else {
        echo "Errore durante l'eliminazione dell'ordine: " . $conn->error . '\n<button href="viewOrders.php">';
    }
} else {
    echo "non prende ordine diobestia";
}
$conn->close();
?>
