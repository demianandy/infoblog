@extends('layouts/layout')


@section('header')
<section>
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="left_content">
          <div class="contact_area">
            <h2>Обратная связь</h2>
            <p>Если у Вас есть вопросы, предложения или конструктивная критика, обязательно пишите. Мы всегда готовы поддержать обратную связь. Наши высококлассные специалисты находятся в режиме онлай в любое время суток. И готовы ответить на Ваше письмо незамедлительно.</p>
            <form action="#" class="contact_form">
              <input class="form-control" type="text" placeholder="Имя">
              <input class="form-control" type="email" placeholder="Электронная почта">
              <textarea class="form-control" cols="30" rows="10" style="resize:none" placeholder="Сообщение"></textarea>
              <input type="submit" value="Отправить">
            </form>
          </div>
        </div>
      </div>
</section>
@endsection