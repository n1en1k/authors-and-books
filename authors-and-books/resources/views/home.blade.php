@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="container">
              <div class="jumbotron text-center">
                <h2 class="text-center display-4">Authors and Books Manager</h2>
                <p class="text-center lead my-4">Welcome <b>{{ Auth::user()->email }}</b></p>
                <p class="text-center lead">Manage authors and books as you please.</p>
                <a href="{{ route('authors.index') }}" class="btn btn-lg btn-dark">Authors</a>
                <a href="{{ route('books.index') }}" class="btn btn-lg btn-secondary">Books</a>
              </div>
            </div>
    </div>
</div>
@endsection

