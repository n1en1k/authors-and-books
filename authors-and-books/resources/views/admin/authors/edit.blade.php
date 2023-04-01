@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="border: 1px solid #f1f1f1;">
          <h2 class="text-center" style="margin-top: 30px;">Update Author Record</h2>
          <form class="form" action="{{ route('authors.update', ['id' => $author->id]) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('put') }}
            <div class="form-group <?php echo $errors->has('firstName') ? 'has-error' : '' ?>">
              <label>First Name</label>
              <input type="text" name="firstName" class="form-control" value="{{ $author->firstName }}">
              @if($errors->has('firstName'))
                <span class="help-block">{{ $errors->first('firstName') }}</span>
              @endif
            </div>
            <div class="form-group <?php echo $errors->has('lastName') ? 'has-error' : '' ?>">
              <label>Last Name</label>
              <input type="text" name="lastName" class="form-control" value="{{ $author->lastName }}">
              @if($errors->has('lastName'))
                <span class="help-block">{{ $errors->first('lastName') }}</span>
              @endif
            </div>
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="save_author">Update Author Record</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
