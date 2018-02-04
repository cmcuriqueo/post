<!-- Modal -->
<div class="modal fade" id="myModalNew" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">New Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalEdit">
				<form role="form">
					@include('micropost.partials.form')
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onClick="confirmCreate()">Send</button>
			</div>
		</div>
	  
	</div>
</div>
@section('script')
	<script type="text/javascript">

	  function newPost(){
	    $("#myModalNew").modal();
	  }

	  function confirmCreate(){

			var formData = {"title": $( "#title" ).val(), "body": $( "#body" ).val()};
	        $.ajax({
	            url: "micropost/",
	            method: "POST",
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
	            data: formData
	        }).done(function(result){
	        	$('#myModalNew').modal('hide');
	        	getMicroPost();
	        });
	  }
	</script>
@endsection