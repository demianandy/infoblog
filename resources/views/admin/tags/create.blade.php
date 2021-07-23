@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Новый тег</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif
    <!-- Main content -->
    <form role="form" method="post" action="{{ route('tags.store') }}">
        @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Название тега" name="title" value="{{ old('title') }}">
                    @error('title')
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