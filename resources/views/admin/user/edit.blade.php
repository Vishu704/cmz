@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Admin Settings</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Admin Settings</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            
               
          <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Admin Settings</h3>
                </div>
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
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ url('updateuser/'.$user_detail->id) }}" method="post">
                {{ csrf_field() }}
                
                  <div class="card-body">
                  <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="name">Full Name</label>
                      <input type="text" name="name" value="{{ $user_detail->name }}" class="form-control" id="name" placeholder="Enter full name" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email Address</label>
                      <input type="email" name="email" value="{{ $user_detail->email }}" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" name="phone" value="{{ $user_detail->phone }}" class="form-control" id="phone" placeholder="Enter phone" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" name="address" value="{{ $user_detail->address }}" class="form-control" id="address" placeholder="Enter address" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" value="" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                  </div>

                  

                  <!--div class="col-md-6">
                    <div class="form-group">
                      <label for="role">User Type</label>
                      <select class="form-control" id="usertype" name="role" required>
                        <option value="">--Select User Type--</option>
                        @foreach($roles as $key => $val)
                        <option value="{{ $val->id }}"  {{ ($val->name == $user_role) ? 'selected' : ''  }} >{{  $val->name  }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div-->


        



                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="status">Status</label>
                      <select class="form-control" id="status" name="status">
                        <option value="">--Select Status--</option>
                        <option value="active" {{ ($user_detail->status=='active') ? 'selected' : ''  }} >Active</option>
                        <option value="suspended" {{ ($user_detail->status=='suspended') ? 'selected' : ''  }} >Suspended</option>
                      </select>
                    </div>
                  </div>
                    
                
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                  </div>
                </form>
              </div>
              <!-- /.card -->
               
           
        </div>
    </section>
</div>            

@endsection