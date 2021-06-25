<?php
include("db.php");

$phonenumber='';
$ac="insert";
if(isset($_REQUEST['e'])){
    $id = intval($_REQUEST['e']);
    $q = "SELECT phonenumber FROM phone WHERE phoneId=$id";
    $result = mysqli_query($str_conn, $q);
    $person = mysqli_fetch_object($result);
    $phonenumber = $person->phonenumber;    
    $ac="update";
}

if(isset($_REQUEST['update'])){
    $phonenumber = $_REQUEST['phone'];
    $q = "UPDATE phone SET phonenumber='$phonenumber' WHERE phoneId=$id";
    if(mysqli_query($str_conn, $q)) {
        header('location: phone.php?id='.$_REQUEST['id']);
    }
}

if(isset($_REQUEST['insert'])){   
    $phonenumber = $_REQUEST['phone'];
    $personId = intval($_REQUEST['id']);
    $q = "INSERT INTO phone (phonenumber, personId) VALUES ('$phonenumber', $personId)";
    if(mysqli_query($str_conn, $q)) {
        header('location: phone.php?id='.$_REQUEST['id']);
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
                    <input name="phone" type="text" class="form-control" placeholder="مثال : 09152154411" value=<?php echo $phonenumber ?>>
                </div>
            </div>
            <input name=<?php echo $ac ?> type="submit" class="btn btn-success" value="ثبت">
        </form>
    </div>
</body>

</html>