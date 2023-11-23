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
            <h1>Customer Enquiry</h1>
          </div>
          <div class="col-sm-3">
            {{-- <button type="button" onclick="window.location.href='{{ url('add-blog') }}';" class="btn btn-block btn-outline-primary btn-lg">+ Add New Blog</button> --}}
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
                        <h3 class="card-title">Customer Enquiry Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 50px">#</th>
                              <th style="width: 300px;">Name</th>
                              <th style="width: 500px;">Phone</th>
                              <th>Message</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customerenquiries as $key => $customerenquiry)
                            @php        
                                  if($customerenquiry->status=='active'){
                                    $cls = 'bg-success';
                                  } else {
                                    $cls = 'bg-info';
                                  }
                            @endphp
                            <tr class="">
                              <td>{{ $customerenquiries->firstItem() + $key }}.</td>
                              <td style="text-transform: capitalize;">{{ $customerenquiry->name }}</td>
                              <td>{{ $customerenquiry->phone }}</td>
                              <td style="text-transform: capitalize;">{{ $customerenquiry->message }}</td>
                              {{-- <td><a href="{{ url('edit-blog/'.$blog->id) }}"><i class="fas fa-edit"></i>Edit</a> / 
                              <a class="text-danger" href="{{ url('delete-blog/'.$blog->id) }}"><i class="fas fa-trash"></i>Delete</a></td>
                            </tr> --}}
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