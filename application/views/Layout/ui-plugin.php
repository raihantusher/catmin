<!-- CoreUI and necessary plugins-->
<script src="<?php echo base_url("assets/jquery/dist/jquery.min.js");?>"></script>
<script src="<?php echo base_url("assets/popper.js/dist/umd/popper.min.js");?>"></script>
<script src="<?php echo base_url("assets/bootstrap/dist/js/bootstrap.min.js");?>"></script>
<script src="<?php echo base_url("assets/pace-progress/pace.min.js");?>"></script>
<script src="<?php echo base_url("assets/perfect-scrollbar/dist/perfect-scrollbar.min.js");?>"></script>
<script src="<?php echo base_url("assets/@coreui/coreui/dist/js/coreui.min.js");?>"></script>

<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script >
$(document).ready( function () {
    $('#myTable').DataTable({
      "paging": false
    });
} );
</script>

<script src="https://cdn.ckeditor.com/ckeditor5/11.2.0/classic/ckeditor.js"></script>


<script>
                        ClassicEditor
                                .create( document.querySelector( '#editor' ) )
                                .then( editor => {
                                        console.log( editor );
                                } )
                                .catch( error => {
                                        console.error( error );
                                } );
                </script>

<!-- Plugins and scripts required by this view-->
<script src="<?php echo base_url("assets/chart.js/dist/Chart.min.js");?>"></script>
<script src="<?php echo base_url("assets/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js");?>"></script>
<script src="<?php echo base_url("assets/js/main.js");?>"></script>
