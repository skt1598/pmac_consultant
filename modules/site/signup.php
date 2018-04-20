<?php
include(getcwd() . "/core/nocsrf.php");
$tpl =  new bQuickTpl();
include(getcwd()."/modules/site/common.php");


// Send SEO Data
$tpl->page_title = "Join Now";
$tpl->page_description =  site_seo_description;
$tpl->keywords =  site_seo_keywords;
$tpl->page_image       = main_url.website_logo;
// Send SEO Data


unset($_SESSION['signup']);

if(isset($_POST['submit']) && !empty($_POST['submit'])){
    $_SESSION['signup'] = $_POST['data'];
    $errors = array();
    if(!isset($_POST['data']['name']) || $_POST['data']['name'] == ""){
        $errors[] = "Name is required";
    }
    if(!isset($_POST['data']['email']) || $_POST['data']['email'] == ""){
        $errors[] = "Email is required";
    }elseif ($_POST['data']['email'] !== "") {
        $exist_user = $database->get("users", "*", array("user_email" => $_POST['data']['email']));   
        if ($exist_user) {
            $errors[] = "Email Address Allready Exists.";
        }
    }
    if(!isset($_POST['data']['password']) || $_POST['data']['password'] == ""){
        $errors[] = "Password is required";
    }elseif ($_POST['data']['password'] !== "") {
        if(!isset($_POST['data']['confirm_password']) || $_POST['data']['confirm_password'] == ""){
            $errors[] = "Confirm Password is required";
        }
    }
    
    elseif ($_POST['data']['password'] !== $_POST['data']['confirm_password']) {
        $errors[] = "Both Password Don't Match";

    }
    if(!isset($_POST['data']['description']) || $_POST['data']['description'] == ""){
        $errors[] = "Description is required";
    }
    if(!isset($_POST['data']['birthday']) || $_POST['data']['birthday'] == ""){
        $errors[] = "Birthday is required";
    }
    if(!isset($_POST['data']['gender']) || $_POST['data']['gender'] == ""){
        $errors[] = "Gender is required";
    }
    
    
    if(!isset($_POST['data']['id_proof']) || $_POST['data']['id_proof'] == ""){
        $errors[] = "ID Proof is required";
    }
    if(!isset($_POST['data']['address_proof']) || $_POST['data']['address_proof'] == ""){
        $errors[] = "Address Proof is required";
    }
    
    
    if(count($errors) > 0){
        $tpl->errors = $errors;
    }else{
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
        //your site secret key
        $secret = '6LfKRT8UAAAAAGGa_6Vtq7LPoItI41CxOgPj0p1Z';
        //get verify response data
        $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
        $responseData = json_decode($verifyResponse);
        if($responseData->success){
            
                $name = clean($_POST['data']['name']);
                $email = clean($_POST['data']['email']);
                $password = clean($_POST['data']['password']);
                $description = clean($_POST['data']['description']);
                $birthday = clean($_POST['data']['birthday']);
                $gender = clean($_POST['data']['gender']);

                $data = array();
                $data['fullname'] = $name;
                $data['user_email'] = $email;
                $data['password'] = md5($password);
                $data['user_description'] = $description;
                $data['date_of_birth'] = $birthday;
                $data['id_proof'] = $_POST['data']['id_proof'];
                $data['address_proof'] = $_POST['data']['address_proof'];
                $data['gender'] = $gender;
                $data['user_type'] = "tutor";
                $data['is_tutor'] = "0";
                $data['status'] = "0";
                $name = str_replace(' ', '', $name);
                $name = substr($name, 0, 3);
                $invite_code = strtoupper($name.rand(101,998));
                $data['invite_code'] = $invite_code; //Invite Code
                $data['token'] = bin2hex(openssl_random_pseudo_bytes(16)); // Generate Token
                $data['token_expire'] = date('Y-m-d H:i:s', strtotime('+30 days')); // Token Session

                $insert = $database->insert("users", $data);
                if($insert){
                    $link = 'Please Click On This <a href="'.main_url."/verification/".$insert."/".md5($email).'">activation link</a>to activate your account.';
                    
                    
                    // Send mail to the User
                    $to = $email;
                    $subject = 'Signup '.site_name;
                    $message = 'Hello ' . $name . '<br><br> Thanks for connecting with '.site_name.' Team. Your email verification link is <br><br>'.$link;
                    sendEmail($to, $subject, $message, $shortcodes = null, $from = null, $mail);   

                    $success = array();
                    $success[] = "Your account has been made. Please verify it by clicking the activation link that has been send to your email.";
                    $tpl->success = $success;
                    unset($_SESSION['signup']);
                    unset($_POST['data']);
                }
                        
        }else{
            $errors[] = 'Robot verification failed, please try again.';
            $tpl->errors = $errors;
        }
    }else{
        $errors[] = 'Please click on the reCAPTCHA box.';
        $tpl->errors = $errors;
    }
    }



    
}else{
    $tpl->errors = array();
    $tpl->success = array();
}

echo $tpl->render("themes/site/".theme_name."/html/signup.php");