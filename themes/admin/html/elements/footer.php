                
                </main> 
            </div>
        </div>

        <!-- Bootstrap core JavaScript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        
                  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="<?php echo backoffice_url ?>/themes/admin/assets/dist/js/bootstrap.min.js"></script>  
        
        <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>  
        <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>  
        <script src="https://cdn.datatables.net/responsive/2.2.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.0/js/responsive.bootstrap4.min.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.5.0/parsley.min.js'></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.5/sweetalert2.all.js"></script>
        <script type="text/javascript" src="<?php echo backoffice_url ?>/libs/parsley-js-validations/parsley.min.js"></script>
        <script type="text/javascript" src="<?php echo backoffice_url ?>/libs/bootstrap-paginator/bootstrap-paginator.js"></script>

        <script type="text/javascript" src="<?php echo backoffice_url ?>/libs/ckeditor4/ckeditor.js"></script> 
        
        <script>
            Parsley.options.errorClass = 'has-danger'
            Parsley.options.successClass = 'has-success'
            Parsley.options.classHandler = function(f) { return f.$element.closest('.form-group'); }
            Parsley.options.errorsWrapper = '<div class="form-control-feedback"></div>'
            Parsley.options.errorTemplate = '<div></div>'
          </script>
        <script>
            $(document).ready(function(){
                $('#DataTable').DataTable({
                     responsive: true,
                     pageLength: 50
                });
            });
        </script>
        <script src="<?php echo backoffice_url ?>/themes/admin/assets/js/custom.js"></script>        
    </body>
</html>
