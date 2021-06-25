
<?php
    include("db.php");
    $fullname='';   
    if($_REQUEST['id']){
        $pId = $_REQUEST['id'];
        $q = "SELECT Name, Family FROM person WHERE PId=$pId";
        $result = mysqli_query($str_conn, $q);
        $person = mysqli_fetch_object($result);
        $fullname = $person->Name . " " . $person->Family;
    }
    if(isset($_REQUEST['d'])){
        $id = intval($_REQUEST['d']);
        $q = "DELETE FROM phone WHERE phoneId=$id";
        if(mysqli_query($str_conn, $q)){
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
                <h3 class="p-3 pt-5"><?php echo $fullname ?>  شماره تلفن های</h3>
                <hr />
                <a href="UpsertPhone.php?id=<?php echo $_REQUEST['id'] ?>"><button class="btn btn-primary font-16 m-3">افزودن شماره جدید</button></a>
                <a href="index.php"><button class="btn btn-primary font-16 m-3">لیست اشخاص</button></a>
                <div class="table-responsive">
                    <table id="mytable" class="table table-bordered table-striped m-2">
                        <thead>
                            <th>شماره تلفن</th>
                            <th></th>
                        </thead>
                        <tbody>
                            <?php
                                if(isset($_REQUEST['id'])){
                                    $id = intval($_REQUEST['id']);
                                    $q = "SELECT * FROM phone WHERE personId=$id";
                                    $result = mysqli_query($str_conn, $q);      
                                }  
                                while ($record = mysqli_fetch_object($result)) {                                    
                                    echo "<tr><td>$record->phonenumber</td>
                                    <td><a href='UpsertPhone.php?id=$record->personId&e=$record->phoneId'>Edit</a>
                                    <a href='?id=$record->personId&d=$record->phoneId'>  Delete</a>";
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