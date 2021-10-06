<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            @yield('content_header')
          </div><!-- /.col -->
          <div class="col-sm-6">
            @include('admin::partial.breadcrumb')
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            @yield('content')
        </div>
    </div>
</div>
