<?php

header('Content-Type: application.json');

$method = $_SERVER['REQUEST_METHOD'];

//Classify Method Type
if ($method == 'GET') {
    $data = json_decode(file_get_contents('php://input'), true);
    Operate_GET($data);
} else if ($method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    Operate_POST($data);
} else if ($method == 'PUT') {
    $data = json_decode(file_get_contents('php://input'), true);
    Operate_PUT($data);
} else if ($method == 'DELETE') {
    $data = json_decode(file_get_contents('php://input'), true);
    Operate_DELETE($data);
} else {
    echo  '{"result": "Invalid Method/Operation"}';
}


//Method Handling Functions
function Operate_GET($data)
{
    include('../config/connection.php');

    $error_message = '{"result": "No Events Found"}';

    $sql = "SELECT * FROM events_table";

    if (isset($_GET['page'])) {
        $n = $_GET['page']['number'] - 1;  //Taking page count from 1, as users often counts thing from 1
        if ($n < 0) $n = 0;                //No matter user starts count from 1 or 0, both indexes shows the first page
        $i = $_GET['page']['size'];

        //A little bit calculation here, if page number is 'n' and page size is 'i',
        //then mysql starting index will be (n*i) and ending index will be (n*i)+i
        //By Eftakhar Ahmed Arnab
        $start = $n * $i + 1;
        $end = $start + $i;

        $sql = "SELECT * FROM events_table"; // LIMIT $start, $end";

        //echo $start."----".$end;


        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = array();

            $auto_indexer = 1;

            while ($rowdata = mysqli_fetch_assoc($result)) {

                if ($auto_indexer >= $start and $auto_indexer < $end) {
                    $row[] = $rowdata;
                }
                $auto_indexer = $auto_indexer + 1;
            }

            $auto_indexer = $auto_indexer - 1;
            $table_size = json_decode('{"len": "' . $auto_indexer . '"}');
            $row[] = $table_size;

            echo json_encode($row);
        } else {
            echo $error_message;
        }
    } else {
        //API will return a single event based on either the url parameter 'id' or http body parameter data['id']
        //The requirement does not include handling an url parameter 'id', so, I set it as a second priority. If http
        //body does not contain any parameter called data['id'], then it will take id from url parameters
        if (isset($_GET['id'])) {
            $error_message = '{"result": "No Event Found With This ID"}';
            $id = $_GET['id'];
            $sql = "SELECT * FROM events_table WHERE id = '$id'";
        }
        if (isset($data['id'])) {
            $error_message = '{"result": "No Event Found With This ID"}';
            $id = $data['id'];
            $sql = "SELECT * FROM events_table WHERE id = '$id'";
        }

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = array();

            while ($rowdata = mysqli_fetch_assoc($result)) {
                $row[] = $rowdata;
            }

            echo json_encode($row);
        } else {
            echo $error_message;
        }
    }
}

function Operate_POST($data)
{
    include('../config/connection.php');

    if (isset($data['name']) and isset($data['location']) and isset($data['date'])) {
        $name = $data['name'];
        $location = $data['location'];
        $datetime = $data['date'];

        $sql = "INSERT INTO events_table(Name, Location, DateTime) 
                VALUES('$name', '$location', '$datetime')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo '{"result": "Successfully Posted"}';
        } else {
            echo '{"result": "Failed to Post"}';
        }
    } else {
        echo '{"result": "Insert input data properly"}';
    }
}

function Operate_PUT($data)
{
    include('../config/connection.php');

    if (isset($data['name']) and isset($data['location']) and isset($data['id']) and isset($data['date'])) {
        if (check_event_existance($data['id'])) {
            $id = $data['id'];
            $name = $data['name'];
            $location = $data['location'];

            $datetime = $data['date'];

            $sql = "UPDATE events_table SET Name = '$name', Location = '$location',
                    DateTime = '$datetime' WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '{"result": "Successfully Updated"}';
            } else {
                echo '{"result": "Failed to Update"}';
            }
        } else {
            echo '{"result": "No event exists with this id"}';
        }
    } else {
        echo '{"result": "Insert input data properly"}';
    }
}

function Operate_DELETE($data)
{
    include('../config/connection.php');

    if (isset($data['id'])) {
        if (check_event_existance($data['id'])) {
            $id = $data['id'];

            $sql = "DELETE FROM events_table WHERE id = '$id'";

            $result = mysqli_query($conn, $sql);

            if ($result) {
                echo '{"result": "Successfully Deleted"}';
            } else {
                echo '{"result": "Failed to Delete"}';
            }
        } else {
            echo '{"result": "No event exists with this id"}';
        }
    } else {
        echo '{"result": "Insert event id properly"}';
    }
}





//Sub-Functions
function check_event_existance($id)
{
    include('../config/connection.php');

    $sql = "SELECT * FROM events_table WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);

    if ($count > 0) {
        return true;
    }

    return false;
}
