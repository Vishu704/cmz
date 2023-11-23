@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>User Types</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User Types</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">User Types</h3>
                        <a href="addusertype" name="create_user" class="btn btn-block btn-outline-secondary btn-lg col-md-2 float-right">+ Add User Type</a>
                    </div>
                    <div class="card-header">
                          @if ($errors->any())
                              <div class="alert alert-danger">
                                  <ul>
                                      @foreach ($errors->all() as $error)
                                          <li>{{ $error }}</li>
                                      @endforeach
                                  </ul>
                              </div>
                          @endif


                          @if(session()->has('message'))
                              <div class="alert alert-success text-center">
                                  {{ session()->get('message') }}
                              </div>
                          @endif

                          @if(session()->has('error'))
                              <div class="alert alert-danger text-center">
                                  {{ session()->get('error') }}
                              </div>
                          @endif

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th style="width:200px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($usertypes as $key => $usertype)
                              <tr>
                              <td>{{ $usertypes->firstItem() + $key }}</td>
                              <td>{{ $usertype->designation }}</td>
                              <td><span class="text-capitalize {{ ($usertype->status=='active') ? 'btn btn-success' : 'btn btn-danger' }}">{{ $usertype->status }}</td>
                              <td><a href="{{ url('editusertype/'.$usertype->id) }}"><i class="fas fa-edit"></i> Edit</a> / 
                              <a class="text-danger" href="{{ url('deleteusertype/'.$usertype->id) }}"><i class="fas fa-trash"></i> Delete</a>
                              </td>
                              </tr>
                            @endforeach
                            
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix pagination_d text-right">
                        {{ $usertypes->appends($_GET)->links() }}
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>            

@endsection