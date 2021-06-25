@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Add Membe</h3>
            </div>
            <form method="POST" action="{{route("admin.add.member")}}" class="card-body" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Name <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="name" type="text" class="form-control" placeholder="member name ..." required  value="{{old("name")}}" />
                    @error('name')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Email <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="email" type="email" value="{{old("email")}}" placeholder="member email ..." class="form-control"  required />
                    @error('email')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Phone <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="phone" type="text" value="{{old("phone")}}" placeholder="member phone ..." class="form-control"  required />
                    @error('phone')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Grade <span class="badge badge-danger text-sm">required</span> </label>
                    <select class="custom-select" name="grade" required>
                        <option @if (!old("grade")) selected @endif disabled>Select grade ...</option>  
                        @foreach ($grades as $grade)
                            <option value="{{$grade->id}}" @if (old("grade") == $grade->id) selected @endif>{{$grade->grade}}</option>    
                        @endforeach   
                    </select>
    
                    @error('grade')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label>Avatar <span class="badge badge-danger text-sm">required</span> </label>
                    <div class="custom-file">
                        <input type="file" name="avatar" value="{{old("avatar")}}" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>

                    @error('avatar')
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