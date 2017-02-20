@extends('admin.index')
@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Danh sách bài viết
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
            <!-- List Article -->
            <div class="col-xs-12">
              <div class="box">
                  <div class="box-header">
                      <h3 class="box-title">Bài viết mới nhất</h3>

                      <div class="box-tools">
                          <div class="input-group input-group-sm" style="width: 150px;">
                              <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                              <div class="input-group-btn">
                                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                              </div>
                          </div>
                      </div>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding">
                      <table class="table table-hover">
                          <tbody>
                              <tr>
                                  <th>ID</th>
                                  <th>Tiêu đề</th>
                                  <th>Ảnh</th>
                                  <th>Tóm tắt</th>
                                  <th>Ẩn hiện</th>
                                  <th>Thao tác</th>
                              </tr>
                              @foreach($articles as $article)
                                <tr>
                                  <td>{{$article->id}}</td>
                                  <td>{{$article->title}}</td>
                                  <td></td>
                                  <td>{{$article->description}}</td>
                                  <td></td>
                                  <td>
                                    <a href="#"><i class="fa fa-2x fa-edit "></i></a>
                                    <a href="#"><i class="fa fa-2x fa-remove "></i></a>
                                    <a href="#"><i class="fa fa-2x fa-eye "></i></a>
                                  </td>
                                </tr>
                              @endforeach
                              
                              
                          </tbody>
                      </table>
                  </div>
                  <!-- /.box-body -->
              </div>
              <!-- /.box -->
          </div>
            
            <!-- right col -->
        </div>
        <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
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
  });
</script>
@endsection