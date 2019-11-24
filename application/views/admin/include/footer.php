		<script src="//code.jquery.com/jquery.js"></script>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
		<script src="<?php echo base_url() . 'ckeditor/ckeditor.js'; ?>"></script>
		<script>
        	CKEDITOR.replace( 'ckeditor' );
    	</script>
    	<script>
			$(function() {
				$( "#datepicker" ).datepicker({ dateFormat: "yy-mm-dd" });
				$( "#sortable" ).sortable({
					update: function( event, ui )
					{
						var order = $(this).sortable( "toArray" );
						$.ajax({
							type: "POST",
							url: "<?php echo base_url(); ?>admin/pages/ajax",
							data: { items: order },
							success: function(msg)
							{
								// $( "#text" ).html(msg);
							}
						});
					},
					items: "tbody > tr",
					axis: "y" 
				});
				$( "#sortable" ).disableSelection();
			});
		</script>
	</body>
	
</html>