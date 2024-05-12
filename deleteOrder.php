<?php
require "connect.php";

// Ottieni l'ID dell'ordine da eliminare dalla richiesta GET
$ordineId = $_GET["ordine_id"];

// Prepara le query di eliminazione
$deleteOrdineQuery = "DELETE FROM ordini WHERE id = $ordineId";
$deletePaniniOrdinatiQuery = "DELETE FROM panini_ordinati WHERE id_ordine = $ordineId";
$deleteBevandeOrdinateQuery = "DELETE FROM bevande_ordinate WHERE id_ordine = $ordineId";

if ($conn->query($deleteOrdineQuery) === TRUE &&
    $conn->query($deletePaniniOrdinatiQuery) === TRUE &&
    $conn->query($deleteBevandeOrdinateQuery) === TRUE) {
    echo "Ordine eliminato con successo.";
} else {
    echo "Errore durante l'eliminazione dell'ordine: " . $conn->error;
}

$conn->close();
?>
