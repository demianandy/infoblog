@extends('layouts/layout')
@section('title') Ошибка @endsection

@section('header')
        <div class="left_content">
          <div class="error_page">
            <h3>Приносим наши извинения</h3>
            <h1>404</h1>
            <p>К сожалению, страницу, которую вы искали, найти не удалось. Она может быть временно недоступна, перемещена или больше не существует.</p>
            <span></span> <a href="{{ route('home') }}" class="wow fadeInLeftBig">Вернуться на главную</a> </div>
        </div>
@endsection