<?php

include(getcwd() . "/core/nocsrf.php");
$tpl = new bQuickTpl();
include(getcwd() . "/modules/site/common.php");

// Send SEO Data
$tpl->page_title = "Inventory";
$tpl->page_description = site_seo_description;
$tpl->keywords = site_seo_keywords;
$tpl->page_image = main_url . website_logo;
// Send SEO Data
header("Location: " . main_url."/admin");
exit();

$faqs = $database->select("faqs", "*");
$tpl->faqs = $faqs;


unset($_SESSION['contact']);
if (isset($_POST['submit']) && !empty($_POST['submit'])) {
    $_SESSION['contact'] = $_POST['data'];
    
        $name = clean($_POST['data']['name']);
        $email = clean($_POST['data']['email']);
        $query_subject = clean($_POST['data']['subject']);
        $query_message = clean($_POST['data']['message']);

        // Send mail to the User
        $to = $email;
        $subject = $query_subject;
        $message = '<html>
                <head>
                    <title>Welcome to Live Move Play</title>

                </head>
                <body>
                    <div style="background:#e5e5e5; padding-top: 10px;">
    <br>
    <div style="margin: 2%">
    <div style="direction:ltr;text-align:left;font-family:arial,sans-serif;color:#444;background:#fff url(https://zingura.com/themes/site/default/images/backgrounds/pageback.jpg) no-repeat bottom center;padding:1.5em;border-radius:1em;max-width:600px;margin:2% auto 0 auto">
        <table style="background:white;width:100%; border-radius: 20px; box-shadow: 0px 0px 20px #ccc; border: 1px solid #eee;">
            <tbody>
                <tr>
                    <td>
                        <div style="width:90px;height:54px;margin:10px"><img src="http://goplay.codecrab.in/uploads/misc/logo.png" alt="Goplay" height="50" class="CToWUd"></div>
                        <br>

                        <div style="max-width:90%;padding-left:15px; padding-right:20px;">

                            <p><span style="font-family:arial,sans-serif;font-size:small;line-height:1.4em">
                                    Hi <b>' . $name . '</b>,
                                </span>
                            </p>
                            <p>

                              <span style="font-family:arial,sans-serif;font-size:2.08em;color: #008749; font-weight: bold; max-width:90%;">
                                    We have recieved your query and one of the representative will contact back you soon.
                              </span>
                                <br>
                            </p>
                        </div>  
                        <br>
                        <div style="float: left; text-align: left; width:100%; margin-bottom: 30px; padding-left: 15px; margin-top: 20px; clear: both;">
                           <a href="' . main_url . '" style="background-color: #ea8b2e; display: inline; 
                               border-color: #dd7e21;
                               padding: 14px 22px;
                               font-weight: 800;
                               font-size: 14px;
                               font-weight: 400;
                               line-height: 1.42857143;
                               text-align: center;
                               border: 1px solid transparent;
                               border-radius: 4px;
                               text-decoration:none;
                               color: #fff; clear: both;">
                                <strong>Website Link</strong>
                            </a>    
                        </div>

                        <br><br><br>
                    </td>
                </tr>
            </tbody>                
        </table>            
    </div>        
    </div>
    <div style="direction:ltr;color:#777;font-size:0.8em;border-radius:1em;padding:1em;margin:0 auto 4% auto;font-family:arial,sans-serif;text-align:center">
    <br><br>Regards<br>Live Move Play Team
    </div></div>
    </div>
    </body>
    </html>';

        sendEmail($to, $subject, $message, $shortcodes = null, $from = null, $mail);

        // Send mail to the admin
        $toAdmin = contact_email;
        $subjectAdmin = 'Query : ' . $query_subject;
        $messageadmin = '<html>
                <head>
                    <title>Query Submitting By User</title>

                </head>
                <body>
                    <div style="background:#e5e5e5; padding-top: 10px;">
    <br>
    <div style="margin: 2%">
    <div style="direction:ltr;text-align:left;font-family:arial,sans-serif;color:#444;background:#fff url(https://zingura.com/themes/site/default/images/backgrounds/pageback.jpg) no-repeat bottom center;padding:1.5em;border-radius:1em;max-width:600px;margin:2% auto 0 auto">
        <table style="background:white;width:100%; border-radius: 20px; box-shadow: 0px 0px 20px #ccc; border: 1px solid #eee;">
            <tbody>
                <tr>
                    <td>
                        <div style="width:90px;height:54px;margin:10px"><img src="http://goplay.codecrab.in/uploads/misc/logo.png" alt="Goplay" height="50" class="CToWUd"></div>
                        <br>

                        <div style="max-width:90%;padding-left:15px; padding-right:20px;">

                            <p><span style="font-family:arial,sans-serif;font-size:small;line-height:1.4em">
                                    Hi <b>Admin</b>, <br>
                                    has some query regarding <b>' . $query_subject . '</b> by <b>' . $name . '</b>,
                                </span>
                            </p>
                            <p>

                              <span style="font-family:arial,sans-serif;font-size:2.08em;color: #008749; font-weight: bold; max-width:90%;">
                                    Message is as follow: ' . $query_message . '
                              </span>
                                <br>
                            </p>
                        </div>  
                    </td>
                </tr>
            </tbody>                
        </table>            
    </div>        
    </div>
    <div style="direction:ltr;color:#777;font-size:0.8em;border-radius:1em;padding:1em;margin:0 auto 4% auto;font-family:arial,sans-serif;text-align:center">
    <br><br>Regards '.$name.'
    </div></div>
    </div>
    </body>
    </html>';

        sendEmail($toAdmin, $subjectAdmin, $messageadmin, $shortcodes = null, array($name, $email), $mail);

        ?>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/jquery/jquery.min.js"></script>
        <script type="text/javascript">
         alert("Your message has been sent. Thank you!");
        </script>
<?php
        unset($_SESSION['contact']);
        unset($_POST['data']);
    }


echo $tpl->render("themes/site/" . theme_name . "/html/index.php");
