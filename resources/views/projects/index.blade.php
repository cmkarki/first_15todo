@extends('layouts.app')
@section('title')
	index
	@endsection
@section('contain')
   
    <h2>Projects</h2>
 
    @if ( !$projects->count() )
        You have no projects
    @else
        <ul>
            @foreach( $projects as $project )

                
                    {!! Form::open([
                    'class' => 'form-inline', 
                    'method' => 'DELETE', 
                    'route' =>['projects.destroy', $project->slug
                    			]
                    			]) 
                    !!}
                        <a href="{{ route('projects.show', $project->slug) }}">{{ $project->name }}</a>

                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                              <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_{{ $project->id }}" aria-expanded="false" aria-controls="collapseOne">
                                  view {{$project->name}}
                                </a>
                              </h4>
                            </div>
                            <div id="collapse_{{ $project->id }}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                              About Project {{$project->name}}
                                
                              
                            </div>
                          </div>
                        </div>
                        
                           <!-- {!! link_to_route('projects.edit', 'Edit', [$project->slug], ['class' => 'btn btn-info'])!!}-->

                           <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
                                    edit
                            </button>
                                <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                          <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                              <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                              </div>
                                              <div class="modal-body">
                                                    <h2>Edit Project</h2>
                                                         
                                                            {!! Form::model($project, [
                                                            'method' => 'PATCH',
                                                             'route' => ['projects.update', $project->slug]
                                                             ]) 
                                                             !!}
                                                                @include('projects/partials/_form',['submit_text' => 'Edit Project'])
                                                            {!! Form::close() !!}
                                              </div>
                                              <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary">Save changes</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>

                            {!! Form::submit('Delete', array('class' => 'btn btn-danger')) !!}
                        
                    {!! Form::close() !!}
                
            @endforeach
        </ul>
    @endif
 
    <p>
        {!! link_to_route('projects.create', 'Create Project') !!}
    </p>

   

    
@endsection

