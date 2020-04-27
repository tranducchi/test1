@extends('./admin.master')
@section('title', 'Người dùng')
@section('category', 'Người dùng')
@section('content')

<div class="col-xs-8 col-xs-offset-2">

<form  method="post" enctype="multipart/form-data" role="form" action="/admin/user/{{$user->id}}">
        @csrf
        {{ method_field('PUT') }}
        <div class="box-body">
          <div class="form-group">
            <label for="exampleInputEmail1">Tên người dùng</label>
          <input type="text" value="{{$user->name}}" class="form-control" id="user_name" name="user_name" placeholder="Nhập tên người dùng">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
          <input type="text" value="{{$user->email}}" class="form-control" id="user_email" name="user_email" placeholder="Nhập tên người dùng">
          </div>
          <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
                <input id="password" class="form-control" type="password" placeholder="Nhập mật khẩu mới"  name="password">

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
           
        </div>
          <div class="form-group">
            <label for="password-confirm">Xác nhận mật khẩu</label>

         
                <input id="password-confirm" type="password" placeholder="Nhập lại mật khẩu" class="form-control" name="password_confirmation">
           
        </div>
        @if($user->role != 1)
        <div class="form-group">
            <label>Vai trò</label>
            <select class="form-control" name="role" disable>
            <option value="{{$user->role}}" default>{{$user->role}}</option>
           
            
            </select>
        </div>
        @else
        <div class="form-group">
            <label>Vai trò</label>
            <select class="form-control" name="role">
            <option value="{{$user->role}}" default>{{$user->role}}</option>
            <option value="0"> 0</option>
            <option value="1"> 1</option>
            <option value="2"> 2</option>
            
            </select>
        </div>
        @endif
         
        </div>
        <div class="col-xs-12 text-center">
        <button class="btn btn-primary" type="submit" id="add_cat"><i class="fa fa-repeat"></i> Cập nhật</button>
        </div>
        
        <!-- /.box-body -->
        
         
        
      </form> 
      </div>
@stop