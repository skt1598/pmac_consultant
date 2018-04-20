<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" rel="stylesheet">
<style>
    .xdsoft_timepicker{
        display: none !important;
    }

</style>
    <section class="wellcome_area clearfix contact-section sectionsssssss" id="home" style="max-height: 350px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading" style="padding-top: 80px; text-align: center;">
                        <h2><?php echo $this->page_title; ?></h2>
                    </div>                    
                </div>
            </div>
        </div>        
    </section>

    
        

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix contact-section section" id="contact" style="padding-top: 30px;">
        <div class="container">

        <!-- SECTION HEADING -->
        <!--<h2 class="section-heading text-center wow fadeIn" data-wow-duration="1s"><b>Join Us</b></h2>-->
        <div class="row">
            <div class="col-12 col-md-3"></div>
            <div class="col-md-6">
                <p class="animated wow fadeIn text-center" data-wow-duration="1s">JOIN US AND LET'S START SHARING KNOWLEDGE</p>

            </div>
        </div>
<form action="" method="post" class="contact-form wow fadeInUp" enctype="multipart/form-data" id='SignupForm'>
        <!-- CONTACT FORM -->
        <?php if ($this->errors) { ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach ($this->errors as $value) {
                                echo "<li style='list-style:circle'>" . $value . "</li>";
                            }
                            ?>
                        </div>
                    <?php } ?>
                    
                    <?php if ($this->success) { ?>
                        <div class="alert alert-success">
                            <?php
                            foreach ($this->success as $value) {
                                echo "<li style='list-style:circle'>" . $value . "</li>";
                            }
                            ?>
                        </div>
                    <?php } ?>
        <div class="row">
            
            <div class="col-12 col-md-6">
                    <div class="form-group">
                        <label>Your Name:</label>
                        <input type="text" style="height: 50px;" class="form-control" data-parsley-required placeholder="Your Name" autocomplete="off" name="data[name]" value="<?php echo $_SESSION['signup']['name']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Your Email Address:</label>
                        <input type="email" style="height: 50px;" class="form-control" data-parsley-required dataparsley-type="email" placeholder="Your Email Address" autocomplete="off" name="data[email]" value="<?php echo $_SESSION['signup']['email']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Your Password:</label>
                        <input type="password" style="height: 50px;" class="form-control" data-parsley-required placeholder="Password" autocomplete="off" name="data[password]" value="<?php echo $_SESSION['signup']['password']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Confirm Your Password:</label>
                        <input type="password" style="height: 50px;" class="form-control" data-parsley-required placeholder="Confirm Password" autocomplete="off" name="data[confirm_password]" value="<?php echo $_SESSION['signup']['confirm_password']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Description</label>
                        <textarea rows="4" class="form-control" placeholder="Message" data-parsley-required name="data[description]"><?php echo $_SESSION['signup']['description']; ?></textarea>
                    </div>
                     <div class="form-group">
                        <label>Birthday</label>
                        <input class="form-control datetimepicker" value="<?php echo $_SESSION['signup']['birthday']; ?>" placeholder="Birthday" data-parsley-required name="data[birthday]">
                    </div>
                
            </div>
            <div class="col-12 col-md-6">
                <div class="row">
                    <div class="col-12 col-md-6">
                            
                <label>ID Proof</label>
                    <div class="form-group">
<!--                        
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;">
                                <img style="padding: 3px; border:1px solid #ccc;" src="http://placehold.it/200x200&amp;text=No Image" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 270px;"></div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>

                                    <input type="file" name="data[idproof]" placeholder="Select Image" accept="image/*"></span>
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                            
                        </div>-->
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <?php if ($_SESSION['signup']['id_proof']) { ?>
                                    <img  width="100%" id="prevImg" src="<?php echo main_url."/uploads/".$_SESSION['signup']['id_proof']; ?>" alt="Select Image" class="pull-left">
                                <?php } else { ?>
                                    <img style="padding: 3px; border:1px solid #ccc;" src="<?php echo main_url; ?>/themes/site/default/images/select-image2.jpg" alt="Select Image">
                                <?php } ?>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 270px;"></div>
                            <div>
                                <span class="btn btn-success btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>

                                    <input type="file" value="" placeholder="Select Image"  class="idproofimage" accept="image/*"></span>
                                <input type="hidden" name="data[id_proof]" id="IDProofImage" placeholder="Select Image" value="<?php echo $_SESSION['signup']['id_proof']; ?>"  class="idproofimage" accept="image/*">
                                
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                            
                            <div class="row">
                                <div id="uploading_text1" style="padding-left:10px; padding-top: 10px; color: red;" class=""><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    Uploading Image ... Please wait...</div>

                            </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-12 col-md-6">
                            
                <label>Address Proof</label>
                    <div class="form-group">
                        
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                <?php if ($_SESSION['signup']['address_proof']) { ?>
                                    <img  width="100%" id="prevImg" src="<?php echo main_url."/uploads/".$_SESSION['signup']['address_proof']; ?>" alt="Select Image" class="pull-left">
                                <?php } else { ?>
                                    <img style="padding: 3px; border:1px solid #ccc;" src="<?php echo main_url; ?>/themes/site/default/images/select-image2.jpg" alt="Select Image">
                                <?php } ?>
                                
                                
                                
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 270px;"></div>
                            <div>
                                <span class="btn btn-primary btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>

                                    <input type="file" value="" placeholder="Select Image"  class="addressproofimage" accept="image/*"></span>
                                    <input type="hidden" name="data[address_proof]" value="<?php echo $_SESSION['signup']['address_proof']; ?>" id="AddressProofImage" placeholder="Select Image"  class="addressproofimage" accept="image/*">
                                
                                <a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                            
                            <div class="row">
                                <div id="uploading_text2" style="padding-left:10px; padding-top: 10px; color: red;" class=""><i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                                    Uploading Image ... Please wait...</div>

                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                
                
                
                
                
                
                
            
                    <div class="form-group">
                        <fieldset class="form-group row">
                            <legend class="col-form-legend col-sm-2">Gender</legend>
                            <div class="col-sm-10">
                              <div class="form-check">
                                <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="data[gender]" id="gridRadios1" value="male" <?php if ($_SESSION['signup']['gender'] == 'male') { echo "checked"; } ?>>
                                  Male
                                </label>
                                  
                              </div>
                                <div class="form-check">
                                
                                  <label class="form-check-label">
                                  <input class="form-check-input" type="radio" name="data[gender]" required="" id="gridRadios2" value="female" <?php if ($_SESSION['signup']['gender'] == 'female') { echo "checked"; } ?>>
                                  Female
                                </label>
                              </div>
                            </div>
                          </fieldset>
                        
                        
                        
                        
<!--                        <label>Gender</label> <br>
                        <div class="btn-group btn-group-toggle" data-toggle="buttons">
                            <label class="btn btn-secondary">
                                <input type="radio" name="data[gender]" id="option2" autocomplete="off" value="male"> Male
                            </label>
                            <label class="btn btn-secondary">
                                <input type="radio" name="data[gender]" id="option3" autocomplete="off" value="female"> Female
                            </label>
                          </div>-->
                    </div>
                    <!--<center>-->
                    <div class="form-group">
                        <label>Please Check the Captcha:</label>
                         <div class="g-recaptcha" data-sitekey="6LfKRT8UAAAAAK1bfGMRJnPEbAzaD8f6BmRRvT66"></div>
                    </div>
                    <!--</center>-->
                    <br>

                    <div class="form-group">
                        <button name="submit" value="SUBMIT" id="SubmitButton" type="submit" class="btn btn-primary btn-block" data-loading-text="Loading..." style="padding: 14px 22px;">Signup Now</button>
                    </div>
            </div>
            
        </div>
</form>
    </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

   
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.1.2/parsley.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script type="text/javascript">
    $("#SignupForm").parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsWrapper: "<span class='help-block'></span>",
        errorTemplate: "<span></span>"
    });
</script>
<script>
$(document).ready(function () {
        $(function () {
            $('.datetimepicker').datetimepicker({
                format: 'Y-m-d',
                formatTime: 'g:i a',
            });
          });
    });
</script>
<script>
        $("#uploading_text1").hide();
        $('.idproofimage').change(function () {
            $("#uploading_text1").show();
            $("#SubmitButton").attr("disabled", "disabled");

            //previewURL(this);
            if ($(this).val() != '') {
                var formData = new FormData();
                formData.append('module_type', "identification_image");
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '<?php echo main_url; ?>/uploads/upload.php',
                    type: 'POST',
                    data: formData,
                    crossDomain: true,
                    complete: function (r) {
                        var data = jQuery.parseJSON(r.responseText);
                        $("#IDProofImage").val(data.data.save_path);
                        $("#uploading_text1").hide();
                        $("#SubmitButton").removeAttr("disabled");

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
</script>

<script>
        $("#uploading_text2").hide();
        $('.addressproofimage').change(function () {
            $("#uploading_text2").show();
            $("#SubmitButton").attr("disabled", "disabled");

            //previewURL(this);
            if ($(this).val() != '') {
                var formData = new FormData();
                formData.append('module_type', "identification_image");
                formData.append('file', $(this)[0].files[0]);
                $.ajax({
                    url: '<?php echo main_url; ?>/uploads/upload.php',
                    type: 'POST',
                    data: formData,
                    crossDomain: true,
                    complete: function (r) {
                        var data = jQuery.parseJSON(r.responseText);
                        $("#AddressProofImage").val(data.data.save_path);
                        $("#uploading_text2").hide();
                        $("#SubmitButton").removeAttr("disabled");

                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            }
        });
</script>