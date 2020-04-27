@extends('./admin.master')
@section('title', 'Danh sách bài viết')
@section('category', 'Danh sách')
@section('content')
<div class="col-xs-12">
    <div class="box">
     
      <!-- /.box-header -->
      <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div>
        <div class="col-sm-6">

          <form action="/admin/article/search" method="post">
              @csrf
              <div class="form-inine">
                  <input type="text" class="form-control" name="key" placeholder="Nhập tên tìm kiếm ...">
                
                  <button type="submit" class="btn btn-primary">Tìm kiếm</button>
                 
              </div>
          </form>
        </div>
      </div>
      <a href="/admin/article/create" class="btn btn-primary"><i class='fa fa-plus'></i>  Viết bài mới</a>
      <div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <thead>
            <br/>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">STT</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tiêu đề bài viết</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="0.5" colspan="1" aria-label="Platform(s): activate to sort column ascending">Ảnh bài viết</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mô tả</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Chuyên mục</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Ngày đăng</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Hiển thị</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Sửa</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Xóa</th>
            </tr>
          </thead>
          <tbody>
            <?php $i=1 ?>
            @foreach ($articles as $a)
              <tr role="row" class="odd">
                <td class="">{{$i}}</td>
                <td class="">{{$a->title}}</td>
                <td class="img-ar">
                  <img src="/storage/public/images/{{$a->image}}" width="70%" alt="" />
                </td>
                <td>{{substr($a->description,0,50)}}</td>
                <td class="sorting_1">{{$a->category->name}}</td>
                <td class="sorting_1">{{$a->created_at->toDateString()}}</td>
                <td class="sorting_1">
                  @if($a->status = 1)
                    {{"Có"}}
                  @else 
                    {{"Không"}}
                  @endif
                </td>
                <td class="sorting_1"><a href="/admin/article/{{$a->id}}/edit" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a></td>
                <td class="sorting_1">
                    <form method="POST" action="{{ route('article.destroy', [$a->id]) }}" onsubmit="return confirm('Bạn muốn xóa bài viết !');">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </form>
              </td>
              </tr>
              <?php $i++?>
            @endforeach
          </tbody>
        </table></div></div><div class="row"><div class="col-sm-5"><div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Hiện {{$articles->firstItem()}} <i class="fa fa-arrow-circle-right"></i> {{$articles->lastItem()}} của {{$articles->total()}} bài viết</div>
      </div>
      {{$articles->links()}}
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@stop