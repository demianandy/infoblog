@extends('layouts.layout')

@section('header')



    <h2 class="text-center">Регистрация</h2>
    <hr>




      <form action="{{ route('register.store') }}" method="post" style=" margin-top:25px; padding: 0 10% 0 10%">
        @csrf

        <div class="form-group">
          <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Имя" value="{{ old('name') }}">
            @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Электронна почта" value="{{ old('email') }}">
            @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Пароль">
            @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
          <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Подтверждение пароля">
            @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block laravel-button">Зарегистрироваться</button>
        </div>

      </form>


@endsection
