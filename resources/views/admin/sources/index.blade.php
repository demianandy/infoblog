@extends('admin.layout')


@section('table')
<section class="content">
<div class="card">
    <div class="">
          <h2 class="page-header">Текущие источники</h2>
    </div>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body style='max-width: 100%'">
        <div class="card-body style='max-width: 100%'">

            @if(count($sources))
                <table class="table table-bordered table-hover tables" style="max-width:100%;  table-layout: fixed">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 100px" class="word-wrap: break-word">Эмблема</th>
                      <th class="text-center">Газета / Журнал</th>
                      <th class="text-center" style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($sources as $source)
                    <tr>
                      <td style="padding: 0"><img src="{{asset('storage/'.$source->img)}}" alt="Эмблема" width="100%" height="80px" class="td"></div></td>
                      <td class="text-center">{{ $source->title }}</td>
                      <td>
                        <div class="td" style="display: flex; justify-content: space-between; border: none">
                            <a href="{{ route('sources.edit', ['source' => $source->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ route('sources.destroy', ['source' => $source->id]) }}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class = "btn btn-danger btn-sm laravel-button" onclick="return confirm('Вы действительно хотите удалить источник {{$source->title}}?')">      <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
            @else 
                <p>Источников пока нет :(</p>
            @endif

        </div>

            {{ $sources->onEachSide(1)->links() }}

                <a href="{{ route('sources.create') }}" class = 'btn button_table btn-primary mb-3 laravel-button'>Добавить источник</a>
</div>
</section>
@endsection