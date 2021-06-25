@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Add Goal</h3>
            </div>
            <form method="POST" action="{{route("admin.add.goal")}}" class="card-body">
                @csrf
                <div class="form-group">
                    <label>Arabic Description <span class="badge badge-danger text-sm">required</span> </label>
                    <textarea name="ar_desc" class="form-control" rows="3" placeholder="..." required>{{old("ar_desc")}}</textarea>
                    @error('ar_desc')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>English Description </label>
                    <textarea name="en_desc" class="form-control" rows="3" placeholder="...">{{old("en_desc")}}</textarea>
                    @error('en_desc')
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