@extends('layouts.app')
@section('title')
	index
	@endsection
@section('contain')
	<h2>Edit Task "{{ $task->name }}"</h2>
 
    {!! Form::model($task, [
    'method' => 'PATCH',
     'route' => ['projects.tasks.update', $project->slug, $task->slug]]) !!}
 <div class="form-group">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name') !!}
</div>
 
<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug') !!}
</div>
 
<div class="form-group">
    {!! Form::label('completed', 'Completed:') !!}
    {!! Form::checkbox('completed') !!}
</div>
 
<div class="form-group">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description') !!}
</div>
 
<div class="form-group">
    {!! Form::submit('Task Edit') !!}
</div>
    {!! Form::close() !!}
@endsection
