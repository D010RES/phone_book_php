<?php
include("db.php");

$name=$family='';
$ac="insert";
if(isset($_REQUEST['e'])){
    $id = intval($_REQUEST['e']);
    $q = "SELECT Name, Family FROM person WHERE PId=$id";
    $result = mysqli_query($str_conn, $q);
    $person = mysqli_fetch_object($result);
    $name = $person->Name;
    $family = $person->Family;
    $ac="update";
}

if(isset($_REQUEST['update'])){
    $name = $_REQUEST['name'];
    $family = $_REQUEST['family'];
    $id = intval($_REQUEST['e']);
    $q = "UPDATE person SET Name='$name', Family='$family' WHERE PId=$id";
    if(mysqli_query($str_conn, $q)) {
        header('location: index.php');
    }
}

if(isset($_REQUEST['insert'])){
    $name = $_REQUEST['name'];
    $family = $_REQUEST['family'];
    $q = "INSERT INTO person (Name, Family) VALUES ('$name', '$family')";
    if(mysqli_query($str_conn, $q)) {
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
    <link rel="stylesheet" href="style.css">
    <style type="text/css">

    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>

    <div class="container border p-4 mt-4">
        <div class="row">
            <div class="col-md-12">
                <h3 class="p-4">وارد کردن اطلاعات</h3>
                <hr />
            </div>
        </div>

        <form method="post">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>نام</label>
                    <input name="name" type="text" class="form-control" placeholder="مثال : علی" value=<?php echo $name ?>>
                </div>
                <div class="form-group col-md-6">
                    <label>نام خانوادگی</label>
                    <input name="family" type="text" class="form-control" placeholder="مثال : کریمی" value=<?php echo $family ?>>
                </div>
            </div>
            <input name=<?php echo $ac ?> type="submit" class="btn btn-success" value="ثبت">
        </form>
    </div>
</body>

</html>