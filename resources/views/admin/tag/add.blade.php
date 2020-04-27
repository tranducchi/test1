@extends('./admin.master')
@section('title', 'Danh sách Tag')
@section('category', 'Tag')
@section('content')
<div id="message" style="background:#d4edda; padding:10px; margin-bottom:5px;"><i class="fa fa-fw fa-check"></i>Thêm thành công !</div>
<div class="box box-primary">
    <!-- /.box-header -->
    <br />
    <!-- form start -->
    <form  method="post" role="form" id="add_tag" action="/admin/tag">
      @csrf
      <input type="hidden" name="_method" value="POST">
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên thẻ </label>
          <input type="text" class="form-control" id="tag_name" name="tag_name" placeholder="Nhập tên thẻ">
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button class="btn btn-primary" type="submit">Thêm mới</button>
      </div>
      
    </form>
  </div>
@stop
