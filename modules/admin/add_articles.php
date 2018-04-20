<?php
$tpl = new bQuickTpl();
include(getcwd() . "/modules/admin/common.php");
include(getcwd() . "/core/nocsrf.php");
if(isset($_GET) && !empty($_GET)){
	$course_id = $_GET['attr1'];
	$chapter_id = $_GET['attr2'];
}
if(isset($_POST) && !empty($_POST) ){
	$x = $_POST['course_id'];
	$y = $_POST['chapter_id'];
	$content = $_POST['content'];
	$database->insert("articles", ["content" => $content, "course" => $x, "chapter" => $y], array("AND" => array("course_id" => $x,"id" => $y)));
	header("location: "._admin_url."/articles?x=".$x."&y=".$y);
	exit;
}
$tpl->course_id = $course_id;
$tpl->chapter_id = $chapter_id;
echo $tpl->render("themes/admin/html/add_articles.php");
// 