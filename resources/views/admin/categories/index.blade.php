@extends('admin.layout')


@section('table')
<section class="content">

    <section class="">
          <h2 class="page-header">Текущие категории</h2>
    </section>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body style='max-width: 100%'">
        <div class="card-body style='max-width: 100%'">

            @if(count($categories))
                <table class="table table-bordered table-hover tables" style="max-width:100%;  table-layout: fixed">
                  <thead>
                    <tr>
                      <th class="text-center">Категория</th>
                      <th class="text-center" style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($categories as $category)
                    <tr>
                      <td>{{ $category->title }}</td>
                      <td>
                        <div class="td" style="display: flex; justify-content: space-between; border: none">
                            <a href="{{ route('categories.edit', ['category' => $category->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ route('categories.destroy', ['category' => $category->id]) }}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class = "btn btn-danger btn-sm laravel-button" onclick='return confirm("Вы действительно хотите удалить категорию {{$category->title}}?")'>      <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
            @else 
                <p>Категорий пока нет :(</p>
            @endif

        </div>

            {{ $categories->onEachSide(1)->links() }}

                <a href="{{ route('categories.create') }}" class = 'btn button_table btn-primary mb-3 laravel-button'>Добавить категорию</a>
</section>
@endsection