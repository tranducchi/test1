@extends('./admin.master')
@section('title', 'Danh sách chuyên mục')
@section('category', 'Danh sách')
@section('content')
<div class="col-xs-12">
    <div class="box">
     
      <!-- /.box-header -->
      <div class="box-body">
          <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
            <div class="row" id="form_data">
              <div class="col-sm-12" >
                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                  <tr role="row">
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">STT</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Tên chuyên mục</th>
                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Mô tả</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Sửa</th>
                    <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Xóa</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach ($tag as $c)
                  <tr role="row" class="odd">
                    <td class="">{{$i}}</td>
                    <td class="">{{$c->name}}</td>
                    <td class="">{{$c->slug}}</td>
                      <td class="sorting_1"><a href="/admin/tag/{{$c->slug}}/edit" class="btn btn-warning  btn-sm"><i class="fa fa-pencil"></i></a></td>
                      <td class="sorting_1">
                          <form method="POST" action="{{ route('tag.destroy', [$c->id]) }}" onsubmit="return confirm('Bạn muốn xóa bài viết !');">
                              {{ csrf_field() }}
                              {{ method_field('DELETE') }}
                              <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                          </form>
                          
                      </td>
                  </tr>
                  <?php $i++ ?>
                @endforeach
              </tbody>
              </table>
            </div>
    </div>
    <div class="row">
      <div class="col-sm-8 col-sm-offset-2">
          {!! $tag->links() !!}
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@stop