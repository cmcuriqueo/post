<!-- Modal -->
<div class="modal fade" id="myModalEdit" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="closeModalEdit()">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">Edit Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalEdit">
				<div class="alert alert-danger" role="alert" style="visibility: hidden" id="errorsEditPost"></div>
				<form role="form">
					@include('micropost.partials.form')
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="closeModalEdit()">Close</button>
				<button type="button" class="btn btn-success" onClick="confirmEdit()">Send</button>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
    var postId = null;
    //obtenemos el recurso
    function edit(id){
         postId = id;
            $.get( "micropost/" + id, function( data ) {
              $('#bodyModalEdit').find('input[name="title"]').val(data.title);
              $('#bodyModalEdit').find('textarea[name="body"]').val(data.body);

              console.log($( "#titleInput" ))
              //Se muestra el modal
              $("#myModalEdit").modal();
            });
    }
    //restablecemos en formulario
    function clearEdit(){
		$("#errorsEditPost").empty();//se vacia el contenedor de erorres
		$('#errorsEditPost').css('visibility', 'hidden');//se oculta el contenedor de erorres
		//se restablecen clases
		$('#bodyModalEdit').find('div[name="form-group-title"]').
			removeClass().addClass("form-group has-success has-feedback");
		$('#bodyModalEdit').find('div[name="form-group-body"]').
			removeClass().addClass("form-group has-success has-feedback");

    }
    function closeModalEdit(){
    	clearEdit();
    	$('#myModalEdit').modal('hide');//se cierra el modal
    }
    function confirmEdit(e){
    		// se obtienen los valores de los inputs
	      var formData = {
					"title": $('#bodyModalEdit').find('input[name="title"]').val(),
					"body": $('#bodyModalEdit').find('textarea[name="body"]').val()};
          $.ajax({
				url: "micropost/" + postId,
				method: "PATCH",
				headers: {
				    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				data: formData
          }).done(function(result){
            $("#errorsEditPost").empty();
	            closeModalEdit();
	            //se vacian los inputs
	            $('#bodyModalEdit').find('input[name="title"]').val("")
	            $('#bodyModalEdit').find('textarea[name="body"]').val("")
	            //se recarga la lista 
	            getMicroPost();
          }).fail(function( jqXHR, textStatus, errorThrown ) {
				if ( console && console.log ) {
					console.log( "La solicitud a fallado: " +  textStatus);
				}
				$("#errorsEditPost").empty();
				//se agregan los mensajes al contenedor de errores
				$("#errorsEditPost").append("<label>"+jqXHR.responseJSON.message+"</label>");
				$("#errorsEditPost").append("<ul>");
				$.each( jqXHR.responseJSON.errors, function( key, value ) {
					$("#errorsEditPost").append("<li>"+ value[0] +"</li>");
					//se cambia las clases de los correspondientes input para indicar cuales poseen errores
					$('#bodyModalEdit').find('div[name="form-group-'+key+'"]').
					removeClass().addClass("form-group has-error has-feedback");
				});
				$("#errorsEditPost").append("</ul>");
				// se muestra el contenedor de errores
				$('#errorsEditPost').css('visibility', 'visible');
          });
    }
</script>