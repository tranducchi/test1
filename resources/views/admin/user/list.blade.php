@extends('./admin.master')
@section('title', 'Danh sách tài khoản')
@section('category', 'Tài Khoản')
@section('content')
<div class="col-xs-12">
    <div class="box">
     
      <!-- /.box-header -->
      <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <thead>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">STT</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Họ tên</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Email</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Số bài viết</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Cấp quyền</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Sửa</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=1; ?>
          @foreach ($user as $u)
            <tr role="row" class="odd">
            <td class="">{{$i}}</td>
            <td class="">{{$u->name}}</td>
            <td class="">{{$u->email}}</td>
            <td>{{$u->articles->count()}}</td>
              <td>{{$u->role}}</td>
              <td><a href="/admin/user/{{$u->id}}/edit" class="btn btn-warning  btn-sm"><i class="fa fa-pencil"></i></a></td>
              @if ($u->role == 1)
              <td>
              <form method="POST" action="{{ route('article.destroy', [$u->id]) }}" onsubmit="return confirm('Bạn muốn xóa bài viết !');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" disabled class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
             </form>
            </td>
              @else
              <td>
                <form method="POST" action="{{ route('article.destroy', [$u->id]) }}" onsubmit="return confirm('Bạn muốn xóa bài viết !');">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
              </form>
              </a></td>
              @endif
            </tr>
            <?php  $i++; ?>
          @endforeach
        </tbody>
        </table>
      </div>
    </div>
    
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@stop