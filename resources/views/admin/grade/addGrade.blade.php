@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Add Grade</h3>
            </div>
            <form method="POST" action="{{route("admin.add.grade")}}" class="card-body">
                @csrf
                <div class="form-group">
                    <label>Grade name <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="grade" class="form-control" placeholder="grade name ..." required  value="{{old("ar_desc")}}" />
                    @error('grade')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group d-flex flex-row-reverse">
                    <input type="submit" class="btn btn-success w-25" value="Save">
                </div>
            </form>

            
            <!-- /.card-body -->
        </div>
    @endsection
   
@endsection