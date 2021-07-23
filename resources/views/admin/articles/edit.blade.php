@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Редактирование статьи</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('articles.update', ['article' => $article->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Заголовок" name="title" value="{{ $article->title }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Описание (максимум - 300 символов)" name="description"   rows="4" style="resize: none">{{ $article->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('text') is-invalid @enderror" id="text" placeholder="Содержание" name="text" rows="10" style="resize: none">{{ $article->text }}</textarea>
                    @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" >
                        @foreach ($categories as $category)
                          <option value="{{$category}}" @if($category == $article->category->title)) selected @endif> {{$category}} </option>
                        @endforeach
                        </select>  
                          @error('category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror  

                </div>

                <div class="form-group">
                        <label for="source_id">Источник</label>
                        <select class="form-control custom-select @error('source_id') is-invalid @enderror" id="source_id" name="source_id" >
                        @foreach ($sources as $source)
                          <option value="{{$source}}" @if($source == $article->source->title) selected @endif>{{$source}}</option>
                        @endforeach
                        </select>  
                          @error('source_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror  
                </div>



                <div class="form-group">
                    <label for="tag_id">Теги</label>
                    <select class="form-control select2 @error('tags') is-invalid @enderror"  data-placeholder="Выберите теги" multiple="multiple"  style="width: 100%;" name="tags[]" id="tags">
                    @foreach($tags as $tag)
                      <option value="{{ $tag }}" @if(in_array($tag, $article->tags->pluck('title')->all())) selected @endif>
                        {{ $tag }}</option>
                    @endforeach
                    </select>

                      @error('tags')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>


                  <div class="form-group">
                    <label for="img">Выбрать новое изображение</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                    <div>{{ $article->img }}</div>
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>




                <!-- /.card-body -->




   
<hr>


                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table laravel-button">Сохранить</button>
                </div>

            </form>
    <!-- /.content -->


@endsection