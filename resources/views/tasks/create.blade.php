@extends('layouts.app')
@section ('title')
task list
@endsection
@section('contain')

	{!! Form::open([
		
		'method'=>'POST',
		'route'=>['projects.tasks.store', $project->slug]
	])
	!!}
			{!! Form::model(new App\Task, ['route' => ['projects.tasks.store']]) !!}
        	@include('tasks/partials/_form', ['submit_text' => 'Add Task'])

	{!!Form::close()!!}

@endsection