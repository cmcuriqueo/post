@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

          <div class="panel panel-default">
            <div class="panel-heading clearfix">

              <h4 class="panel-title pull-left" style="padding-top: 7.5px;">Dashboard MicroPost</h4>
              @if(Auth::check())
                <div class="btn-group pull-right">
                  <button onClick="openNew()" class="btn btn-link">## New Post</button>
                </div>
              @endif
            </div>
            <div class="panel-body">

              <ul class="list-unstyled" id="list-micropost">
                @foreach ($microposts as $post)
                  <li>{{ $post->title }}
                  <button class="btn btn-link" onClick="show({{ $post->id}})">
                    <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show
                  </button>
                  @if(Auth::check())
                    <button class="btn btn-link" onClick="openEdit({{$post->id}})">
                      <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Edit
                    </button>
                    <button class="btn btn-link" onClick="openDestroy({{ $post->id}})">
                      <span class="glyphicon glyphicon-trash" aria-hidden="true"></span> Destroy
                    </button>
                  @endif
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

          @include('micropost.show')

          @if(Auth::check())
            @include('micropost.new')
            @include('micropost.edit')
            @include('micropost.destroy')
          @endif
        </div>
    </div>
</div>

@section('script')
  <script type="text/javascript">
    function getMicroPost(){
            $.get( "micropost/", function( data ) {
              $( "#list-micropost" ).empty();
              $.each( data, function( key, value ) {
              var append = "";
              @if(Auth::check())
                append = "<li>" + value.title +
                  "<button class='btn btn-link' onClick='show(" + value.id + ")'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> Show </button>" +
                  "<button class='btn btn-link' onClick='openEdit("+value.id+")'><span class='glyphicon glyphicon-pencil' aria-hidden='true'></span> Edit </button>"+
                  "<button class='btn btn-link' onClick='openDestroy("+value.id+")'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span> Destroy </button>"+
                  "</li>";
              @else
                append = "<li>" + value.title +
                  "<button class='btn btn-link' onClick='show(" + value.id + ")'><span class='glyphicon glyphicon-eye-open' aria-hidden='true'></span> Show </button>";
              @endif
                $( "#list-micropost" ).append( append );
              });
            });
    }
    
    function openEdit(id){
        edit(id);
    }
    function openDestroy(id){
        destroy(id);
    }
    function openNew(){
        newPost();
    }
  </script>
@endsection