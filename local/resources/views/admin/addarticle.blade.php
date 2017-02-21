@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Thêm bài viết
      </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <!-- Content Article -->
            <div class="col-md-9 col-sm-12 col-xs-12">
              <form method="POST" action="{{ url('admin/articles') }}">
                <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                <input type="hidden" name="author"  value="{{Auth::user()->name}}">
                <div class="box box-info">
                 
                  <div class="box-header">
                    <div class="box-body">
                      <input name="title" class="form-control input-lg" type="text" placeholder="Tiêu đề bài viết">
                    </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body pad">
                    <div class="form-group">
                      <textarea name="description" class="form-control" rows="3" placeholder="Mô tả"></textarea>
                    </div>
                    
                    <textarea name="content" id="editor1" name="editor1" rows="10" cols="80">
                            
                    </textarea>
                    
                    <!-- Keyword Input -->

                    <br>
                    <div class="form-group">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat">Description</button>
                      </div>
                      <textarea name="meta_description" class="form-control" rows="3" placeholder="Description."></textarea>
                    </div>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat">Keyword</button>
                      </div>
                      <!-- /btn-group -->
                      <input name="meta_keyword" type="text" class="form-control">
                    </div>
                    <br>
                    <div class="input-group">
                      <div class="input-group-btn">
                        <button type="button" class="btn btn-info btn-flat">Tags</button>
                      </div>
                      <!-- /btn-group -->
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  <div class="box-footer">
                    <button type="submit" class="btn btn-default">Cancel</button>
                    <button type="submit" class="btn btn-info pull-right">Thêm bài viết</button>
                  </div>
                </div>
              </form>
              <!-- /.Articles-box -->
            </div>
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@if ( $errors->any() )
<div class="example-modal">
    <div class="modal modal-danger" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Thông báo lỗi</h4>
                </div>
                <div class="modal-body">
                     
                        <ul>
                          @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                          @endforeach
                        </ul> 
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tắt</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
@endif
@endsection

@section('script')
<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script>
  $(function () {
    // Replace the <textarea id="editor1"> with a CKEditor
    // instance, using default configuration.
    CKEDITOR.replace('editor1');
    //bootstrap WYSIHTML5 - text editor
    $(".textarea").wysihtml5();
    $('#myModal').modal({
     
    })
  });
</script>
@endsection