<!-- Modal -->
<div class="modal fade" id="myModalDestroy" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">Destroy Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalDestroy">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-warning" onClick="confirmDestroy()">Confirmar</button>
			</div>
		</div> 
	</div>
</div>

<script type="text/javascript">
    var postId = null;
    //se obtiene el recurso
    function destroy(id){
        postId = id;
          $.get( "micropost/" + id, function( data ) {
              $( "#bodyModalDestroy" ).empty();
              $( "#bodyModalDestroy" ).append(
                "<p>you are sure to eliminate: <strong>"+data.title+"</strong>?</p>");
              $("#myModalDestroy").modal(); 
          });
    }

    function confirmDestroy(){
    $.ajax({
	        url: 'micropost/'+postId,
	        type: 'DELETE',
		    headers: {
		        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		    }
      	}).done(function(result) {
            $('#myModalDestroy').modal('hide');
            getMicroPost();
        });
    }
</script>
