@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <h2 class="text-center">{{ $author->firstName }} {{ $author->lastName }}</h2>
            <table class="table table-bordered">
              <thead>
                <th>Attribute</th>
                <th>Value</th>
              </thead>
              <tbody>
                <tr>
                  <td>First Name</td>
                  <td>{{ $author->firstName }}</td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td>{{ $author->lastName }}</td>
                </tr>
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
