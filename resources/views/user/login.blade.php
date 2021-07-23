@extends('layouts.layout')

@section('header')



    <h2 class="text-center">Вход</h2>
    <hr>




      <form action="{{ route('login.create') }}" method="post" style=" margin-top:25px; padding: 0 10% 0 10%">
        @csrf

        <div class="form-group">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Электронна почта" value="{{ old('email') }}">
            @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Пароль">
            @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="invalid-feedback">{{ session('message') }}</div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block laravel-button">Авторизоваться</button>
        </div>

      </form>


@endsection
