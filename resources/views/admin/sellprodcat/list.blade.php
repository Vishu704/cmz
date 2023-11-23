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
            <h1>Sell Product Category</h1>
          </div>
          <div class="col-sm-3">
            <button type="button" onclick="window.location.href='{{ url('sell-addproductcat') }}';" class="btn btn-block btn-outline-primary btn-lg">+ Add New Category</button>
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
                        <h3 class="card-title">Sell Product Category Table</h3>
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
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>Category Name</th>
                              <th>Category Slug</th>
                              <th>Category Image</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($productcats as $key => $productcat)
                            @php        
                                  if($productcat->status=='active'){
                                    $cls = 'bg-success';
                                  } else {
                                    $cls = 'bg-info';
                                  }
                            @endphp
                            <tr class="">
                              <td>{{ $productcats->firstItem() + $key }}</td>
                              <td style="text-transform: capitalize;">{{ $productcat->cat_name }}</td>
                              <td>{{ $productcat->cat_slug }}</td>
                              <td>
                              @if($productcat->cat_img!='')  
                                <img style="width:100px;" src="{{ $productcat->cat_img }}" >
                              @endif
                              </td>
                              <td style="text-transform: capitalize;">{{ $productcat->status }} </td>
                              <td><a href="{{ url('sell-editproductcat/'.$productcat->id) }}"><i class="fas fa-edit"></i>Edit</a> / 
                              <a class="text-danger" href="{{ url('sell-deleteproductcat/'.$productcat->id) }}"><i class="fas fa-trash"></i>Delete</a></td>
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