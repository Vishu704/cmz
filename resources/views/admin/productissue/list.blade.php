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
            <h1>Product Issues List</h1>
          </div>
          <div class="col-sm-3">
            <button type="button" onclick="window.location.href='{{ url('addproduct-issue') }}';" class="btn btn-block btn-outline-primary btn-lg">+ Add New Product Issue</button>
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
                        <h3 class="card-title">Products Issue List Table</h3>
                        <form action="" method="get" id="filter_form" class="col-md-3 float-right">
                          <div class="row">
                            <div class="col-md-12">
                              <input type="text" name="search_key" value="{{ $search_key }}" placeholder="Search" class="form-control search_key">
                            </div>
                          </div>
                        </form>
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
                              <th>Product Issue Name</th>
                              <th>Product Category</th>
                              <th>Product Issue Image</th>
                              <th>Status</th>
                              <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($products as $key => $product)
                            @php        
                                  if($product->status=='active'){
                                    $cls = 'bg-success';
                                  } else {
                                    $cls = 'bg-info';
                                  }
                            @endphp
                            <tr class="">
                              <td>{{ $products->firstItem() + $key }}</td>
                              <td style="text-transform: capitalize;">{{ $product->isuue_name }}</td>
                              <td>
                                @if($product->category!='')    
                                  {{$product->category->cat_name}}
                                @endif
                              </td>
                              <td>
                              @if($product->image!='')  
                                <img style="width:50px;" src="{{ $product->image }}" >
                              @endif
                              </td>
                              <td style="text-transform: capitalize;">{{ $product->status }} </td>
                              <td><a href="{{ url('editproduct-issue/'.$product->id) }}"><i class="fas fa-edit"></i>Edit</a> / 
                              <a class="text-danger" href="{{ url('deleteproduct-issue/'.$product->id) }}"><i class="fas fa-trash"></i>Delete</a></td>
                            </tr>
                           @endforeach 
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pagination_d text-right clearfix">
                    {{ $products->appends($_GET)->links() }}
                    </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>            
<script src="{{ asset('js/authid.js') }}"></script>
<script>
      $('.search_key').change(function(){
        $('#filter_form').submit();
      });
</script>
@endsection