<?php
$tpl = new bQuickTpl();
$tpl->page_title = "Admin Panel";
include(getcwd() . "/modules/admin/common.php");
//error_reporting(1);

//if ($_SESSION['admin_type'] == "moderator") {
//    header("Location: " . _admin_url . "/table/reported_content");
//    exit();
//}

if(isset($_POST['currentsearchtype']) && $_POST['currentsearchtype']){
        $_SESSION['CurrentSearchType'] = $_POST['currentsearchtype'];
        
        if($_SESSION['CurrentSearchType'] == "date_range"){
            $daterange_array = array();
            $daterange_array[0] = $_POST['date_range_from'];
            $daterange_array[1] = $_POST['date_range_to'];
            $_SESSION['DateDateRangeFrom'] = $_POST['date_range_from'];
            $_SESSION['DateDateRangeTo'] = $_POST['date_range_to'];
            
            $_SESSION['DateDateRange'] = $daterange_array;
        }else{
            unset($_SESSION['DateDateRange']);
        }
    }
    if(!isset($_SESSION['CurrentSearchType']) || $_SESSION['CurrentSearchType'] == ""){
            $_SESSION['CurrentSearchType'] = "today";
    }

$get_count_data = getCountData($database, $_SESSION['CurrentSearchType'], $_SESSION['DateDateRange']);
$tpl->get_count_data = $get_count_data[0];
//pr($get_count_data);

echo $tpl->render("themes/admin/html/index.php");