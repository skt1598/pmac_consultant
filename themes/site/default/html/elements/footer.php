<style>
    .has-error .form-control {
        border-color: #a94442;
    }
    .help-block {
        color: #a94442;
    }

</style>
<!--==========================
  Contact Section
============================-->
<section id="contact" class="section-bg">
    <div class="container">
        <div class="row wow fadeInUp">

            <div class="col-lg-4 col-md-4">
                <div class="contact-about">
                    <a href="#intro" class="scrollto"><img style='width: 300px;' src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/img/logo-color.png" /></a><br><br>
                    <p>Your App to: Post, Search and Do the things you want when you want.</p>
                    <div class="social-links">
                        <?php if (twitter_url) { ?>
                            <a href="<?php echo twitter_url; ?>" class="twitter"><i class="fa fa-twitter"></i></a>
                        <?php } if (fb_page_url) { ?>
                            <a href="<?php echo fb_page_url; ?>" class="facebook"><i class="fa fa-facebook"></i></a>
                        <?php } if (instagram_url) { ?>
                            <a href="<?php echo instagram_url; ?>" class="instagram"><i class="fa fa-instagram"></i></a>
                        <?php } if (google_plus_url) { ?>
                            <a href="<?php echo google_plus_url; ?>" class="google-plus"><i class="fa fa-google-plus"></i></a>
                        <?php } if (youtube_url) { ?>
                            <a href="<?php echo youtube_url; ?>" class="youtube"><i class="fa fa-youtube"></i></a>
                        <?php } ?>

                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-4">
                <div class="info">
                    <div>
                        <i class="ion-ios-location-outline"></i>
                        <p>Address Goes here</p>
                    </div>

                    <div>
                        <i class="ion-ios-email-outline"></i>
                        <p>Email Address goes here</p>
                    </div>

                    <div>
                        <i class="ion-ios-telephone-outline"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>
                    
                </div>
            </div>

            <div class="col-lg-5 col-md-8">
                <div class="form">
                    <form action="" method="post" role="form" class="contactForm contact-form wow fadeInUp" id='ContactForm'>
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="data[name]" data-parsley-required class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $_SESSION['contact']['name']; ?>" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" data-parsley-required dataparsley-type="email" name="data[email]" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $_SESSION['contact']['email']; ?>" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" data-parsley-required name="data[subject]" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo $_SESSION['contact']['subject']; ?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="data[message]" data-parsley-required rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo $_SESSION['contact']['message']; ?></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class=""><button name="submit" value="SUBMIT" type="submit" title="Send Message">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section><!-- #contact -->

</main>

<!--==========================
  Footer
============================-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 text-lg-left text-center">
                <div class="copyright">
                    &copy; Copyright <strong>Live Move Play</strong>. All Rights Reserved
                </div>
                <div class="credits">                   
                    Powered by <a href="http://codecrab.in">Codecrab Studios</a>
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
                    <a href="#intro" class="scrollto">Home</a>
                    <a href="#about" class="scrollto">About</a>
                    <!--            <a href="#">Privacy Policy</a>
                                <a href="#">Terms of Use</a>-->
                </nav>
            </div>
        </div>
    </div>
</footer><!-- #footer -->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

<!-- JavaScript Libraries -->
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/jquery/jquery.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/jquery/jquery-migrate.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/easing/easing.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/wow/wow.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/superfish/hoverIntent.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/superfish/superfish.min.js"></script>
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/lib/magnific-popup/magnific-popup.min.js"></script>

<!-- Contact Form JavaScript File -->
<!--<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/contactform/contactform.js"></script>-->

<!-- Template Main Javascript File -->
<script src="<?php echo main_url; ?>/themes/site/<?php echo theme_name; ?>/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.1.2/parsley.min.js"></script>
<script type="text/javascript">
    $("#ContactForm").parsley({
        successClass: "has-success",
        errorClass: "has-error",
        classHandler: function (el) {
            return el.$element.closest(".form-group");
        },
        errorsWrapper: "<span class='help-block'></span>",
        errorTemplate: "<span></span>"
    });
</script>
</body>
</html>
