@extends('admin.common.template')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Page</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="">Home</a></li>
              <li class="breadcrumb-item active">Add Page</li>
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
                            <h3 class="card-title">Add Page</h3>
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
                          <form action="{{ url('savepage') }}" method="post">
                          {{ csrf_field() }}
                            <div class="card-body">
                            <div class="row">
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Page Title</label>
                                <input type="text" name="page_title" class="form-control" id="" placeholder="Enter page title">
                              </div>
                            </div>
                            
                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="">Page Slug</label>
                                <input type="text" name="page_slug" class="form-control" id="" placeholder="Enter page slug">
                              </div>
                            </div>

                            <div class="col-md-6">
                              <div class="form-group">
                                <label for="status">Status</label>
                                <select class="form-control" id="status" name="status">
                                  <option value="">--Select Status--</option>
                                  <option value="active">Active</option>
                                  <option value="suspended">Suspended</option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-12">
                              <div class="form-group">
                                <label for="">Page Description</label>
                                <textarea class="form-control rounded-0" name="page_description" id="" rows="3" placeholder="Enter page description"></textarea>
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