@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Add Meeting</h3>
            </div>
            <form method="POST" action="{{route("admin.add.meetings")}}" class="card-body" enctype="multipart/form-data">
                @csrf
                {{-- Arabic title --}}
                <div class="form-group">
                    <label>Arabic title <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="ar_title" type="text" value="{{old("ar_title")}}" placeholder="..." class="form-control"  required />
                    @error('ar_title')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Arabic Description --}}
                <div class="form-group">
                    <label>Arabic Description </label>
                    <textarea name="ar_description" class="form-control" rows="3" placeholder="...">{{old("ar_description")}}</textarea>
                    @error('ar_description')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- English title  --}}
                <div class="form-group">
                    <label>English title <span class="badge badge-danger text-sm">required</span> </label>
                    <input name="en_title" type="text" value="{{old("en_title")}}" placeholder="..." class="form-control"  required />
                    @error('en_title')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- English Description --}}
                <div class="form-group">
                    <label>English Description </label>
                    <textarea name="en_description" class="form-control" rows="3" placeholder="...">{{old("en_description")}}</textarea>
                    @error('en_description')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- cover --}}
                <div class="form-group">
                    <label>Cover <span class="badge badge-danger text-sm">required</span> </label>
                    <div class="custom-file">
                        <input type="file" name="cover" value="{{old("cover")}}" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose cover</label>
                    </div>
                    @error('cover')
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