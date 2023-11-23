
@extends('admin.common.template')

@section('content')

<style>
.pagination_d svg{
    width:15px;
}

.flex.justify-between.flex-1{
    display:none;
}
</style>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>

            



          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


            {{-- @if(session()->has('message'))
                <div class="alert alert-success text-center">
                    {{ session()->get('message') }}
                </div>
            @endif --}}
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->




    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                               
                                 
                             
                        
                    </div>
                                
                    <!-- /.card-header -->
                    <div class="card-body" style="overflow-x: scroll;">
                        
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix pagination_d text-right">
                       
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>





</div>


<script src="{{ asset('js/dashboard.js') }}"></script>

  @endsection

