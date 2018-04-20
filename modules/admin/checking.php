<?php
$tpl = new bQuickTpl();
include(getcwd() . "/modules/admin/common.php");
include(getcwd() . "/core/nocsrf.php");

$course_id= $_GET['x'];
$chapter_id= $_GET['y'];

$course_name = $database->get("courses", "course_name",["id" => $course_id]);
$tpl->course_name = $course_name;
$chapter_name = $database->get("chapters", "chapter_name",["id" => $chapter_id]);
$tpl->chapter_name = $chapter_name;
$articles = $database->select("articles","*", array("AND" => array("course" => $course_id, "chapter" => $chapter_id)));
$tpl->articles = $articles;

echo $tpl->render("themes/admin/html/articles.php");