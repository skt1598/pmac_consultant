<?php echo $this->render("themes/site/" . theme_name . "/html/elements/header.php"); ?>
    <section class="wellcome_area clearfix" id="home" style="max-height: 350px;">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 col-md">
                    <div class="wellcome-heading" style="padding-top: 80px; text-align: center;">
                        <h2>Frequently Asked Questions</h2>
                    </div>                    
                </div>
            </div>
        </div>        
    </section>

    
        

    <!-- ***** Awesome Features Start ***** -->
    <section class="awesome-feature-area bg-white section_padding_0_50 clearfix" id="features" style="padding-top: 100px;">
        <div class="container">
           
            <div class="row">
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="single-feature">
                        <h5>Index</h5>
                        <p>
                        <ol>
                            <?php foreach($this->categories as $category){ 
                                $count = $this->database->count("faqs", array("category" => $category['id']));
                                if($count !== 0){
                                ?>
                            
                            <li>
                                <a href=""><?php echo ucwords($category['category_name']); ?> (<?php echo $count; ?> questions)</a>
                            </li>
                            
                                <?php }} ?>
                        </ol>
                            
                        </p>
                    </div>
                    
                </div>
            </div>
            
            
            <?php foreach($this->categories as $category){ 
            $count = $this->database->count("faqs", array("category" => $category['id']));
            $faqs = $this->database->select("faqs","*",array("category" => $category['id']));
            
            ?>

            
            <div class="row">
                <?php if($count !== 0){ ?>
                <h2 style="border-bottom: 2px dotted #ccc; width:100%; margin-bottom: 40px; padding-bottom: 20px; "> <?php echo ucwords($category['category_name']); ?> (<?php echo $count; ?> Questions)</h2>
                <?php } ?>
                <br><br><br>
                
                <!-- Single Feature Start -->
                
                <?php foreach($faqs as $faq){ ?>
                <div class="col-12 col-sm-12 col-lg-12">
                    <div class="single-feature">
                        <h5><?php echo ucfirst($faq['question']); ?></h5>
                        <p><?php echo ucfirst($faq['answer']); ?></p>
                    </div>
                </div>
                <?php } ?>
                
                
                
                
            </div>
            <?php } ?>
            
            
                  
         
        </div>
    </section>
    <!-- ***** Awesome Features End ***** -->
   

<?php echo $this->render("themes/site/" . theme_name . "/html/elements/footer.php"); ?>