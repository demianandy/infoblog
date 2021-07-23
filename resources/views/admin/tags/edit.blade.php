@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Редактирование тега</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('tags.update', ['tag' => $tag->id]) }}">
        @csrf
        @method('PUT')
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название тега" name="title" value="{{ $tag->title }}">
                    @error('title')
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