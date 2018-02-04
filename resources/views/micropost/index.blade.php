
<ul class="list-unstyled">
  @foreach ($microposts as $post)
    <li>{{ $post->title }}
    <button class="btn btn-link" onClick="show({{ $post->id}})">
      <span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span> Show
    </button>
    @if(Auth::user() && Auth::id() == $post->user_id)
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

@include('micropost.show')
@include('micropost.edit')
@include('micropost.destroy')

<script type="text/javascript">
  function openEdit(id){
      edit(id);
  }
  function openDestroy(id){
      destroy(id);
  }

</script>