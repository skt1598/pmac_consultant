<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>

    <section class="wellcome_area clearfix" id="home" style="max-height: 350px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading" style="padding-top: 80px; text-align: center;">
                        <h2><?php echo ucwords($this->page['page_title']); ?></h2>
                    </div>                    
                </div>
            </div>
        </div>        
    </section>

    
        

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features" style="padding-top: 100px;">
        <div class="container">
           
            <div class="row">
                <!-- Single Feature Start -->
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="single-feature">
                        <h5><?php echo ucwords($this->page['page_title']); ?></h5>
                        <p><?php echo ucfirst($this->page['page_content']); ?></p>
                    </div>
                </div>
                
            </div>

        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->

   
<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>