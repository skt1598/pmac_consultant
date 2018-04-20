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
                <a class="btn btn-danger pull-right mt-2" style="margin-top:0px; margin-bottom: 10px; !important;" href="<?php echo _admin_url; ?>/add_articles?attr1=<?php echo $_GET['x']; ?>&attr2=<?php echo $_GET['y']; ?>"><b>+</b> Add</a>  
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Page No.</th>
                            <th >Content</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1; foreach($this->articles as $article){ $content = str_split($article['content'],50); ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td style="width"><?php echo $content[0]; ?></td>                         
                            <td>
                                <div class="btn-group btn-group-sm"> 
                                        <a href="<?php echo _admin_url; ?>/edit/articles/rec:<?php echo $article['id']; ?>&p=<?php echo $count; ?>&co=<?php echo $article['course']; ?>&ch=<?php echo $article['chapter']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Record"><i class="fa fa-edit"></i></a> 

                                        <a href="<?php echo _admin_url; ?>/detail_articles/articles/rec:<?php echo $article['id']; ?>&p=<?php echo $count; ?>&co=<?php echo $article['course']; ?>&ch=<?php echo $article['chapter']; ?>" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="" data-original-title="Record Details"><i class="fa fa-list-alt"></i></a>
                                        <a href="javascript:void(0);" class="btn btn-danger deletebtn" record_id="<?php echo $article['id']; ?>" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete Record"><i class="fa fa-remove"></i></a>
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



<?php echo $this->render("themes/admin/html/elements/footer.php") ?> 
<script>
    $(document).ready( function () {
        $('#table_id').DataTable({
            columns: [
             { width: '20%' },
             { width: '70%' },
             { width: '10%' }
            ]
        });
        $(".deletebtn").on('click', function () {
            var record_ids = $(this).attr('record_id');
            var table_name = "articles";
            $(".contentloader").show();
            var alertconfirm = confirm("Are you sure you want to delete this record?");
            if (alertconfirm) {
                $.post('<?php echo _admin_url; ?>/common/actions', {method: "deletearecord", table: table_name, records: record_ids}, function (data) {
                    if (data == 1) {
                        //alert("Record was succesfully deleted!");
                        $("#myTable #row_" + record_ids + " td").css("background-color", "#f2dede");
                        $("#myTable #row_" + record_ids + " td").css("border", "1px solid #eed3d7");
                        $("#myTable #row_" + record_ids).fadeOut(900);
                        $(".contentloader").hide();
                        location.reload();
                    } else {
                        alert("Record was not deleted. Please check again!");
                        $(".contentloader").hide();
                    }
                });
            }
            else {
                $(".contentloader").hide();
                return false;
            }
        });
    });

</script>