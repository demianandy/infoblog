@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Редактирование пользователя</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif
    <!-- Main content -->
    <form role="form" method="post" action="{{ route('users.update', ['user' => $user->id])  }}">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="title" placeholder="Имя пользователя" name="name" value="{{ $user->name }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Электронна почта" value="{{ $user->email }}">
                    @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="text" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="*Новый пароль">
                    @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <select class="form-control custom-select @error('isAdmin') is-invalid @enderror" id="isAdmin" name="isAdmin" >
                        <?php $roots = array('Пользователь', 'Админ', 'Редактор');?>
                        @foreach ($roots as $k => $root)
                          <option value="{{$k}}" @if($root == $user->isAdmin) selected @endif>{{$root}}</option>
                        @endforeach
                        </select>  
                          @error('isAdmin')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror  
                </div>

                <!-- /.card-body -->
<hr>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table laravel-button">Сохранить</button>
                </div>
<hr>
                <p>*Пользователь - имеет право оставлять комментарии.</p>
                <p>*Редактор - имеет право редактировать комментарии.</p>
                <p>*Админ - имеет право доступа к админке.</p>
            </form>
    <!-- /.content -->

@endsection