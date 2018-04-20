<?php echo $this->render("themes/admin/html/elements/header.php") ?>

<?php $now = new DateTime(); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<link type="text/css" rel="stylesheet" href="<?php echo backoffice_url ?>/libs/jquery-ui/jquery-ui.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.jquery.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.2/chosen.min.css" />


<link href="<?php echo backoffice_url ?>/themes/admin/assets/css/style.css" rel="stylesheet">
        
<script type="text/javascript" src="<?php echo backoffice_url ?>/libs/jquery-ui/jquery-ui.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />


<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.min.css" rel="stylesheet">




<section class="row">
    <h1 style="">Add Content</h1>
    <div class="col-sm-12">
        <section class="row">
            <div class="col-md-12 col-lg-12">
                <form method="post" action="">
                    <input name="course_id" value="<?php echo $this->course_id; ?>" hidden>
                    <input name="chapter_id" value="<?php echo $this->chapter_id; ?>" hidden>
                    <textarea class= "ckeditor" id="editor1" name="content" cols="80" rows="7" ></textarea><br>
                            <div>
                                <button type="submit" id="SubmitButton" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                                <a href="<?php echo _admin_url; ?>/articles?x=<?php echo $this->course_id; ?>&y=<?php echo $this->chapter_id; ?>" class="btn btn-info"><i class="fa fa-chevron-left"></i> Cancel and go Back</a>
                            </div>
                </form>
            </div>
        </section>
    </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>  

<?php echo $this->render("themes/admin/html/elements/footer.php") ?> 
<!-- <script>
    CKEDITOR.replace( 'editor1', {
            height: 400
        } );
</script> -->