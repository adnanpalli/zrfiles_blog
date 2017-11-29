@extends('main')
@section('title','| Edit Blog Post')

@section('stylesheets')
	{!! Html::style('css/select2.min.css') !!}
	<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
 	
  	<script>tinymce.init({ selector:'textarea',
  		menubar : false

  	 });</script>
@endsection

@section('content')
	<div class="row">
	
		
		<div class="col-md-8">
		
		{!! Form::model($post, ['route' => ['posts.update', $post->id], 'method' => 'PUT','files'=>true]) !!}
		{{ Form::label('title','Title :')}}
		{{ Form::text('title',null,["class"=>'form-control input-lg form-spacing-top'])}}
		
		{{ Form::label('slug','Slug :')}}
		{{ Form::text('slug',null,["class"=>'form-control input-lg form-spacing-top' ])}}
		
		{{ Form::label('category_id', 'category:',['class'=>'form-spacing-top']) }}
		{{ Form::select('category_id',$categories,null,['class'=>'form-control']) }}	
		
		{{ Form::label('tags','Tags',['class'=>'form-spacing-top']) }}
		<!--{{ Form::select('tags[]',$tags,null,['class'=>'select2-multi form-control','multiple' => 'multiple']) }} -->
		{{ Form::select('tags[]', $tags, $post->tags->pluck('id')->toArray(), ['class' => 'form-control select2' , 'multiple' => 'multiple']) }}
		
		{{ Form::label('featured_img', 'Upload a Featured Image') }}
				{{ Form::file('featured_img') }}	

		{{ Form::label('body','Body :',["class"=>'form-spacing-top'])}}
		{{ Form::textarea('body',null,["class"=>'form-control'])}}
		</div>
		<div class="col-md-4">
			<div class="well">
				<dl class="dl-horizontal">
					<dt>Created At: </dt>
					<dd>{{ date('M j, Y h:ia ',strtotime($post->created_at)) }}</dd>
				</dl>
				<dl class="dl-horizontal">
					<dt>Last updated:</dt>
					<dd>{{ date('M j, Y h:ia',strtotime($post->updated_at)) }}</dd>
				</dl>	
				<hr>
				<div class="row form-spacing-top">
					<div class="col-sm-6">
					{!! Html::linkRoute('posts.show','Cancel',array($post->id),array('class'=>'btn btn-danger btn-block')) !!}
					
					</div>
					<div class="col-sm-6">
						{{ Form::submit('Save Changes', ['class' => 'btn btn-success btn-block']) }}
					</div>
				</div>
			</div>
		</div>
	{!! Form::close() !!}
</div><!--end of form -->
@stop

@section('scripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}
			<script type="text/javascript">
	
	  $(".select2-multi").select2();
	//$(".select2-multi").select2().val({{ json_encode($post->tags()->allRelatedIds()) }}.trigger('change');	
	</script>


@endsection