@extends('admin.master')

@section('main-content')

    @section('content_header')
            <h1>Goal List</h1>
    @endsection
    @section('content')
        <div class="row">
            {{-- arabic --}}
            <div class="col-md-6 col-12">
                <div class="card card-default">
                <div class="card-header">
                    <h3 class="card-title">
                    <i class="fas fa-bullseye"></i>
                    Arabic Goals
                    </h3>
                </div>
                <div class="card-body">
                    @foreach ($goals as $goal)
                        @if($goal->lang == "ar") 
                            <div class="callout callout-success">
                                <div class="d-flex flex-row-reverse">
                                    <!-- delete -->
                                    <span class="text-danger mx-2 cursor-pointer" data-toggle="modal" data-target="#deleteGoal{{$goal->id}}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                    {{-- edit --}}
                                    <span class="text-info mx-2 cursor-pointer" data-toggle="modal" data-target="#editGoal{{$goal->id}}">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <!-- delete Modal -->
                                    <div class="modal fade " id="deleteGoal{{$goal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete goal num : {{$goal->id}} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$goal->description}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{route('admin.goal.destroy',['goal'=>$goal->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- edit Modal -->
                                    <div class="modal fade " id="editGoal{{$goal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <form method="POST" action="{{route("admin.goal.edit")}}" class="modal-content">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" name="lang" value="{{$goal->lang}}">
                                            <input type="hidden" name="goal_id" value="{{$goal->id}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit goal num : {{$goal->id}} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea name="description" class="form-control" rows="8" placeholder="..." required>
                                                    {{$goal->description}}
                                                </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Edit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                
                                <p>{{$goal->description}}</p>
                            </div>
                        @endif
                    @endforeach
                
                </div>
                </div>
            </div>
            {{-- english --}}
            <div class="col-md-6 col-12">
                <div class="card card-default">
                    <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-bullseye"></i>
                        English Goals
                    </h3>
                    </div>
                    <div class="card-body">
                    @foreach ($goals as $goal)
                        @if($goal->lang == "en") 
                            <div class="callout callout-info">
                                <div class="d-flex flex-row-reverse">
                                    <!-- delete -->
                                    <span class="text-danger mx-2 cursor-pointer" data-toggle="modal" data-target="#deleteGoal{{$goal->id}}">
                                        <i class="fa fa-trash"></i>
                                    </span>
                                    {{-- edit --}}
                                    <span class="text-info mx-2 cursor-pointer" data-toggle="modal" data-target="#editGoal{{$goal->id}}">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <!-- delete Modal -->
                                    <div class="modal fade " id="deleteGoal{{$goal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete goal num : {{$goal->id}} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                {{$goal->description}}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form action="{{route('admin.goal.destroy',['goal'=>$goal->id])}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                                
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- edit Modal -->
                                    <div class="modal fade " id="editGoal{{$goal->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <form method="POST" action="{{route("admin.goal.edit")}}" class="modal-content">
                                            @method('put')
                                            @csrf
                                            <input type="hidden" name="lang" value="{{$goal->lang}}">
                                            <input type="hidden" name="goal_id" value="{{$goal->id}}">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit goal num : {{$goal->id}} </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <textarea name="description" class="form-control" rows="8" placeholder="..." required>
                                                    {{$goal->description}}
                                                </textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-info">Edit</button>
                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                
                                <p>{{$goal->description}}</p>
                            </div>
                        @endif
                    @endforeach
                    
                    </div>
                </div>
            </div>
        </div>
    @endsection
   
@endsection