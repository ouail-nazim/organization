@extends('admin.master')

@section('main-content')

    @section('content')
        <div class="card card-success">
            <div class="card-header">
            <h3 class="card-title">Edit Membe num : {{$member->id}}</h3>
            </div>
            <form class="card-body" enctype="multipart/form-data"
                  action="{{route('admin.member.edit',['member'=>$member->id])}}" method="post">
                @csrf
                @method('put')

                {{-- avatar --}}
                <label for="change_avatar">
                    <img src="{{$member->avatar}}" alt="user-avatar" class="img-circle img-fluid my-2" style="width:150px;height: 150px;" >
                    <input onchange="changeAvatar(this)" type="file" name="avatar" id="change_avatar" class="d-none">
                    <input id="avatar_changed" type="hidden" name="avatar_changed" value="false"">
                    @error('avatar')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </label>

                <script type="text/javascript">
                    const changeAvatar=input=>{                
                      const url=URL.createObjectURL(input.files[0]);
                      input.parentElement.querySelector("img").src=url;
                      input.parentElement.querySelector("#avatar_changed").value="true"
                    }
                </script>
                

                {{-- name --}}
                <div class="form-group">
                    <label>Name </label>
                    <input  value="{{old("name")? old("name") :$member->name }}" name="name" type="text" class="form-control" placeholder="member name ..." required  />
                    @error('name')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- email --}}
                <div class="form-group">
                    <label>Email</label>
                    <input  value="{{old("email")? old("email") :$member->email }}" name="email" type="email" class="form-control" placeholder="member email ..." required />
                    @error('email')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- phone --}}
                <div class="form-group">
                    <label>Phone</label>
                    <input  value="{{old("phone")? old("phone") :$member->phone }}" name="phone" type="text" class="form-control" placeholder="member phone ..." required />
                    @error('phone')
                        <div class="my-1 text-danger">
                            <i class="fa fa-exclamation-triangle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                {{-- Grade --}}
                <div class="form-group">
                    <label>Grade</label>
                    <select class="custom-select" name="grade" required>
                        <option @if (!old("grade")) selected @endif disabled>Select grade ...</option>  
                        @foreach ($grades as $grade)
                            <option value="{{$grade->id}}" @if (old("grade") == $grade->id || $member->grade->id == $grade->id ) selected @endif>{{$grade->grade}}</option>    
                        @endforeach   
                    </select>
    
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
           
        </div>
    @endsection
   
@endsection