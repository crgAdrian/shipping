@extends('backend.layouts.master')
@section('content')
    <div class="row">
   <div class="row">
       <div class="col-md-6">

           <div class="box box-primary">
               <div class="box-header with-border">
                   <h3 class="box-title">Add new product</h3>
               </div>

               <form role="form" action="{{ route('products.store') }}" method="post">
                   {{ csrf_field() }}
                   <div class="box-body">
                       <div class="form-group{{ $errors->productsCreate->first('name') ? ' has-error' : '' }}">
                           <label for="name">Name:</label>
                           <input type="text" name="name" class="form-control" id="name" placeholder="Enter the name"/>
                           <span class="help-block">{{ $errors->productsCreate->first('name') }}</span>
                       </div>
                   </div>

                   <div class="box-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
               </form>

           </div>
       </div>

       <div class="col-md-6">

           <div class="box box-primary">
               <div class="box-header with-border">
                   <h3 class="box-title">Add shipping tracking code for a product</h3>
               </div>

               <form role="form" action="{{ route('tracking.store') }}" method="post">
                   {{ csrf_field() }}
                   <div class="box-body">
                       <div class="form-group{{ $errors->addTracking->first('products') ? ' has-error' : '' }}">
                           <label for="products">Products:</label>
                           <select name="product" id="products" class="form-control js-example-basic-single">
                               <option></option>
                               @if(count($products))
                                   @foreach($products as $product)
                                       <option value="{{ $product->id }}">{{ $product->name }}</option>
                                   @endforeach
                               @endif
                           </select>
                           <span class="help-block">{{ $errors->addTracking->first('products') }}</span>
                       </div>

                       <div class="form-group{{ $errors->addTracking->first('tracking_code') ? ' has-error' : '' }}">
                           <label for="tracking_code">Tracking Code:</label>
                           <input type="text" name="tracking_code" class="form-control" id="tracking-code" placeholder="Enter the code"/>
                           <span class="help-block">{{ $errors->addTracking->first('tracking_code') }}</span>
                       </div>

                       <div class="form-group{{ $errors->addTracking->first('date') ? ' has-error' : '' }}">
                           <label>Date:</label>
                           <div class="input-group date">
                               <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                               </div>
                               <input type="text" name="date" class="form-control pull-right" id="date">
                           </div>
                           <span class="help-block">{{ $errors->addTracking->first('date') }}</span>
                       </div>

                   </div>

                   <div class="box-footer">
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </div>
               </form>

           </div>
       </div>
   </div>

       <div class="row">
           <div class="col-md-6">
               <div class="box">
                   <div class="box-header">
                       <h3 class="box-title">List Products</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body table-responsive no-padding">
                       <table class="table table-hover">
                           <tbody>
                               <tr>
                                   <th>ID</th>
                                   <th>Name</th>
                               </tr>
                               @if(count($products))
                                   @foreach($products as $product)
                                       <tr>
                                           <th>{{ $product->id }}</th>
                                           <th>{{ $product->name }}</th>
                                       </tr>
                                   @endforeach
                               @endif
                           </tbody>
                       </table>
                   </div>
                   <!-- /.box-body -->
               </div>
           </div>

           <div class="col-md-6">
               <div class="box">
                   <div class="box-header">
                       <h3 class="box-title">Tracking</h3>
                   </div>
                   <!-- /.box-header -->
                   <div class="box-body table-responsive no-padding">
                       <table class="table table-hover">
                           <tbody>
                           <tr>
                               <th>ID</th>
                               <th>Product Name</th>
                               <th>Tracking Code</th>
                               <th>At Date</th>
                           </tr>
                           @if(count($tracking))
                               @foreach($tracking as $t)
                                   <tr>
                                       <th>{{ $t->id }}</th>
                                       <th>{{ $t->product->name }}</th>
                                       <th>{{ $t->tracking_code }}</th>
                                       <th>{{ $t->date }}</th>
                                   </tr>
                               @endforeach
                           @endif
                           </tbody>
                       </table>
                   </div>
                   <!-- /.box-body -->
               </div>
           </div>
           </div>
       </div>
   </div>

@endsection