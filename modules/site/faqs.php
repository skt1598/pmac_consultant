<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");


// Send SEO Data
$tpl->page_title = "Frequently Asked Questions";
$tpl->page_description =  site_seo_description;
$tpl->keywords =  site_seo_keywords;
$tpl->page_image       = main_url.website_logo;
// Send SEO Data

$categories = $database->select("faqs_categories","*");
$tpl->categories = $categories;



echo $tpl->render("themes/site/".theme_name."/html/faqs.php");
