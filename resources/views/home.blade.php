@extends('admin.master')

@section('main-content')

    @section('content_header')
        <h1>chahi</h1>
    @endsection

    @section('content')
        <section class="content">
            <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                        <h3>150</h3>
                        <p>Etudiantes</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-user-graduate"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                        <h3>150</h3>
                        <p>Document</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-file"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>
                    <div class="col-lg-4 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                        <h3>20</h3>
                        <p>Brouillon</p>
                        </div>
                        <div class="icon">
                        <i class="fas fa-paperclip"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                    </div>        
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @endsection
   
@endsection