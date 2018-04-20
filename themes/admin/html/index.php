<?php echo $this->render("themes/admin/html/elements/header.php") ?>
<link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css'>
<section class="row">
    <div class="col-sm-12">
        <section class="row">

            <div class="col-md-12 col-lg-12">

                <div class="row">
                    <div class="col-md-1 col-lg-1">
                        <h1>Dashboard</h1>
                    </div>
                    <div class="col-md-11 col-lg-11">
                        <form class="form-inline pull-right" method='POST' action="" id="DataSearchForm">
                            <div class="row tofromDates" style="margin-top: -5px; display: none;">
                                <div class="col col-md-4"></div>
                                <div class="col col-md-4">
                                    <div class="form-group" style="margin-right: 0px;">
                                        <label class="text-left" style="margin-right: 0px;">From</label>
                                        <div id="range_from" class="input-group date" data-date-format="yyyy-mm-dd">
                                            <input name="date_range_from" id="range_from_field" class="form-control" value="<?php
                                            if (isset($_SESSION['DateDateRangeFrom'])) {
                                                echo $_SESSION['DateDateRangeFrom'];
                                            }
                                            ?>" type="text" readonly />
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md-4">
                                    <div class="form-group">
                                        <label class="text-left" style="margin-right: 0px;">To</label>
                                        <div id="range_to" class="input-group date" data-date-format="yyyy-mm-dd">
                                            <input name="date_range_to" id="range_to_field" class="form-control" value="<?php
                                            if (isset($_SESSION['DateDateRangeTo'])) {
                                                echo $_SESSION['DateDateRangeTo'];
                                            }
                                            ?>" type="text" readonly />
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group" style="margin-left: 10px; margin-top: 12px;">
                                <label>Show Results by</label>
                                <select name='currentsearchtype' class='form-control selectdatatype' style='min-width: 200px; max-width: 100%; margin-left: 10px; font-size: 16px;'>
                                    <?php foreach ($this->daterangetypes as $type) { ?>
                                        <option <?php
                                        if (isset($_SESSION['CurrentSearchType']) && $_SESSION['CurrentSearchType'] == $type) {
                                            echo 'selected="selected"';
                                        }
                                        ?> value='<?php echo $type; ?>'>
                                                <?php
                                                $typetext = "";
                                                $type = explode("_", $type);

                                                foreach ($type as $t) {
                                                    $typetext[] = ucfirst($t);
                                                }
                                                echo join(" ", $typetext);
                                                ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <a href="javascript:void(0);" style="margin-left: 20px; margin-top: 8px;" id="SearchDataButton" class="btn btn-success">Get Data</a>
                        </form>
                    </div>
                </div>
                <hr>
            </div>

        </section>

    </div>
</section>
<?php echo $this->render("themes/admin/html/elements/footer.php") ?> 
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js'></script>
<script>
    $(document).ready(function(){
        $('#latest_events').DataTable({
             responsive: true,
             order: [[0, "desc"]],
             bLengthChange: false,
             bPaginate: false,
             bInfo: false,
        });
    });
</script>
<script>
    $(document).ready(function () {
        $('#range_from').datepicker();
        $('#range_to').datepicker();

        $(".tofromDates").hide();

<?php if (isset($_SESSION['CurrentSearchType']) && $_SESSION['CurrentSearchType'] == "date_range") { ?>
            $(".tofromDates").show();
<?php } else { ?>
            $(".tofromDates").hide();
<?php } ?>

        $(".selectdatatype").on("change", function () {
            var type = $(this).val();
            if (type === "date_range") {
                $(".tofromDates").show();
            } else {
                $(".tofromDates").hide();
            }
        });

        $("#SearchDataButton").on("click", function () {
            var checkdate_range_val = $(".selectdatatype").val();

            if (checkdate_range_val === "date_range") {
                if ($('#range_from_field').val() === "") {
                    $('#range_from').datepicker("show");
                    return false;
                }
                if ($('#range_to_field').val() === "") {
                    $('#range_to').datepicker("show");
                    return false;
                }
                $("#DataSearchForm").submit();
            } else {
                $("#DataSearchForm").submit();
            }
        });


    });
</script>