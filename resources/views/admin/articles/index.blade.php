@extends('admin.layout')


@section('table')
<section class="content">
<div class="card">
    <div class="">
          <h2 class="page-header">Текущие статьи</h2>
    </div>

          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body style='max-width: 100%'">
        <div class="card-body style='max-width: 100%'">

            @if(count($articles))
                <table class="table table-bordered table-hover tables" style="max-width:100%;  table-layout: fixed">
                  <thead>
                    <tr>
                      <th class="text-center">Статья</th>
                      <th class="text-center" style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($articles as $article)
                    <tr>
                      <td>{{ $article->title }}</td>
                      <td>
                        <div class="td" style="display: flex; justify-content: space-between; border: none">
                            <a href="{{ route('articles.edit', ['article' => $article->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ route('articles.destroy', ['article' => $article->id]) }}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class = "btn btn-danger btn-sm laravel-button" onclick="return confirm('Вы действительно хотите удалить статью {{$article->title}}?')">      <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
            @else 
                <p>Статей пока нет :(</p>
            @endif

        </div>

            {{ $articles->links() }}

                <a href="{{ route('articles.create') }}" class = 'btn button_table btn-primary mb-3 laravel-button'>Добавить статью</a>
</div>
</section>
@endsection