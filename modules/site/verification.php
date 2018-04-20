<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");

$get_verification = $database->get("users", array("user_id","user_email"), array("user_id" => $vars[1]));
if ($get_verification['user_id']) {
        if ($get_verification['user_id'] == $vars[1] && md5($get_verification['user_email']) == $vars[2]) {
             $database->update("users", array("email_verified" => "yes"), array("user_id" => $get_verification['user_id']));
             $msg = "You are now verified";             

        } else {
            $msg = "Error Verifiying";             
        }

} else {
    $msg = "The Page you are trying to open is not available!";
}

?>
<?php if(isset($msg) && $msg !== ""){ ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Free coming soon template with jQuery countdown">
<meta name="google-site-verification" content="kyZVrqCz6m8Z5fF___vftN0RgVDklBl3WX9G2FIMuKw" />
<title>
    <?php echo "Email Verification"; ?> | Theraspace
</title>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body style="padding-top:10%; text-align: center;">
      <center>

        <?php echo $msg; ?>
        <p><a href="<?php echo main_url;?>">Back to Homepage</a></p>
        
        
    </center> 
  </body>
</html>
<?php } ?>