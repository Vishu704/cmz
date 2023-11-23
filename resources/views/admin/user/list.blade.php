@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Users</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                    <div class="card-header row">
                        <h3 class="card-title col-md-2">Users Table</h3>
                                <form action="" method="get" id="filter_form" class="col-md-8">
                                  <div class="row">
                                      <div class="col-md-4">
                                        <input id="search_key" type="text" name="search_key" value="{{ $search_key }}" placeholder="Search" class="form-control search_key">
                                      </div>
                                  </div>
                                </form> 
                        <a href="adduser" name="create_user" class="btn btn-block btn-outline-secondary btn-lg col-md-2 float-right">+ Add User</a>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Channel Id</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($users as $key => $user)
                            <tr>
                            <td>{{ $users->firstItem() + $key }}</td>
                            <td>{{ $user->name }}</td>
                            <td>Channel - {{ $user->id }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            @if(!empty($user->getRoleNames()))
                              @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                              @endforeach
                            @endif
                            </td>
                            <td><a href="{{ url('edituser/'.$user->id) }}"><i class="fas fa-edit"></i></a> <!--/ 
                              <a class="text-danger" href="{{ url('deleteuser/'.$user->id) }}"><i class="fas fa-trash"></i></a--></td>
                            </tr>
                           @endforeach 
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pagination_d text-right clearfix">
                    {{ $users->appends($_GET)->links() }}
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>            


<script>
    $('#search_key').change(function(){
        $('#filter_form').submit();
    });
</script>



@endsection