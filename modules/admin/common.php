<?php

if (isset($_SESSION['admin_user_id'])) { 
    //Skipped Tables 
    $skipped_tables = array("fields_admin","fields_mapping", "module_alias", "settings", "table_icons","faqs","users","articles");
    $skipped_add_button = array("users","faqs","users","pages");
    //Fields Mappings
    $get_fields_mappings = $database->select("fields_mapping", "*");
    $hidden_fields = db_mapping_fields($get_fields_mappings, "hidden_fields");
    $required_fields = db_mapping_fields($get_fields_mappings, "required_fields");
    $ckeditor_fields = db_mapping_fields($get_fields_mappings, "ckeditor_fields");
    $date_fields = db_mapping_fields($get_fields_mappings, "date_fields");
    $slug_fields = db_slug_fields($get_fields_mappings);
    $get_another_data = db_get_another_data_fields($get_fields_mappings);
    $file_fields = db_file_fields($get_fields_mappings);
    //pr($get_another_data);
    /* Get URL parameters */
    $vars = explode("/", $_GET['action']);
    /* Fetch Tables from Database */
    $gettables = $database->query("SHOW TABLES FROM " . db_name)->fetchAll();


    $tables = array();
    foreach ($gettables as $tableslist) {
        $tables[] = $tableslist['0'];
    }
    //SETTINGS
    $get_settings = $database->select("settings", "*", array("ORDER" => "id ASC"));
    $new_array = array();
    foreach ($get_settings as $key => $value) {
        $new_array[$value['type']][] = $value;
    }
    //TABLE ICONS
    //$tbl_icon['table_name']='icon_class';
    $database->query("CREATE TABLE IF NOT EXISTS `table_icons`(`id` int(11) NOT NULL AUTO_INCREMENT,`table_name` varchar(100) NOT NULL,`icon_class` varchar(250) NOT NULL DEFAULT 'fa-table',`is_changable` enum('1','0') NOT NULL DEFAULT '1',PRIMARY KEY (`id`)) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1");
    $table_icons = $database->select('table_icons', '*');
    foreach ($table_icons as $k => $v) {
        $icon_tables[] = $v['table_name'];
    }
    if (is_array($table_icons) and ! empty($table_icons)) {
        foreach ($tables as $k => $table_name) {
            if (!in_array($table_name, $skipped_tables)) {
                if (!in_array($table_name, $icon_tables)) {
                    $last_id = $database->insert('table_icons', array('table_name' => $table_name));
                }
            }
        }
        $table_icons = $database->select('table_icons', '*');
        foreach ($table_icons as $k => $v) {
            $tbl_icon[$v['table_name']] = $v['icon_class'];
        }
    } else {
        foreach ($tables as $k => $table_name) {
            if (!in_array($table_name, $skipped_tables)) {
                $last_id = $database->insert('table_icons', array('table_name' => $table_name));
                $tbl_icon[$table_name] = 'fa-table';
            }
        }
    }
    $icon_tables = array_keys($tbl_icon);
    $chk = 0;
    foreach ($icon_tables as $k => $table_name) {
        if (!in_array($table_name, $tables) or in_array($table_name, $skipped_tables)) {
            $database->delete('table_icons', array('table_name' => $table_name));
            $chk = 1;
        }
    }
    if ($chk == 1) {
        header("Location: " . _admin_url . "/index");
        exit();
    }
    ksort($tbl_icon);
    // Manage Fields Sections
    if (isset($vars[2]) && $vars[2] == "manage_fields") {
        if (isset($_POST['table_name']) && $_POST['table_name']) {
            $table_name = $_POST['table_name'];
        }
        if (isset($_POST['fields']) && $_POST['fields']) {
            $fields = $_POST['fields'];
        }
        //fields_admin table
        if ($database->count("fields_admin", array("Table_name" => $table_name)) == 0) {
            $lastid = $database->insert("fields_admin", array(
                "Table_name" => $table_name,
                "Table_Fields" => array($fields),
            ));
            if ($lastid) {
                echo 1;
            } else {
                echo 0;
            }
            header("Location: " . _admin_url . "/index");
        } else {
            $lastid = $database->update("fields_admin", array(
                "Table_Fields" => array($fields),
                    ), array(
                "Table_name" => $table_name,
            ));
            if ($lastid) {
                echo 1;
            } else {
                echo 0;
            }
        }
    }
    
//GET Table Columns
    if (isset($vars[2]) && $vars[2] == "actions") {

        if (isset($_POST['method']) && ($_POST['method'])) {
            $method = $_POST['method'];
        }
        if (isset($_POST['table']) && ($_POST['table'])) {
            $table = $_POST['table'];
        }
        if (isset($_POST['records']) && ($_POST['records'])) {
            $records = $_POST['records'];
        }

        if ($method == "deletearecord") {
            $records = explode(",", $records);
            $primaryid = $database->getPKID($table);
            foreach ($records as $record) {
                $deleterecord = $database->delete($table, array($primaryid => $record));
            }
            echo "1";
        } 
        // else if ($method == "delete_article_record") { echo "hi"; exit;
        //     $deletes = $database->delete($table, array("id" => $_POST['article_id']));
        //     echo $database->last_query(); exit;
        //     if ($deletes) {
        //         echo 1;
        //     } else {
        //         echo 0;
        //     }
        // } 
        else if ($method == "deleteallrecords") {
            $query = "TRUNCATE TABLE " . $table;
            $deleteallrecords = $database->query($query);
            if ($deleteallrecords) {
                echo 1;
            } else {
                echo 0;
            }
        } else if ($method == "publish") {
            $records = explode(",", $records);
            $primaryid = $database->getPKID($table);
            foreach ($records as $record) {
                $publish = $database->update($table, array("status" => 1), array($primaryid => $record));
            }
            echo 1;
        } elseif ($method == "unpublish") {
            $records = explode(",", $records);
            $primaryid = $database->getPKID($table);
            foreach ($records as $record) {
                $unpublish = $database->update($table, array("status" => 0), array($primaryid => $record));
            }
            echo 1;
        }
    }
            // Date Range Types
$daterangertype = array(
    "today", 
    "yesterday", 
    "this_week",
    "this_month",
    "last_month", 
    "this_year", 
    "last_year", 
    "all_time", 
    "date_range"
    );
$tpl->daterangetypes = $daterangertype;
    //passing all variables to Template Class
    $tpl->vars = $vars;
    $tpl->skipped_add_button = $skipped_add_button;
    $tpl->skipped_tables = $skipped_tables;
    $tpl->table_icons = $tbl_icon;
    $tpl->setting_array = $new_array;   
    $tpl->hidden_fields = $hidden_fields;
    $tpl->required_fields = $required_fields;
    $tpl->ckeditor_fields = $ckeditor_fields;
    $tpl->date_fields = $date_fields;
    $tpl->slug_fields = $slug_fields;
    $tpl->get_another_data = $get_another_data;
    $tpl->tables = $tables;
    $tpl->file_fields = $file_fields;

    $tpl->database = $database;

    foreach ($tables as $k => $table_name) {
        $columns = $database->getColumns($table_name);
        //pr($columns);
        foreach ($columns as $k => $v) {
            $table_columns[$table_name][] = $v[0];
        }
    }
    $tpl->table_columns = $table_columns;
} else {
    header("Location: " . _admin_url . "/login");
    exit();
}
?>
