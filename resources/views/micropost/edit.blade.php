<!-- Modal -->
<div class="modal fade" id="myModalEdit" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">Edit Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalEdit">
				<form>
					@include('micropost.partials.form')
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onClick="confirmEdit()">Send</button>
			</div>
		</div>
	  
	</div>
</div>
@section('script')
	<script type="text/javascript">
	  var postId = null;
	  function edit(id){
	  		 postId = id;
	          $.get( "micropost/" + id, function( data ) {
	          	$( "#bodyModal" ).empty()
	            $( "#title" ).val(data.title);
	            $( "#body" ).val(data.body);
	            console.log('todo bien')
	            $("#myModalEdit").modal();
	          });
	  }
	  function confirmEdit(e){

			var formData = {"title": $( "#title" ).val(), "body": $( "#body" ).val()};
	        $.ajax({
	            url: "micropost/" + postId,
	            method: "PATCH",
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
	            data: formData
	        }).done(function(result){
	        	$('#myModalEdit').modal('hide');
	        	getMicroPost();
	        });
	  }
	</script>
@endsection