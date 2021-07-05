@extends('admin.master')

@section('main-content')

    @section('content')
    <div class="row">
        @if ($errors->any())
            <div class=" col-12 alert alert-danger">        
                @foreach ($errors->all() as $error)
                    <p class="d-flex">
                        {{$error}}
                    </p>
                @endforeach
            </div>
        @endif

        

        <div class="col-12">
          <div class="card card-success ">
            <div class="card-header">
              <h3 class="card-title"><i class="fa fa-cogs mr-2"></i> Setting</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body p-0">
              <div class="p-4 d-flex flex-row ">
                <div class="text-left mb-5 relative d-flex flex-col">
                  <label for="change_logo"><img src="{{setting('logo_cover')}}" alt="logo cover" class="profile-user-img img-fluid img-circle" style="width: 200px;height: 200px;" ></label>
                  <form action="{{route("admin.update.logo_cover")}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="change_logo" class="btn btn-secondary ">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                      <input onchange="change_cover(this)" type="file" id="change_logo" name="logo_cover" class="d-none"  accept=".jpg , .jpeg , .png , .svg">
                    </label>
                    <div class="btns d-none" id="change_logo_btns">
                      <button type="submit" class="btn btn-primary mx-2">save</button>
                      <button type="button" onClick="document.location.reload(true)" class="btn btn-secondary  mx-2">cancel</button>
                    </div>
                  </form>
                  
                </div>
                
                <div class="text-left mb-5 relative d-flex flex-col">
                  <label for="boss_avatar"><img src="{{setting('boss_avatar')}}" alt="logo cover" class="profile-user-img img-fluid img-circle" style="width: 200px;height: 200px;" ></label>
                  <form action="{{route("admin.update.boss_avatar")}}" method="post" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <label for="boss_avatar" class="btn btn-secondary ">
                      <i class="fa fa-camera" aria-hidden="true"></i>
                      <input onchange="bossAvatar(this)" type="file" id="boss_avatar" name="boss_avatar" class="d-none"  accept=".jpg , .jpeg , .png , .svg">
                    </label>
                    <div class="btns d-none" id="boss_avatar_btns">
                      <button type="submit" class="btn btn-primary mx-2">save</button>
                      <button type="button" onClick="document.location.reload(true)" class="btn btn-secondary  mx-2">cancel</button>
                    </div>
                  </form>
                  
                </div>
              </div>
              <table class="table">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Key</th>
                    <th>Value</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($settings as $item)
                      @if ($item->key != 'logo_cover')
                        <form action="{{route('admin.setting.edit',['id'=>$item->id])}}" method="POST">
                            @method('PUT')
                            @csrf
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->key}}</td>
                                <td>
                                    <input type="text" name="value" class="form-control" value="{{$item->value}}" readonly >
                                </td>
                                <td class="text-right py-0 align-middle">
                                <div class="">
                                    <button type="button" onclick="edit(this)" class="btn btn-info rounded-md"><i class="fas fa-edit"></i></button>
                                    <button type="submit" class="btn btn-success rounded-md" style="display: none;"> save </button>
                                </div>
                                </td>
                            </tr>
                        </form>
                      @endif
                    @endforeach     
                </tbody>
              </table>
            </div>

            <script type="text/javascript">
                const edit=btn=>{
                    btn.parentElement.parentElement.parentElement.querySelector('input').readOnly=false
                    btn.nextElementSibling.style.display=""
                    btn.style.display="none"
                }
                const change_cover=input=>{
                  debugger
                  input.parentElement.classList.add('d-none');
                  document.getElementById("change_logo_btns").classList.add('d-flex')
                  const url=URL.createObjectURL(input.files[0]);
                  const img=input.parentElement.parentElement.parentElement.querySelector("img");
                  img.src=url
                }
                function bossAvatar(input) {
                  input.parentElement.classList.add('d-none');                  
                  document.getElementById("boss_avatar_btns").classList.add('d-flex')
                  const url=URL.createObjectURL(input.files[0]);
                  const img=input.parentElement.parentElement.parentElement.querySelector("img");
                  img.src=url
                }
            </script>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
    @endsection
   
@endsection