@extends('admin.common.template')

@section('content')

<style>
.auth_id{
  margin-right: 10px;
  font-size: 20px;
}

.refresh_auth_id{
  font-size: 20px;
  cursor:pointer;
}

.auth_id_label{
  color: #1400ff;
  font-size: 22px;
  font-weight: bold;
  margin-right: 10px;
}

</style>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-9">
            <h1>Testimonials</h1>
          </div>
          <div class="col-sm-3">
            <button type="button" onclick="window.location.href='{{ url('add-testimonial') }}';" class="btn btn-block btn-outline-primary btn-lg">+ Add New Page</button>
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
                        <h3 class="card-title">Testimonial Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Customer Name</th>
                              <th>Image</th>
                              <th>Testimonial</th>
                              <th>Status</th>
                              <th style="width: 150px;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($testimonials as $key => $testimonial)
                            @php        
                                  if($testimonial->status=='active'){
                                    $cls = 'bg-success';
                                  } else {
                                    $cls = 'bg-info';
                                  }
                            @endphp
                            <tr class="">
                              <td>{{ $testimonial->id }}</td>
                              <td style="text-transform: capitalize;">{{ $testimonial->customer_name}}</td>
                              <td>@if($testimonial->image!='')  
                                        <img style="width:100px;" src="{{ $testimonial->image }}" >
                                  @endif
                              </td>
                              <td>{{ $testimonial->testimonial }}</td>
                              <td style="text-transform: capitalize;">{{ $testimonial->status }}</td>
                              <td><a href="{{ url('edit-testimonial/'.$testimonial->id) }}"><i class="fas fa-edit"></i>Edit</a> / 
                              <a class="text-danger" href="{{ url('delete-testimonial/'.$testimonial->id) }}"><i class="fas fa-trash"></i>Delete</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pagination_d text-right clearfix">
                    
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>            
<script src="{{ asset('js/authid.js') }}"></script>
@endsection