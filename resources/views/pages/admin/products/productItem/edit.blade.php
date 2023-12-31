@extends('layouts.grandLayout')

@section('dashboard-content')
<div class="container-fluid">
     <!-- general form elements -->
     <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form method="POST" action="{{route('product-item.update',$products->id)}}" enctype="multipart/form-data">
                @method('PUT')  
                @csrf
                <div class="card-body">
                    @include('pages.admin.products.productItem.form', ['product'=>$product])  
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" onClick="sweetAlertConfirm(event)">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
</div>    
@endsection