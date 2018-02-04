<div class="form-group">
{!! Form::text('title', null, ["class" => "form-control", 'placeholder'=>'Title', "id" => "title"]) !!}
</div>

<div class="form-group">
{!! Form::textarea('body', null,
	['class'=>'form-control', 'placeholder'=>'Body', "id" => "body"])
!!}