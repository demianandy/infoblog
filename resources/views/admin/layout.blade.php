@extends('layouts/layout')
@section('title')Административная панель@endsection

@section('header')
<section class="content-header" id="navArea">
    <nav class="navbar" role="navigation">
      <h2 class="text-center">Административная панель</h2>
      <hr>
        <ul class="nav nav-tabs">
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Статьи</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('articles.index') }}">Список статей</a></li>
              <li><a href="{{ route('articles.create') }}">Новая статья</a></li>
            </ul>
          </li>
  

          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Категории</a>
            <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('categories.index') }}">Список категорий</a></li>
              <li><a href="{{ route('categories.create') }}">Новая категория</a></li>
            </ul>
          </li>


          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Теги</a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('tags.index') }}">Список тегов</a></li>
              <li><a href="{{ route('tags.create') }}">Новый тег</a></li>
            </ul>
          </li>


          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Источники</a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('sources.index') }}">Список источников</a></li>
              <li><a href="{{ route('sources.create') }}">Новый источник</a></li>
            </ul>
          </li>



          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Пользователи</a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="{{ route('users.index') }}">Список пользователей</a></li>
              <li><a href="{{ route('users.create') }}">Новый пользователь</a></li>
            </ul>
          </li>


          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Закрыть</a>
          <ul class="dropdown-menu" role="menu">
              <li><a href="#">Закрыть сайт</a></li>
              <li><a href="#">Закрыть страницу</a></li>
            </ul>
          </li>
        

          <!-- <li><a href="pages/404.php">404 ошибка</a></li> -->
        </ul>
        @yield('news')
      </nav>
      
    </section>
    
    @yield('table')

@endsection

