<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="stylesheet" type="text/css" href="{{asset('assets/admin/css/admin.css')}}"> -->
<title>@yield('title')</title>
<link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
</head>

<body>



<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="{{ route('home') }}">Главная</a></li>
              @if (Auth::check() && Auth::user()->isAdmin)
              <li><a href="{{ route('admin.index') }}">Админка</a></li>
              @endif
              <li><a href="#footer" class="link">Контакты</a></li>
              <li><a href="{{ route('contact') }}">Обратная связь</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p><?=$date;?></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
          <div class="logo_area"><a href="{{ route('home') }}" class="logo"><img src="{{asset('front/img/logo.jpg')}}" alt=""></a></div>
          <div class="add_banner"><a href="pages/contact.php"><img src="{{asset('front/img/addbanner_728x90_V1.jpg')}}" alt=""></a></div>
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Главная</span></a></li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Категории</a>
            <ul class="dropdown-menu" role="menu">
              @foreach ($categories as $category)
                <li><a href="{{ route('category', ['category' => $category->title]) }}">{{ $category->title }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Метки</a>
            <ul class="dropdown-menu" role="menu">
              @foreach ($tags as $tag)
                <li><a href="{{ route('tag', ['tag' => $tag->title]) }}">{{ $tag->title }}</a></li>
              @endforeach
            </ul>
          </li>
          <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Источники</a>
            <ul class="dropdown-menu" role="menu">
              @foreach ($sources as $source)
                <li><a href="{{ route('source', ['source' => $source->title]) }}">{{ $source->title }}</a></li>
              @endforeach
            </ul>
          </li>
          <li><a href="{{ route('random') }}">Случайная статья</a></li>
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Последние новости:</span>
          <ul id="ticker01" class="news_sticker">
            @foreach($articles_last as $article)
              <li><a href="{{ route('page', ['id' => $article->id]) }}" target="_blank"><img src="{{asset('storage/'.$article->img)}}" alt="Изображение">{{ $article->title }}</a></li>
            @endforeach
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="sliderSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        
@yield('header')
      </div>

      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="single_sidebar wow fadeInDown">
            <h2><span>Гостевая книга</span></h2>
            @if (session()->has('login'))
                  <div class="alert alert-success mt-10">
                      {{ session('login') }}
                  </div>
            @endif
            @if(Auth::check())
              <div class="text-center">Привет, {{ auth()->user()->name }}!</div>
              <ul>
                <li><a href="{{ route('logout') }}">Выйти</a></li>
              </ul>
            @else
            <ul>
              <li><a href="{{ route('login') }}">Вход</a></li>
              <li><a href="{{ route('register') }}">Регистрация</a></li>
            </ul>
            @endif
        </div>
        <div class="latest_post">
          <h2><span>Последние новости</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
              @foreach ($articles_last2 as $article)
              <li>
                <div class="media"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                  <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
        <div class="single_sidebar">
            <h2><span>Популярные новости</span></h2>
            <ul class="spost_nav">
              @foreach ($articles_view as $article)
              <li>
                <div class="media wow fadeInDown"> <a href="{{ route('page', ['id' => $article->id]) }}" class="media-left"> <img alt="Изображение" src="{{asset('storage/'.$article->img)}}"> </a>
                  <div class="media-body"> <a href="{{ route('page', ['id' => $article->id]) }}" class="catg_title">{{ $article->title }}</a> </div>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="single_sidebar">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Категории</a></li>
              <li role="presentation"><a href="#tag" aria-controls="profile" role="tab" data-toggle="tab">Метки</a></li>
              <li role="presentation"><a href="#autor" aria-controls="messages" role="tab" data-toggle="tab">Источники</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
                  @foreach ($categories as $category)
                    <li class="cat-item"><a href="{{ route('category', ['category' => $category->title]) }}">{{ $category->title }}</a></li>
                  @endforeach
                </ul>
              </div>

              <div role="tabpanel" class="tab-pane" id="tag">
                <ul>
                  @foreach ($tags as $tag)
                    <li class="cat-item"><a href="{{ route('tag', ['tag' => $tag->title]) }}">{{ $tag->title }}</a></li>
                  @endforeach
                </ul>
              </div>

              <div role="tabpanel" class="tab-pane" id="autor">
                <ul>
                  @foreach ($sources as $source)
                    <li class="cat-item"><a href="{{ route('source', ['source' => $source->title]) }}">{{ $source->title }}</a></li>
                  @endforeach
                </ul>
              </div>

            </div>
          </div>
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Спонсор</span></h2>
            <a class="sideAdd" href="https://www.un.org/ru/" target="_blanc"><img src="{{asset('front/img/add_img.jpg')}}" alt=""></a> </div>
      </div>
    </div>
    
  </section>

  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">

        </div>
      </div>
      @yield('content')

    </div>

  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
            <h2>Категории</h2>
            <ul class="tag_nav">
                  @foreach ($categories as $category)
                    <li><a href="{{ route('category', ['category' => $category->title]) }}">{{ $category->title }}</a></li>
                  @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>Источники</h2>
            <ul class="tag_nav">
                  @foreach ($sources as $source)
                    <li><a href="{{ route('source', ['source' => $source->title]) }}">{{ $source->title }}</a></li>
                  @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInRightBig">
            <h2>Контакты</h2>
            <p>Сайт создан при использовании посадочного шаблона с <a href="https://html-templates.info/blogs-html-templates/shablon-dlya-novostnogo-portalanewsfeed" class="link_site" target="_blank">сайта</a>. Используемый стек технологий: HTML5, CSS3, Bootstrap, JavaScript, PHP7, MySQL, фреймворк Laravel.</p>
            <address>
            ООО "ИнфоБлог". Узбекистан, Ташкент, ул. Тараса Шевченко, дом 21а. Ориентир: бизнес-центр LEVEL, школа 94. Телефон: (93) 313-02-54.
            </address>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2021 - <?=$year;?> Разработка: <a href="contact.php">Дмитрий Харитонов</a></p>
      <p class="developer">Developed By Wpfreeware</p>
    </div>
  </footer>
</div>

<script src="{{ asset('front/js/app.js') }}"></script>
</body>
</html>