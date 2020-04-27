@extends('./admin.master')
@section('title', 'Thêm chuyên mục')
@section('category', 'Category')
@section('content')
<div id="message" style="background:#d4edda; padding:10px; margin-bottom:5px;"><i class="fa fa-fw fa-check"></i>Thêm thành công !</div>
<div class="box box-primary">
    <!-- /.box-header -->
    <br />
    <!-- form start -->
    <form  method="post" enctype="multipart/form-data" role="form" id="category">
      @csrf
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tiêu đề </label>
          <input type="text" class="form-control" id="cat_name" name="cat_name" placeholder="Nhập tên chuyên mục">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả chuyên mục</label>
          <textarea name="des_cat" id="des_cat" cols="30" rows="3" class="form-control" placeholder="Nhập mô tả cho chuyên mục"></textarea>
        </div>
        <div class="form-group">
            <label>Chuyên mục cha : </label>
            <select class="form-control" id="parent_id" name="parent_id">
                <option value="0" selected>Mặc định</option>
                <?php menuParent($cat, 0, $str="") ?>
            </select>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Ảnh mô tả : </label>
          <input type="file" name="img" id="img">
        </div>
        <div class="form-group" id="demo">
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button class="btn btn-primary" type="submit" id="add_cat">Thêm mới</button>
      </div>
    </form>
  </div>
<?php 
  function menuParent($data,$parent,$str=''){
    foreach($data as $item){
        if($item['parent_id']==$parent){                                           
          echo '<option value="'.$item['id'].'">'.$str.$item['name'].'</option>';
            menuParent($data,$item['id'],$str.'----|  ');
        }
    }
  }
?>
@stop
