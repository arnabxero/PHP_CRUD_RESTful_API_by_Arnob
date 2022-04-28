<?php

//Some helper variables that used throughout the entire page to show and keep track of various dynamic data --Start
$start = 0;
$end = 0;
$total_data = 0;
$page_number = 1;
$page_size = 5;
//Some helper variables that used throughout the entire page to show and keep track of various dynamic data --End



//Variables to keep track of selected page size --Start
$selected_5 = "";
$selected_10 = "";
$selected_15 = "";
$selected_20 = "";
//Variables to keep track of selected page size --End



//A function that generates dynamic pagination bar and controls it --Start
function paginator($page_n, $page_s)
{
    if ($page_n <= 0) {
        $page_n = 1;
    }

    $page_a = $page_n - 3;
    $page_b = $page_n - 2;
    $page_c = $page_n - 1;
    $page_d = $page_n;
    $page_e = $page_n + 1;
    $page_f = $page_n + 2;
    $page_g = $page_n + 3;

    $page_a_act = "";
    $page_b_act = "";
    $page_c_act = "";
    $page_d_act = "";
    $page_e_act = "";
    $page_f_act = "";
    $page_g_act = "";

    if ($page_n == $page_a) {
        $page_a_act = "active";
    } else  if ($page_n == $page_b) {
        $page_b_act = "active";
    } else  if ($page_n == $page_c) {
        $page_c_act = "active";
    } else  if ($page_n == $page_d) {
        $page_d_act = "active";
    } else  if ($page_n == $page_e) {
        $page_e_act = "active";
    } else  if ($page_n == $page_f) {
        $page_f_act = "active";
    } else  if ($page_n == $page_g) {
        $page_g_act = "active";
    }

    echo
    '<a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . ($page_n - 1) . '&page[size]=' . $page_s . '">< PREVIOUS</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_a . '&page[size]=' . $page_s . '" class="' . $page_a_act . '">' . $page_a . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_b . '&page[size]=' . $page_s . '" class="' . $page_b_act . '">' . $page_b . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_c . '&page[size]=' . $page_s . '" class="' . $page_c_act . '">' . $page_c . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_d . '&page[size]=' . $page_s . '" class="' . $page_d_act . '">' . $page_d . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_e . '&page[size]=' . $page_s . '" class="' . $page_e_act . '">' . $page_e . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_f . '&page[size]=' . $page_s . '" class="' . $page_f_act . '">' . $page_f . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . $page_g . '&page[size]=' . $page_s . '" class="' . $page_g_act . '">' . $page_g . '</a>
    <a style="color: #9494b8; font-weight: bold;" href="index.php?page[number]=' . ($page_n + 1) . '&page[size]=' . $page_s . '">NEXT ></a>';
}
//A function that generates dynamic pagination bar and controls it --End

//Get default page number = 1 & size = 5
$n = $page_number - 1;
if ($n < 0) $n = 0;
$i = $page_size;
$start = $n * $i + 1;
$end = $start + $i - 1;

//A condition that receieves page number and size information from link, And generates range of data index --Start
if (isset($_GET['page'])) {
    $page_number = $_GET['page']['number'];
    $page_size = $_GET['page']['size'];


    $n = $_GET['page']['number'] - 1;
    if ($n < 0) $n = 0;
    $i = $_GET['page']['size'];
    $start = $n * $i + 1;
    $end = $start + $i - 1;

    if ($page_size == 5) {
        $selected_5 = "selected";
    } else  if ($page_size == 10) {
        $selected_10 = "selected";
    } else  if ($page_size == 15) {
        $selected_15 = "selected";
    } else  if ($page_size == 20) {
        $selected_20 = "selected";
    }
}
//A condition that receieves page number and size information from link, And generates range of data index --End



//A class that generates the data table with page number and size information --Start
class Table_Generator
{
    //A custom string filter for datetime string --Start
    function arnab_filter($string)
    {
        for ($i = 0; $i < strlen($string); $i++) {
            if ($string[$i] == 'T') {
                $string[$i] = ' ';
            }
        }
        return $string . ' UTC';
    }
    //A custom string filter for datetime string --End


    //A function that generates the data table by sending page number and size to a backend php class --Start
    function generate()
    {
        include('backend/form_handle.php');
        $page_number = 0;
        $page_size = 5;

        if (isset($_GET['page'])) {
            $page_number = $_GET['page']['number'];
            $page_size = $_GET['page']['size'];
        }

        $obj = new Form_Handler();     //[Note: the backend class named 'Form_Handler' inside the file 'form_handle' calls the API with necessary data]
        $decoded = $obj->GET_ALL($page_number, $page_size);

        $size = sizeof($decoded) - 1;

        for ($i = 0; $i < $size; $i++) {
            $date = $this->arnab_filter($decoded[$i]->DateTime);

            echo "<tbody>";
            echo "<td><strong>" . $decoded[$i]->Name . "</strong></td>";
            echo "<td>" . $decoded[$i]->Location . "</td>";
            echo "<td>" . $date . "</td>";
            echo "<td><strong><a href='edit.php?id=" . $decoded[$i]->id . "'>Edit</a> <a href='delete.php?id=" . $decoded[$i]->id . "'>&nbspDelete</a></strong></td>";
            echo "</tbody>";
        }

        $return_total[] = $decoded[$i]->len;
        $return_total[] = $size;

        return $return_total;
    }
    //A function that generates the data table by sending page number and size to a backend php class --End
}

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

    <title>RESTful API - Home</title>
</head>

<body style="background-color: #f7fafc; font-family: 'Open Sans', sans-serif;">
    <div class="main-box">
        <h3>&nbspEvents</h3>
        <label style="color: #9494b8;">&nbsp&nbspList of Events - <a href="create.php">Create</a></label>

        <br>
        <hr>
        <br>

        <!--Entry Query-->
        <label style="display:inline-block;">
            &nbsp&nbspShow
            <select id="size" onchange="location = this.value;" style="display:inline-block;" name="example_length" aria-controls="example" class="form-select form-select-sm arnab-dropdown">
                <option value="index.php?page[number]=<?= $page_number ?>&page[size]=5" <?= $selected_5 ?>>5</option>
                <option value="index.php?page[number]=<?= $page_number ?>&page[size]=10" <?= $selected_10 ?>>10</option>
                <option value="index.php?page[number]=<?= $page_number ?>&page[size]=15" <?= $selected_15 ?>>15</option>
                <option value="index.php?page[number]=<?= $page_number ?>&page[size]=20" <?= $selected_20 ?>>20</option>
            </select>
            entries
        </label>
        <br>
        <br>


        <!--Table-->
        <table id="example" class="table table-borderless" style="width:100%">
            <thead>
                <tr>
                    <th style="text-align: left;">Name</th>
                    <th style="text-align: left;">Location</th>
                    <th style="text-align: left;">Time</th>
                    <th style="text-align: left;">Action</th>
                </tr>
            </thead>
            <?php
            $table_gen = new Table_Generator();

            $total_data = $table_gen->generate();
            ?>
        </table>
        &nbsp
        <?php
        if ($total_data[1] <= 0) {
            echo "No Data Found in this range";
        }
        ?>
        <hr>

        <!--Paginator-->
        <label style="float:left; color:#686881;">&nbsp&nbspShowing <strong><?= $start ?></strong> to <strong><?= $end ?></strong> of <strong><?= $total_data[0] ?></strong> results</label>
        <div class="pagination" style="float:right;">
            <!--Paggination Generation-->
            <?php
            paginator($page_number, $page_size);
            ?>
        </div>
    </div>
</body>

</html>