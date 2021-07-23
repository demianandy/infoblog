@extends('layouts.layout')
@section('title')ИнфоБлог@endsection
@section('header')
<div class="slick_slider">
      @foreach ($articles_rand as $article)
          <div class="single_iteam"> <a href="{{ route('page', ['id' => $article->id]) }}"> <img src="{{asset('storage/'.$article->img)}}" alt=""></a>
            <div class="slider_article">
              <h2><a class="slider_tittle" href="{{ route('page', ['id' => $article->id]) }}">{{ $article->title }}</a></h2>
              <p>{{ $article->description }}...</p>
            </div>
          </div>
      @endforeach
</div>

<div class="single_post_content">
            <h2><span>Политика</span></h2>
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                @foreach ($politics as $k => $article)
                @if ($k > 0) @break  @endif
                <li>
                  <figure class="bsbig_fig"> <a href="{{ route('page', ['id' => $article->id]) }}" class="featured_img"> <img alt="" src="{{asset('storage/'.$article->img)}}"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('page', ['id' => $article->id]) }}">{{ $article->title }}</a> </figcaption>
                    <p>{{ mb_substr($article->description, 0 , 150) }}...</p>
                  </figure>
                </li>
                @endforeach
              </ul>
            </div>
            <div class="single_post_content_right">
              <ul class="spost_nav">
                @foreach ($politics as $k => $article)
                @if ($k == 0) @continue @endif
                <li>
                  <div class="media wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                    <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
          </div>





<div class="fashion_technology_area">
            <div class="fashion">
              <div class="single_post_content">
                <h2><span>Экономика</span></h2>
                <ul class="business_catgnav wow fadeInDown">
                  @foreach ($economics as $k => $article)
                  @if ($k > 0) @break  @endif
                  <li>
                    <figure class="bsbig_fig"> <a href="{{ route('page', ['id' => $article->id]) }}" class="featured_img"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{ route('page', ['id' => $article->id]) }}">{{ $article->title }}</a> </figcaption>
                      <p>{{ mb_substr($article->description, 0 , 150) }}...</p>
                    </figure>
                  </li>
                  @endforeach
                </ul>
                <ul class="spost_nav">
                  @foreach ($economics as $k => $article)
                  @if ($k == 0) @continue  @endif
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                      <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
            <div class="technology">
              <div class="single_post_content">
                <h2><span>Наука</span></h2>
                <ul class="business_catgnav">
                  @foreach ($sciences as $k => $article)
                  @if ($k > 0) @break  @endif
                  <li>
                    <figure class="bsbig_fig wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="featured_img"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> <span class="overlay"></span> </a>
                      <figcaption> <a href="{{ route('page', ['id' => $article->id]) }}">{{ $article->title }}</a> </figcaption>
                      <p>{{ mb_substr($article->description, 0 , 150) }}...</p>
                    </figure>

                  </li>
                  @endforeach
                </ul>
                <ul class="spost_nav">
                  @foreach ($sciences as $k => $article)
                  @if ($k == 0) @continue  @endif
                  <li>
                    <div class="media wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                      <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                    </div>
                  </li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>


          
<div class="single_post_content">
            <h2><span>Изображения</span></h2>
            <ul class="photograph_nav  wow fadeInDown">
              @foreach ($images as $image)
              <li>
                <div class="photo_grid">
                  <figure> <a href="{{ route('page', ['id' => $image->id]) }}" title="Изображение"> <img src="{{asset('storage/'.$image->img)}}" alt="Изображение"/></a> </figure>
                </div>
              </li>
              @endforeach
            </ul>
          </div>



<div class="single_post_content">
            <h2><span>Общество</span></h2>

            <div class="single_post_content_left">
              <ul class="business_catgnav">
                @foreach ($peoples as $k => $article)
                @if ($k > 0) @break  @endif
                <li>
                  <figure class="bsbig_fig  wow fadeInDown"> <a class="featured_img" href="{{ route('page', ['id' => $article->id]) }}"> <img src="{{asset('storage/'.$image->img)}}" alt="Изображение"> <span class="overlay"></span> </a>
                    <figcaption> <a href="{{ route('page', ['id' => $article->id]) }}">{{ $article->title }}</a> </figcaption>
                    <p>{{ mb_substr($article->description, 0 , 150) }}...</p>
                  </figure>
                </li>
                @endforeach
              </ul>
            </div>

            <div class="single_post_content_right">
              <ul class="spost_nav">
                  @foreach ($peoples as $k => $article)
                  @if ($k == 0) @continue  @endif
                <li>
                  <div class="media wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                    <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                  </div>
                </li>
                @endforeach
              </ul>
            </div>
</div>
@endsection