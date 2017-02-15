@include('layouts.app')
@section('title')
	task list
@endsection
@section('conatin')
	
		<h1>Task List of {{$task->name}}</h1>
		{!!form::model($task,[
		'class'=>'',
		'method'=>'get',
		'route'=>['product.task.show', [$product->slug, $task->slug]]
		])!!}
		@include('tasks/partials/_form',['submit_text'=>'back'])

		{!!form::close()!!}

@endsection