<!-- Modal -->
<div class="modal fade" id="myModalShow" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">Show Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalShow">

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	  
	</div>
</div>
@section('script')
	<script type="text/javascript">
	  function show(id){
	          $.get( "micropost/" + id, function( data ) {
	          	$( "#bodyModalShow" ).empty();
	            $( "#bodyModalShow" ).append( "<h4 style='text-align: center'>"+data.title+"</h4>" );
	            $( "#bodyModalShow" ).append( "<p style='text-align: center'>"+data.title+"</p>" );
	            $("#myModalShow").modal();
	          });
	           
	  }
	</script>
@endsection