@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="border: 1px solid #f1f1f1;">
          <h2 class="text-center" style="margin-top: 30px;">Edit Book Record</h2>
          <form class="form" action="{{ route('books.update', ['id' => $book->id]) }}" method="post">
            {{ csrf_field() }}

            {{ method_field('put') }}

            <div class="form-group <?php echo $errors->has('name') ? 'has-error' : '' ?>">
              <label class="control-label">Book Name</label>
              <input type="text" name="name" class="form-control" value="{{ $book->name }}">
              @if($errors->has('name'))
                <span class="help-block">{{ $errors->first('name') }}</span>
              @endif
            </div>
            <div class="form-group <?php echo $errors->has('year') ? 'has-error' : '' ?>">
              <label class="control-label">Year</label>
              <input type="text" name="year" class="form-control" value="{{ $book->year }}">
              @if($errors->has('year'))
                <span class="help-block">{{ $errors->first('year') }}</span>
              @endif
            </div>


            <div class="form-group <?php echo $errors->has('author') ? 'has-error' : '' ?>">
              <label>Author</label>
              <select class="form-control" name="author">
                <option value=""></option>
                @foreach($authors as $author)
                  @if($book->author === $author->id)
                    <option value="{{ $author->id }}" selected>{{ $author->firstName }} {{ $author->lastName }}</option>
                  @else
                    <option value="{{ $author->id }}">{{ $author->firstName }} {{ $author->lastName }}</option>
                  @endif
                @endforeach
              </select>
              @if($errors->has('author'))
                <span class="help-block">{{ $errors->first('author') }}</span>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-success" name="save_book">Save Book Record</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
