<?php
require "connect.php";
session_start();
echo $_POST['$data'];
$input_date=$_POST['data'];
$data=date("Y-m-d H:i:s",strtotime($input_date));

if (isset($data)) {

    $query="INSERT INTO ordini (id_utente, ora_ritiro) VALUES (" . $_SESSION['idUtente'] . ", '" . $data . "')";
    $conn ->query($query);
    $ordine = mysqli_insert_id($conn);
    $res = $conn->query("SELECT * FROM panini");

    $query = "";
    while ($row = $res->fetch_array()){
        $tmp = $_POST['pq_'. $row['id']];
        if ($tmp > 0){
            $query = "INSERT INTO panini_ordinati (id_ordine, id_panino, quantità) VALUES (" . $ordine . ", " . $row['id'] . ", " . $tmp . ")";
            echo $query."\n";
            $conn->query($query);
        }
    }

    $query = "";
    $res = $conn->query("SELECT * FROM bevande");
    $row = null;
    while ($row = $res->fetch_array()) {
        $tmp = $_POST["bq_". $row["id"]];
        if ($tmp > 0){
            $query = "INSERT INTO bevande_ordinate (id_ordine, id_bevanda, quantità) VALUES (". $ordine . ", " . $row["id"] .", ". $tmp. ")";
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