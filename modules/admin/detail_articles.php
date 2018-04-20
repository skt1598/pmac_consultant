<?php

$tpl = new bQuickTpl();
include(getcwd() . "/modules/admin/common.php");
if (isset($vars[2]) && $vars[2]) {
    $table_name = $vars[2];
} else {
    header("Location: " . _admin_url . "/404");
    exit();
}
if (isset($vars[3]) && $vars[3]) {
    $record_id = $vars[3];
} else {
    header("Location: " . _admin_url . "/404");
    exit();
}
$page= $_GET['p'];
$cour= $_GET['co'];
$chap= $_GET['ch'];
$tpl->cour = $cour;
$tpl->chap = $chap;
$tpl->page = $page;
$record_id = str_replace("rec:", "", $record_id);
// echo $record_id; exit;
$tpl->record_id = $record_id;
$primary_key = $database->getPKID($table_name);
$getrecord_info = $database->select($table_name, array("course","chapter","content"), array("AND" => array($primary_key => $record_id, "course" => $cour, "chapter" => $chap)));

$getleast_id = $database->select($table_name, $primary_key, array("AND" => array( "course" => $cour, "chapter" => $chap),"ORDER" => $primary_key . " ASC", "LIMIT" => 1));
// echo $database->last_query(); exit;
$gethighest_id = $database->select($table_name, $primary_key, array("AND" => array( "course" => $cour, "chapter" => $chap), "ORDER" => $primary_key . " DESC", "LIMIT" => 1));
$last_id = $database->select($table_name, $primary_key, array("AND" => array($primary_key . "[<]" => $record_id, "course" => $cour, "chapter" => $chap),"ORDER" => $primary_key . " DESC", "LIMIT" => 1));
$next_id = $database->select($table_name, $primary_key, array("AND" => array($primary_key . "[>]" => $record_id,  "course" => $cour, "chapter" => $chap),"ORDER" => $primary_key . " ASC", "LIMIT" => 1));
// pr($getrecord_info);
// pr($getleast_id);
// pr($gethighest_id);
// pr($last_id);
// pr($next_id);
// exit;
$next = "";
$last = "";

if (isset($last_id[0]) && $last_id[0]) {
    $last = $last_id[0];
}
if (isset($next_id[0]) && $next_id[0]) {
    $next = $next_id[0];
}
$custom_data = array();
//pr($get_another_data);exit;
foreach ($get_another_data as $stuff) {
    if ($stuff['main_table'] == $table_name) {
        $query_complete = $database->select($stuff['secondary_table'], "*");
        $custom_data[$stuff['main_field']]['data'] = $query_complete;
        $custom_data[$stuff['main_field']]['attributes']['seconday_field'] = $stuff['secondary_field'];
        $custom_data[$stuff['main_field']]['attributes']['value'] = $stuff['value'];
        $custom_data[$stuff['main_field']]['attributes']['secondary_table'] = $stuff['secondary_table'];
    }
}

$tpl->lowest_id = $getleast_id[0];
$tpl->highest_id = $gethighest_id[0];
$tpl->last_id = $last;
$tpl->next_id = $next;
$tpl->current_record = $record_id;
$tpl->page_title = "Detail Page";
$tpl->tb_primaryid = $primary_key;
$tpl->record_info = $getrecord_info[0];
$tpl->table_name = $table_name;
$tpl->custom_data = $custom_data;
include(getcwd() . "/modules/admin/common.php");
echo $tpl->render("themes/admin/html/detail_articles.php");
