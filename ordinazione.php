<?php
session_start();
if($_SESSION['logged'] == true){
    require "connect.php";
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bar</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #125ca5;
            color: #fff;
        }
        .card {
            background-color: #292b2c;
            border: 2px solid #007bff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
            color: #fff;
        }
        .card-header {
            background-color: #007bff;
            color: #fff;
            font-size: 24px;
            padding: 20px 0;
        }
        .form-group {
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="d-flex align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="container">
            <a href="clientInterface.html" class="btn btn-primary mb-3">Home</a>
            <div class="row">
    <!-- Column for Panini -->
    <div class="col-md-6">
        <form action="">
            <div class="card">
                <div class="card-header bg-primary text-white text-center">
                    Panini
                </div>
                <div class="card-body">
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM panini");
                        while ($row = mysqli_fetch_array($query)){
                        ?>
                            <div class="form-group">
                                <label for="panino<?php echo $row['id']; ?>"><?php echo $row['nome']; ?> <?php echo "[".$row['costo']."€]"; ?>: <br><?php echo $row['descrizione']; ?></label>
                                <input type="number" name="pq<?php echo $row['id']; ?>" min="0" value="0" class="form-control">
                            </div>
                        <?php } ?>
                </div>
            </div>
    </div>

    <!-- Column for Bevande -->
    <div class="col-md-6">
        <div class="card">
            <div class="card-header bg-primary text-white text-center">
                Bevande
            </div>
            <div class="card-body">
            <?php
                        $query = mysqli_query($conn, "SELECT * FROM bevande");
                        while ($row = mysqli_fetch_array($query)){
                        ?>
                            <div class="form-group">
                                <label for="bevanda<?php echo $row['id']; ?>"><?php echo $row['nome']; ?> <?php echo "[".$row['costo']."€]"; ?>: <br><?php echo $row['descrizione']; ?></label>;
                                <input type="number" name="bq_<?php echo $row['id']; ?>" min="0" value="0" class="form-control">
                            </div>
                        <?php } ?>
            </div>
        </div>
    </div>
</div>
                <div class="form-group mt-3">
                    <label for="data">Data:</label>
                    <input type="datetime-local" name="data" required class="form-control">
                </div>

                <input type="submit" value="aggiungi" class="btn btn-success btn-block">
            </form>
        </div>
    </div>
</body>
</html>

<?php } else { ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <p href="login.php">sei stronzo e non loggato</p>
        <button href="index.html">home</button>

    </body>
    </html>

<?php } ?>