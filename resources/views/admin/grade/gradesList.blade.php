@extends('admin.master')

@section('main-content')

    @section('content_header')
            <h1>Grades List</h1>
    @endsection
    @section('content')
        <div class="row">
            <div class="card col-12">
                <div class="card-header">
                  <h3 class="card-title">Striped Full Width Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th style="width: 10px">#</th>
                        <th>Grade name</th>
                        <th>Members</th>
                        <th style="width: 40px"></th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($grades as $grade)
                            <tr>
                                <td>{{$loop->index+1}}.</td>
                                <td>{{$grade->grade}}</td>
                                <td>{{$grade->members->count()}}</td>
                                <td class="d-flex flex-row-reverse">
                                    <button data-toggle="modal" data-target="#deleteGrade{{$grade->id}}" class=" btn badge bg-danger cursor-pointer">
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </button>
                                    <!--delete modal -->
                                    <div class="modal fade" id="deleteGrade{{$grade->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Delete grade num : {{$grade->id}}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="text-lg text-danger">
                                                    Be careful, if you delete this grade
                                                    All members with this grade will be deleted 
                                                </p>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <form action="{{route('admin.grade.destroy',['grade'=>$grade->id])}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>

                                        </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="bg-white text-center text-lg font-bold">0 grad founded</td>
                            </tr>                    
                        @endforelse                     
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
        </div>
    @endsection
   
@endsection