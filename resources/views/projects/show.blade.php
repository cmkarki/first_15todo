@extends('layouts.app')
@section ('title')
task list
@endsection
 
@section('contain')
    <h2>{{ $project->name }}</h2>
 
    @if ( !$project->tasks->count() )
        Your project has no tasks.
    @else
        <ul>
            @foreach( $project->tasks as $task )
            {!!Form::open([
                'class'=>'form-inline',
                'method'=>'DELETE',
                'route'=>['projects.tasks.destroy', $project->slug, $task->slug]
                        ])
            !!} 
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#{{$task->id}}">
                {{ $task->name }} 
                </button>
                <div class="modal fade" id="{{$task->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                            </div>
                            <div class="modal-body">
                                    
                                        
                                        
                                            
                                            
                                            @if($task->completed==1)

                                                Completed
                                            @else

                                                Not Completed
                                            @endif
                                            <br>
                                            {{$task->description}}
                                            
                                            

                                      
                            </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                   
                            </div>
                        </div>
                    </div>
                </div>
                          
                {!! link_to_route('projects.tasks.edit', 'Edit', [$project->slug, $task->slug], ['class' => 'btn btn-info']
                                                 ) 
                !!}
 
                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        
                {!!Form::close()!!}
            
            @endforeach
        </ul>
    @endif
    <br>

    {!! link_to_route('projects.tasks.create', 'Add task', $project->slug)!!}

@endsection

