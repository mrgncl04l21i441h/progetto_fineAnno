<?php
require "connect.php";
session_start();
echo $_POST['$data'];
$input_date=$_POST['data'];
$data=date("Y-m-d H:i:s",strtotime($input_date));

if (isset($data)) {

    $query="INSERT INTO ordini (id_utente, ora_ritiro) VALUES (" . $_SESSION['idUtente'] . ", '" . $data . "')";
    echo $query;
    echo "\n".$_POST['data'];
    $conn ->query($query);
    $ordine = mysqli_insert_id($conn);
    $res = $conn->query("SELECT * FROM panini");

    $query = "";
    while ($row = $res->fetch_array()){
        echo "ciclo 1\n" . $row . "\n";
        $tmp = $_POST['pq_'. $row['id']];
        echo $tmp."\n";
        if ($tmp > 0){
            $query = "INSERT INTO panini_ordinati (id_ordine, id_panino, quantità) VALUES (" . $ordine . ", " . $row['id'] . ", " . $_POST['pq' . $row['id']] . ")";
            echo $query."\n";
            $conn->query($query);
        }
    }

    $query = "";
    $res = $conn->query("SELECT * FROM bevande");
    $row = null;
    while ($row = $res->fetch_array()) {
        echo "ciclo 2";
        $tmp = $_POST["bq_". $row["id"]];
        echo $tmp."\n";
        if ($tmp > 0){
            $query = "INSERT INTO bevande_ordinate (id_ordine, id_bevanda, quantità) VALUES (". $ordine . ", " . $row["id"] .", ". $_POST["bq". $row["id"]] . ")";
            echo $query."\n";
            $conn->query($query);
        }
    }
}else {
    echo "no data";
}
echo "fatto torna alla home" .$_SESSION['idUtente'];
echo '<button href="index.html">home</button >';
?>