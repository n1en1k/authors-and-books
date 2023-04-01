@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="border: 1px solid #f1f1f1;">
          <h2 class="text-center" style="margin-top: 30px;">Add Author Record</h2>
          <form class="form" action="{{ route('authors.store') }}" method="post">
            {{ csrf_field() }}

            <div class="form-group <?php echo $errors->has('firstName') ? 'has-error' : '' ?>">
              <label class="control-label">First Name</label>
              <input type="text" name="firstName" class="form-control" value="{{ old('firstName') }}">
              @if($errors->has('firstName'))
                <span class="help-block">{{ $errors->first('firstName') }}</span>
              @endif
            </div>

            <div class="form-group <?php echo $errors->has('lastName') ? 'has-error' : '' ?>">
              <label class="control-label">Last Name</label>
              <input type="text" name="lastName" class="form-control" value="{{ old('lastName') }}">
              @if($errors->has('lastName'))
                <span class="help-block">{{ $errors->first('lastName') }}</span>
              @endif
            </div>

            <div class="form-group">
              <button type="submit" class="btn btn-dark" name="save_author">Save Author Record</button>
            </div>
          </form>

        </div>
    </div>
</div>
@endsection
