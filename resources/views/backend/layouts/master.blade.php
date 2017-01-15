<!DOCTYPE html>
<html lang="ro">
    @include('backend.partials._head')
    <body>
       <div class="wrapper skin-blue sidebar-mini">
           @include('backend.partials._header')
           @include('backend.partials._sidebar')
           <div class="content-wrapper">
               @include('backend.partials._content-header')
               <section class="content">
                   @if(Session::has('success'))
                       <div class="box box-success box-solid">
                           <div class="box-header with-border">
                               <h3 class="box-title">Success</h3>

                               <div class="box-tools pull-right">
                                   <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                               </div>
                               <!-- /.box-tools -->
                           </div>
                           <!-- /.box-header -->
                           <div class="box-body">
                               {{ Session::get('success') }}
                           </div>
                           <!-- /.box-body -->
                       </div>
                   @endif
                   @yield('content')
               </section>
           </div>


       </div>
    </body>

    @include('backend.partials._footer')

    @include('backend.partials._javascript')
</html>