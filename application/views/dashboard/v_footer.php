<footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>SI</b> TRIFFBOOK
            </div>
            <strong>TRIFFBOOK</strong> . All rights reserved.
        </footer>
    </div>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jqueryui.min.js"></script>
    <script>
    $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/raphael/raphael.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/morris.js/morris.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jquerysparkline/dist/jquery.sparkline.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap1.2.2.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/jvectormap/jquery-jvectormap-world-millen.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jqueryknob/dist/jquery.knob.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/moment/min/moment.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/bootstrapdaterangepicker/daterangepicker.js"></script>
    <script
        src="<?php echo base_url(); ?>assets/bower_components/bootstrapdatepicker/dist/js/bootstrap-datepicker.min.js">
    </script>
    <script src="<?php echo base_url(); ?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/jqueryslimscroll/jquery.slimscroll.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
    <script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
    <script src="<?php echo base_url() ?>assets/bower_components/ckeditor/ckeditor.js"></script>
    <script>
        $(function () {
        CKEDITOR.replace('editor')
    });
    </script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            responsive: true
        } );
     
        new $.fn.dataTable.FixedHeader( table );
    });
    $(document).ready(function() {
        var table = $('#example2').DataTable( {
            responsive: true
        } );
     
        new $.fn.dataTable.FixedHeader( table );
    });
    $(document).ready(function() {
        var table = $('#example3').DataTable( {
            responsive: true
        } );
     
        new $.fn.dataTable.FixedHeader( table );
    });
</script>

</body>
<script>
function sum() {
	const idName = event.target.id;
	const id = idName.split('-')[1];
	
	var txtFirstNumberValue = document.getElementById(`harga-${id}`).value;
	var txtSecondNumberValue = document.getElementById(`pcs-${id}`).value;

	var stok = document.getElementById(`stok-${id}`).value;

	if (parseInt(txtSecondNumberValue) > parseInt(stok)) {
		console.log(txtSecondNumberValue, stok);
		return document.getElementById(`pcs-${id}`).value = 0;
	}

	var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);

	if (!isNaN(result)) {
		document.getElementById('totalharga-' + id).value = result;
	} else {
		document.getElementById('totalharga-' + id).value = 0;
	}

	const elementAll = document.querySelectorAll('.sum');
	
	let total = 0;
	elementAll.forEach(element => {
		total += parseInt(element.value);
	});

	document.getElementById('txt4').value = total;
}
</script>
<script>
function sum2() {
      var txtFirstNumberValue = document.getElementById('saldo').value;
      var txtSecondNumberValue = document.getElementById('cash').value;
      var txttirhtNumberValue = document.getElementById('total').value;
      var result = parseInt(txtFirstNumberValue) + parseInt(txtSecondNumberValue) - parseInt(txttirhtNumberValue);
      if (!isNaN(result)) {
         document.getElementById('kembali').value = result;
      }
}

</script>

</html>
