@extends('admin.layout')


@section('table')
<section class="content">
<div class="card">
      <div class="">
          <h2 class="page-header">Текущие пользователи</h2>
      </div>



          @if (session()->has('success'))
                  <div class="alert alert-success">
                      {{ session('success') }}
                  </div>
          @endif


      <div class="card-body style='max-width: 100%'">
        <div class="card-body style='max-width: 100%'">

            @if(count($users))
                <table class="table table-bordered table-hover tables" style="max-width:100%;  table-layout: fixed">
                  <thead>
                    <tr>
                      <th class="text-center">Пользователь</th>
                      <th class="text-center">Почта</th>
                      <th class="text-center" style="width: 100px">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach($users as $user)
                    <tr>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>
                        <div class="td" style="display: flex; justify-content: space-between; border: none">
                            <a href="{{ route('users.edit', ['user' => $user->id]) }}" class ="btn btn-info btn-sm float-left mr-1">
                            <i class="fa fa-pencil" aria-hidden="true"></i></a>
                            <form action="{{ route('users.destroy', ['user' => $user->id]) }}" method="POST" class="float-left">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class = "btn btn-danger btn-sm laravel-button" onclick="return confirm('Вы действительно хотите удалить пользователя по имени {{$user->name}}?')">      <i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>
                      </td>
                    </tr>
                    @endforeach 
                  </tbody>
                </table>
            @else 
                <p>Пользователей пока нет :(</p>
            @endif

        </div>

            {{ $users->onEachSide(1)->links() }}

                <a href="{{ route('users.create') }}" class = 'btn button_table btn-primary mb-3 laravel-button'>Добавить пользователя</a>
</div>
</section>
@endsection