@extends('./admin.master')
@section('title', 'Danh sách bình luận')
@section('category', 'bình luận')
@section('content')
<div class="col-xs-12">
    <div class="box">
     
      <!-- /.box-header -->
      <div class="box-body">
        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
          <thead>
            <tr role="row">
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending">STT</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Nội dung </th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Tài khoản</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Bài viết</th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Ngày đăng</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Hiển thị</th>
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1"  aria-sort="ascending">Xóa</th>
            </tr>
          </thead>
          <tbody>
          <?php $i=0; ?>
          @if($comments->count() > 0)
            @foreach ($comments as $c)
              <?php  $i++; ?>
              <tr role="row" class="odd">
                <td class="">{{$i}}</td>
                <td class="">{{$c->content}}</td>
                <td class="">{{$c->user->name}}</td>
                <td>{{$c->aritcle->name}}</td>
                <td>{{$c->created_at->toDateString()}}</td>
                <td>
                    @if ($c->status == 0)
                        {{"Không"}}
                    @endif
                    {{"Có"}}
                </td>
                <td class="sorting_1"><a href="" class="btn btn-danger  btn-sm"><i class="fa fa-trash-o"></i>
                </a></td>
                </tr>
                
              @endforeach
              @else
                {!!"<p class='alert alert-warning'><i class='fa fa-exclamation-triangle'></i>Không có comment</p>"!!}
                  @endif
                </tbody>
                </table>
              </div>
            </div>
          </div>
          </div>
        </div>
      </div>
      {{$comments->links()}}
      <!-- /.box-body -->
    </div>
    <!-- /.box -->
  </div>
@stop