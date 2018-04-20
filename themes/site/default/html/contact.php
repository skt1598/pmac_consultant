<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
<style>
    .has-error .form-control {
        border-color: #a94442;
    }
    .help-block {
        color: #a94442;
    }
</style>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro" style="height:47vh;">

    <div class="intro-text">
      <!--<h2>Welcome to Live Move Play</h2>-->
      <h2>Get off the Couch & GoPlay</h2>
      <p>Your App to: Post, Search and DO the things you want when you want.</p>
      
      <div class="row">
          <div class="text-center">
            <a href="#" class="btn-get-started scrollto"><i class="fa fa-android"></i> Google Store</a>
          </div>
            <div class="text-center">
            <a href="#" class="btn-get-started scrollto"><i class="fa fa-apple"></i> Apple Store</a>
          </div>
        </div>
    </div>

  </section><!-- #intro -->
<main id="main">
<section id="contact" class="section-bg">
    <div class="container">
        <div class="row wow fadeInUp">


            <div class="col-lg-3 col-md-4">
                <div class="info">
                    <div>
                        <i class="ion-ios-location-outline"></i>
                        <p>500 Terry Francois st.<br>San Francisco, CA 94158</p>
                    </div>

                    <div>
                        <i class="ion-ios-email-outline"></i>
                        <p>info@mysite.com</p>
                    </div>

                    <div>
                        <i class="ion-ios-telephone-outline"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>

                    <div>
                        <i class="ion-ios-telephone-outline"></i>
                        <p>+1 5589 55488 55s</p>
                    </div>

                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="form">
                    <div id="sendmessage">Your message has been sent. Thank you!</div>
                    <div id="errormessage"></div>
                    <form action="" method="post" class="contactForm contact-form wow fadeInUp" id=''>
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
                        <div class="form-row">
                            <div class="form-group col-lg-6">
                                <input type="text" name="data[name]" data-parsley-required class="form-control" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" value="<?php echo $_SESSION['contact']['subject']; ?>" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group col-lg-6">
                                <input type="email" class="form-control" data-parsley-required dataparsley-type="email" name="data[email]" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" value="<?php echo $_SESSION['contact']['subject']; ?>" />
                                <div class="validation"></div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" data-parsley-required name="data[subject]" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" value="<?php echo $_SESSION['contact']['subject']; ?>" />
                            <div class="validation"></div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" name="data[message]" data-parsley-required rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"><?php echo $_SESSION['contact']['subject']; ?></textarea>
                            <div class="validation"></div>
                        </div>
                        <div class="text-center"><button name="submit" value="SUBMIT" type="submit" title="Send Message">Send Message</button></div>
                    </form>
                </div>
            </div>

        </div>

    </div>
</section><!-- #contact -->

</main>
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>