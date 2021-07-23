@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Новый источник</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif
    <!-- Main content -->
    <form role="form" method="post" action="{{ route('sources.store') }}" enctype="multipart/form-data">
        @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название СМИ" name="title"   value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Описание" name="content" rows="4" style="resize: none">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="img">Изображение</label>
                    <input type="file" class="form-control-file" id="img" name="img" value="">
                    
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- /.card-body -->
<hr>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table laravel-button">Создать</button>
                </div>

            </form>
    <!-- /.content -->

@endsection