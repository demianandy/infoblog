@extends('layouts/layout')
@section('title'){{ $category }}@endsection

@section('header')
<div class="contact_area">
            <h2>{{ $category }}</h2>
</div>

<ul>
@foreach ($articles as $k => $article)
<li>
    <div class="media wow fadeInDown" > 
        <h4 class="media-body"> 
            <a href="#" class="catg_title" style="font-weight: bold">{{ $article->title }}</a> 
        </h4>
        <br>
        <a href="#" class="middle-left" style="display: flex"> 
            <img style="width: 200px; height: 130px; margin-right: 20px" alt="Изображение" src="{{asset('storage/'.$article->img)}}"> 
            <p>{{  $article->description}}</p>
            <div style="width: 100px">
                <span>{{$article->category->title  }}  <i class="fa fa-tags text-right"></i></span>
                <br>
                <br><br>
                <img style="width: 100px; height: 80px" alt="Изображение" src="{{asset('storage/'.$article->source->img)}}"> 
                <br><br>                
                <span><i class="fa fa-calendar text-right"></i>{{ $article->getDate() }}</span>
            </div>
        </a>
    </div>
</li>
    <hr>
@endforeach
{{ $articles->onEachSide(1)->links() }}
</ul>
@endsection
