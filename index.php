<?php
    include("db.php");

    if(isset($_REQUEST['d'])){
        $id = intval($_REQUEST['d']);
        $q = "DELETE FROM person WHERE pId=$id";
        if(mysqli_query($str_conn, $q)){
            header('location: index.php');
        }
    }    

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>دفترجه تلفن</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="p-3 pt-5">دفترچه تلفن</h3>
                <hr />
                <a href="Upsert.php"><button class="btn btn-primary font-16 m-3">افزودن شخص جدید</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>نام</th>
                            <th>نام خانوادگی</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                $q = mysqli_query($str_conn, "SELECT * FROM person");
                                while ($record = mysqli_fetch_object($q)) {
                                    echo "<tr><td>$record->Name</td><td>$record->Family</td>
                                    <td><a href='Upsert.php?e=$record->PId'>Edit</a><a href=?d=$record->PId'>  Delete</a>
                                    <a href='phone.php?id=$record->PId'> PhoneNumbers</a></td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>