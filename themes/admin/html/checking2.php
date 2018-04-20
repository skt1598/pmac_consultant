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
    <div class="col-sm-12">
        <section class="row">

            <div class="col-md-12 col-lg-12">
                <h1 style="border-bottom: 0px; margin: 0px; padding-bottom: 4px; text-align: center;">
                    CONTENT
                </h1>
                <h2 style="color:blue; display:inline; float:left; background-color: " >
                    Course : <?php echo $this->course_name;  ?>
                </h2>
                <h3 style="color:green;  display:inline; float:right;">
                    Chapter : <?php echo $this->chapter_name;  ?>
                </h3>
            </div>

            <div class="col-md-12 col-lg-12">
                <a class="btn btn-danger pull-right mt-2" style="margin-top:0px; margin-bottom: 10px; !important;" href="" id="add_art" data-toggle="modal" data-target="#myModal"><b>+</b> Add</a>  
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Page No.</th>
                            <th>Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($this->articles as $article){ $content = str_split($article['content'],50); ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $content[0]; ?></td>                         
                            <td>
                                <div class="btn-group btn-group-sm"> 
                                    <?php if($this->vars[2] == "chapters"){ ?>
                                    <a href="<?php echo _admin_url; ?>/articles/<?php echo $value['course']; ?>/<?php echo $value['id']; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Record Details"><i class="fa fa-list-alt"></i>Pages</a>

                                    <?php } ?>
                                        <?php if($value['submit_by'] !== "user"){ ?>
                                        <a href="<?php echo _admin_url; ?>/edit/<?php echo $this->vars[2]; ?>/rec:<?php echo $id; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record"><i class="fa fa-edit"></i></a> 
                                        <?php } ?>

                                        <a href="<?php echo _admin_url; ?>/detail/<?php echo $this->vars[2]; ?>/rec:<?php echo $id; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Record Details"><i class="fa fa-list-alt"></i></a>
                                    

                                    <?php
                                    if ($this->vars[2] == "admin_users") {
                                        // delete button hide for admin_users if record is equal to superadmin
                                        if ($id !== "1") {
                                            echo '<a href="javascript:void(0);" class="btn btn-danger deletebtn" record_id="' . $id . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record"><i class="fa fa-remove"></i></a>';
                                        }
                                    } else {
                                        
                                            // delete button for all others table 
                                            echo '<a href="javascript:void(0);" class="btn btn-danger deletebtn" record_id="' . $id . '" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record"><i class="fa fa-remove"></i></a>';
                                        
                                        ?>

<?php } ?>

                                        <!-- Add Content Form in Modal -->
                                        <div class="modal fade" id="myModal" role="dialog">
                                            <div class="modal-dialog">
                                            
                                              <!-- Modal content-->
                                              <div class="modal-content">
                                                <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  <h4 class="modal-title">Add Content</h4>
                                                </div>                                                
                                                <div class="modal-body">
                                                    <form action="<?php echo _admin_url; ?>//add_articles.php" method="post">
                                                        <textarea rows=4 cols=10></textarea><br>
                                                        <button type="submit">Add</button>
                                                    </form>
                                                </div>
                                                
                                                <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                              
                                            </div>
                                          </div>
                                </div>
                            </td>                           
                        </tr>
                        <?php $count ++; } ?>
                    </tbody>
                </table>                       

            </div>
        </section>
    </div>
</section>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.4/build/jquery.datetimepicker.full.min.js"></script>
<script>
    $(document).ready( function () {
        $('#table_id').DataTable();
    } );
</script>   
<?php echo $this->render("themes/admin/html/elements/footer.php") ?> 