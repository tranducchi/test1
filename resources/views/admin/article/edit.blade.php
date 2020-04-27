@extends('./admin.master')
@section('title', 'Cập nhật bài viết')
@section('category', 'Bài viết')
@section('content')
<div class="box box-primary">
    <!-- /.box-header -->
    <br />
    <!-- form start -->
   
    <form role="form" method="post" enctype="multipart/form-data" action="/admin/article/{{$articles->id}}">
      @csrf
    <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
      {{ method_field('PUT') }}
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tiêu bài viết : </label>
          <input type="text" name="name" value="{{$articles->name}}" class="form-control" id="exampleInputEmail1" placeholder="Tên bài viết">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tiêu đề SEO : </label>
            <input type="text" name="title" value="{{$articles->title}}" class="form-control" id="exampleInputEmail1" placeholder="Tiêu đề chuyên mục SEO">
          </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Mô tả bài viết : </label>
          <textarea name="description" id="" cols="30" rows="3" class="form-control" placeholder="Nhập mô tả cho chuyên mục">{{$articles->description}}</textarea>
        </div>
        <div class="form-group">
            <img src="/storage/public/images/{{$articles->image}}" alt="" width="30%">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Ảnh bài viết :  </label>
            <input type="file" name="img">
          </div>
        <div class="form-group">
          <label for="">Nội dung bài viết : </label>
          <textarea id="editor1" name="body">{{$articles->body}}</textarea>
        </div>
        <div class="row">
          <div class="col-lg-3">
              <div class="form-group">
                  <label>Chọn chuyên mục : </label>
                  <select class="form-control" name="cat_id">
                  <option value="{{$articles->cat_id}}" selected>{{$articles->category->name}}</option>
                      <?php menuParent($cat, 0, $str="") ?>
                  </select>
              </div>
          </div>
          <div class="col-lg-6">
              <div class="form-group">
                  <label for=""><i class="fa fa-tags"></i>  Tags : </label>
                  <div class="form-inline">
                      <input type="text" id="tags" class="form-control" value="<?php
                        foreach($articles->tags as $a){
                          echo $a->name.',';
                        }
                      ?>" placeholder="Tag bài viết" data-role="tagsinput" name="tags">
                  </div>
                  <div class="tag-list mt-2">
                    <br/>
                    @foreach ($d as $v)
                      <a href="{{$v->id}}" class="label label-default" id="add_tag">{{$v->name}}</a>,
                    @endforeach
                    
                  </div>
                </div>
          </div>
          <div class="col-lg-3">
              <div class="form-group">
                  <label for=""><i class="fa fa-eye" aria-hidden="true"></i> Trạng thái hiển thị : </label>
                    <select class="form-control" name="visible">
                      <option selected="selected" value="1">Hiển thị</option>
                      <option value="0">Ẩn</option>
                    </select>
                </div>
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" class="btn btn-primary"><i class="fa fa-repeat"></i> Cập nhật</button>
      </div>
    </form>

  </div>
  {{-- Add CkEditor --}}
  
  <script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    };
  </script>
  <script>
     CKEDITOR.replace('editor1', options);
  </script>
  {{-- End CkEditor --}}
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
@section('script')
    <script src="/js/bootstrap-tagsinput.min.js"></script>
    <script>
        $('a#add_tag').click(function(e){
          e.preventDefault();
          var dd = $(this).text();
          $('input#tags').tagsinput('add',dd);
        });
    </script>
@stop