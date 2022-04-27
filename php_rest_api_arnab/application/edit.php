<?php

include('backend/form_handle.php');

$obj = new Form_Handler();

//Refil form data with existing information --Start
$id = -99;
$pre_name = "Undefined";
$pre_location = "Undefined";
$pre_date = "Undefined";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jsonid = '{
                    "id": "' . $id . '"
                }';

    $decoded = $obj->GET_ONE($jsonid);


    $pre_name =  $decoded[0]->Name;
    $pre_location = $decoded[0]->Location;
    $pre_date = $decoded[0]->DateTime;
}
//Refil form data with existing information --End



//Update data --Start
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $datetime = $_POST['date'];

    $jsondata = '{
                    "id": "' . $id . '",
                    "name": "' . $name . '",
                    "location": "' . $location . '",
                    "date": "' . $datetime . '"
                }';

    $showmsg = $obj->PUT_ONE($jsondata);

    header('Location: index.php');
}
//Update data --End

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles.css?v=<?php echo time(); ?>">

    <title>RESTful API - EDIT</title>
</head>

<body style="background-color: #f7fafc; font-family: 'Open Sans', sans-serif;">


    <div class="main-box">
        <h3>Events</h3>
        <form>
            <label style="color: #9494b8;">Edit an Event -
                <a type="button" value="Back" class="a" onclick="history.back()">Back</a>
            </label>
        </form>
        <hr>
        <br>


        <!--FORM-->
        <form method="POST">
            <div class="row">
                <div class="col">
                    <label for="name" class="form-label">Name</label>
                    <input name="name" id="name" type="text" class="form-control" value="<?= $pre_name ?>">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col">
                    <label for="location" class="form-label">Location</label>
                    <input name="location" id="location" type="text" class="form-control" value="<?= $pre_location ?>">
                </div>
                <div class="col">
                    <label for="date" class="form-label">Date</label>
                    <input name="date" id="date" type="datetime-local" class="form-control" value="<?= $pre_date ?>">
                </div>
            </div>
            <br>
            <br>
            <button name="submit" type="submit" class="btn btn-primary" style="float:right;">Update</button>
        </form>
        <br>
    </div>
</body>

</html>