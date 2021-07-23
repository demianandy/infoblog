@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Редактирование источника</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('sources.update', ['source' => $source->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название СМИ" name="title"   value="{{ $source->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('content') is-invalid @enderror" id="content" placeholder="Описание" name="content" rows="4" style="resize: none">{{ $source->content }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="img" class="cursor">Выбрать новое изображение</label>
                    <input type="file" class="form-control-file hidden" id="img" placeholder="Название СМИ" name="img" value="{{ $source->img }}">
                    <div> {{ $source->img }} </div>
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- /.card-body -->
<hr>
                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table laravel-button">Сохранить</button>
                </div>

            </form>
    <!-- /.content -->

@endsection