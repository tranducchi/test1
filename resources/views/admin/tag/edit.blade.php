@extends('./admin.master')
@section('title', 'Cập nhật Tag')
@section('category', 'Tag')
@section('content')
<div id="message" style="background:#d4edda; padding:10px; margin-bottom:5px;"><i class="fa fa-fw fa-check"></i>Thêm thành công !</div>
<div class="box box-primary">
    <!-- /.box-header -->
    <br />
    <!-- form start -->
    @foreach ($tag as $t)
    <form  method="post" role="form" id="add_tag" action="{{ route('tag.update', $t->slug) }}">
      @method('PUT')
      @csrf
   
      <div class="box-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Tên thẻ </label>
          <input type="text" class="form-control" id="tag_name" name="tag_name" placeholder="Nhập tên thẻ" value="{{$t->name}}">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Slug</label>
            <input type="text" class="form-control" id="tag_name" name="slug" value="{{$t->slug}}">
          </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer">
        <button class="btn btn-primary" type="submit"><i class="fa fa-repeat"></i> Cập nhật</button>
      </div>
    </form>
    @endforeach
  </div>
@stop
