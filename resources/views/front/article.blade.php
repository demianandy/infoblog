@extends('layouts/layout')
@section('title'){{ $article->title }}@endsection

@section('header')

<section id="contentSection">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="{{ route('home') }}">Главная</a></li>
              <li><a href="#">{{ $article->category->title }}</a></li>
              <li class="active">{{ $article->title }}</li>
            </ol>
            <h1>{{ $article->title }}</h1>
            <div class="post_commentbox" style="display: flex; justify-content: space-between"> 
              <a href="{{ route('source', ['source' => $article->source->title]) }}"><i class="fa fa-pencil"></i>{{ $article->source->title }}</a> 
              <span><i class="fa fa-calendar"></i>{{ $article->getDate() }}</span> <a href="{{ route('category', ['category' => $article->category->title]) }}"><i class="fa fa-tags"></i>{{ $article->category->title }}</a> <a style="justify-self: right"><i class="fa fa-eye"></i>Просмотров: {{ $article->view }}</a> </div>
              
            <div class="single_page_content"> 
            <blockquote> {{ $article->description }} </blockquote>
            
            <img class="img-center" src="{{ asset('storage/'.$article->img) }}" alt="Изображение">
              <p> {!! nl2br(e($article->text)) !!} </p>

             
              <?php $class = array('btn default-btn', 'btn btn-red', 'btn btn-yellow', 'btn btn-green', 'btn btn-black', 'btn btn-orange', 'btn btn-blue', 'btn btn-lime', 'btn btn-theme');?>
              @foreach ($tags as $k => $tag)
                @if ($k == 8) @break @endif
                <button class="<?=$class[$k];?>">{{ $tag->title }}</button>
              @endforeach
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Похожие статьи</h2>
              <ul class="spost_nav wow fadeInDown animated">
                @foreach ($related as $article)
                @if ($article->id == $id) @continue @endif
                <li>
                  <div class="media"> <a class="media-left" href="#"> <img src="{{ asset('storage/'.$article->img) }}" alt="Изображение"> </a>
                    <div class="media-body"> <a class="catg_title" href="single_page.html">{{ $article->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection






  