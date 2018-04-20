<?php echo $this->render("themes/admin/html/elements/header.php") ?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">
<style>
    .help-block {
        color: #a94442;
    }
    .parsley-required{
        color: #a94442;
    }
    .has-error .form-control {
        border-color: #a94442;
        box-shadow: inset 0 1px 1px rgba(0,0,0,.075);
    }
</style>
<section class="row">
    <div class="col-sm-12">
        <section class="row">

            <div class="col-md-12 col-lg-12">
                <h1 style='border-bottom: 0px; margin: 0px; padding-bottom: 4px;'>
                    Change Password
                </h1>
                <p class="hidden-sm-down" style='margin:0px;'>Manage your website settings &nbsp;</p>
                <hr>
            </div>
            
            <div class="col-12 col-md-12 col-lg-12">

                <?php if ($this->errors) { ?>
                    <div class="alert alert-danger">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        foreach ($this->errors as $msg) {
                            echo "<li style='list-style:circle'>" . $msg . "</li>";
                        }
                        ?>
                    </div>
<?php } ?>
                    <?php if ($this->success) { ?>
                    <div class="alert alert-success">
                        <a class="close" data-dismiss="alert" href="#">&times;</a>
                        <?php
                        foreach ($this->success as $msg) {
                            echo "<li style='list-style:circle'>" . $msg . "</li>";
                        }
                        ?>
                    </div>
<?php } ?>
                    <form class="form-horizontal col-lg-8" action="<?php echo _admin_url; ?>/change_password" method="post" role="form" id='SignupForm' data-validate="parsley">
                        <div class="form-group">
                            <label for="inputEmail1" class="col-lg-6 control-label">Old Password</label>
                            <div class="col-lg-6">
                                <input type="password" data-parsley-required class="form-control" name="data[old_password]" id="old_password" data-required="true" />
                            </div>
                        </div>    <div class="form-group">
                            <label for="inputEmail1" class="col-lg-6 control-label">New Password</label>
                            <div class="col-lg-6">
                                <input type="password" data-parsley-minlength="6" data-parsley-required class="form-control"  name="data[new_password]" id="new_password" data-required="true" />
                            </div>
                        </div>    <div class="form-group">
                            <label for="inputEmail1" class="col-lg-6 control-label">Repeat Password</label>
                            <div class="col-lg-6">
                                <input type="password" data-parsley-minlength="6" data-parsley-equalto="#new_password" data-parsley-required class="form-control" name="data[repeat_password]" id="repeat_password" data-required="true" data-equalto="#new_password" />
                            </div>
                        </div>    
                        <br>
                        <div class="form-group" >
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Save Password</button>
                            </div>
                        </div> 
                    </form>
                
            </div>
            
        </section>
        </div>
</section>

<?php echo $this->render("themes/admin/html/elements/footer.php") ?> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.1.2/parsley.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>
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