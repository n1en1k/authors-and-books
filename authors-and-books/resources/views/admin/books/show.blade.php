@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">{{ $book->name }}</h2>
            <table class="table table-bordered">
              <thead>
                <th>Attribute</th>
                <th>Value</th>
              </thead>
              <tbody>
                <tr>
                  <td>Name</td>
                  <td>{{ $book->name }}</td>
                </tr>
                <tr>
                  <td>Author</td>
                  <td>{{ $book->authors()->first()->firstName }} {{ $book->authors()->first()->lastName }}</td>
                </tr>
                <tr>
                  <td>year</td>
                  <td>{{ $book->year }}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
