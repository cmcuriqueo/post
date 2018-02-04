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
				{!! Form::open(['route' => 'micropost.store', "name" => "createPost"]) !!}

				<div class="form-group">
				{!! Form::text('title', null, ["class" => "form-control", "id" => "title"]) !!}
				</div>

				<div class="form-group">
				{!! Form::textarea('body', null,
				['class'=>'form-control', 'placeholder'=>'Body', "id" => "body"])
				!!}
				</div>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-success" onClick="confirmEdit()">Send</button>
			</div>
		</div>
	  
	</div>
</div>

<script type="text/javascript">
  var postId = null;
  function edit(id){
  		 postId = id;
          $.get( "micropost/" + id, function( data ) {
          	$( "#bodyModal" ).empty()
            $( "#title" ).val(data.title);
            $( "#body" ).val(data.body);
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
            data: formData,
            dataType: 'json'
        }).done(function(result){
        	$('#myModalEdit').modal('hide');
        });
  }

</script>