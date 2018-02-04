<!-- Modal -->
<div class="modal fade" id="myModalNew" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" onClick="closeModalNew()">&times;</button>
				<h4 class="modal-title"><h3 id="titleModal">New Post</h3></h4>
			</div>
			<div class="modal-body" id="bodyModalNew">
				<div class="alert alert-danger" role="alert" style="visibility: hidden" id="errorsNewPost"></div>
				<form role="form">
					@include('micropost.partials.form')
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" onClick="closeModalNew()">Close</button>
				<button type="button" class="btn btn-success" onClick="confirmCreate()">Send</button>
			</div>
		</div>
	  
	</div>
</div>

<script type="text/javascript">
    // se eliminan los mesajes de errores del formulario
    function clearNew(){
      $("#errorsNewPost").empty();
      $('#errorsNewPost').css('visibility', 'hidden');
      //se cambian las clases de los input
      $('#bodyModalNew').find('div[name="form-group-title"]').
        removeClass().addClass("form-group has-success has-feedback");
      $('#bodyModalNew').find('div[name="form-group-body"]').
        removeClass().addClass("form-group has-success has-feedback");
    }
    //cierra el modal
    function closeModalNew(){
      clearNew();
      $('#myModalNew').modal('hide');
    }
    function confirmCreate(){
      // se obtiene los datos de los inputs
      var formData = {
          "title": $('#bodyModalNew').find('input[name="title"]').val(), 
          "body": $('#bodyModalNew').find('textarea[name="body"]').val()};
      $.ajax({
          url: "micropost/",
          method: "POST",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: formData
      }).done(function(result){

        $("#errorsNewPost").empty();

        $('#bodyModalNew').find('input[name="title"]').val("")
        $('#bodyModalNew').find('textarea[name="body"]').val("")

        clearNew();

        $('#myModalNew').modal('hide');// se cierra el modal
        getMicroPost();

      }).fail(function( jqXHR, textStatus, errorThrown ) {
        if ( console && console.log ) {
          console.log( "La solicitud a fallado: " +  textStatus);
        }
        clearNew();
        //se agregan los mensajes al contenedor de errores
        $("#errorsNewPost").append("<label>"+jqXHR.responseJSON.message+"</label>");
        $("#errorsNewPost").append("<ul>");
        $.each( jqXHR.responseJSON.errors, function( key, value ) {
          $("#errorsNewPost").append("<li>"+ value[0] +"</li>");
          //se cambia las clases de los correspondientes input para indicar cuales poseen errores
          $('#bodyModalNew').find('div[name="form-group-'+key+'"]').
            removeClass().addClass("form-group has-error has-feedback");
        });
        $("#errorsNewPost").append("</ul>");
        $('#errorsNewPost').css('visibility', 'visible');// se muestra el contenedor de errores
      });
    }
</script>