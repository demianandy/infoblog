@extends('admin.layout')

@section('table')

    <!-- Content Header (Page header) -->
    <div class="">
          <h2 class="page-header">Новая статья</h2>
    </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                    <span>Вы допустили ошибку</span>
            </div>
        @endif

    <!-- Main content -->
    <form role="form" method="post" action="{{ route('articles.store') }}" enctype="multipart/form-data">
        @csrf
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="Заголовок" name="title" value="{{ old('title') }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" placeholder="Описание (максимум - 300 символов)" name="description"   rows="4" style="resize: none">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control @error('text') is-invalid @enderror" id="text" placeholder="Содержание" name="text"  value="{{ old('text') }}" rows="10" style="resize: none">{{ old('text') }}</textarea>
                    @error('text')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                        <label for="category_id">Категория</label>
                        <select class="form-control custom-select @error('category_id') is-invalid @enderror" id="category_id" name="category_id" >
                        <option value="">{{ old('category_id') ?: 'Выберите категорию' }}</option>
                        @foreach ($categories as $category)
                          <option value="{{$category}}" @if($category == old("category_id")) selected @endif>{{$category}}</option>
                        @endforeach
                        </select>  
                          @error('category_id')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror  
                </div>

                <div class="form-group">
                        <label for="source_id">Источник</label>
                        <select class="form-control custom-select @error('source_id') is-invalid @enderror" id="source_id" name="source_id" >
                        <option value="">{{ old('source_id') ?: 'Выберите источник' }}</option>
                        @foreach ($sources as $source)
                          <option value="{{$source}}" @if($source == old("source_id")) selected @endif>{{$source}}</option>
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
                      <option value="{{ $tag }}" @if(in_array($tag, old("tags", []))) selected @endif>
                        {{ $tag }}</option>
                    @endforeach
                    </select>

                      @error('tags')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>


                  <div class="form-group">
                    <label for="img">Изображение</label>
                    <input type="file" class="form-control-file" id="img" name="img">
                    
                    @error('img')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>




                <!-- /.card-body -->




   
<hr>


                <div class="card-footer ">
                  <button type="submit" class="btn btn-primary button_table laravel-button">Создать</button>
                </div>

            </form>
    <!-- /.content -->


@endsection