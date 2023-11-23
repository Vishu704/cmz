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
          <div class="col-sm-6">
            <h1>User Login Otp</h1>
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
                        <h3 class="card-title">Otp Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                        <thead>
                            <tr>
                              <th style="width: 10px">#</th>
                              <th>User</th>
                              <th>Otp</th>
                              <th>Status</th>
                              <th>Request Time</th>
                            </tr>
                        </thead>
                        <tbody>
                          @foreach($otps as $key => $otp)

                            @php

                                          
                                          if($otp->status=='active'){
                                            $cls = 'bg-success';
                                          } else {
                                            $cls = 'bg-info';
                                          }
                            @endphp



                          
                            <tr class="{{ $cls }}">
                              <td>{{ $otps->firstItem() + $key }}</td>
                              <td style="text-transform: capitalize;">{{ $otp->user->name }}</td>
                              <td>{{ $otp->otp }}</td>
                              <td style="text-transform: capitalize;">{{ $otp->status }} </td>
                              <td>{{ date_format($otp->created_at, 'd-m-Y H:i A') }}</td>
                            </tr>
                           @endforeach 
                        </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer pagination_d text-right clearfix">

                    {{ $otps->appends($_GET)->links() }}
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