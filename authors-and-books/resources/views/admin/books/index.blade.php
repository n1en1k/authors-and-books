@extends('layouts.app')

@section('content')
<div class="container list-content">
    <div class="row justify-content-center">
      <div class="col-md-8">

          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('home') }}" class="btn btn-lg btn-dark custom-group-btn" style="margin-right: 10px;">Dashboard</a>
            <a href="{{ route('books.create') }}" class="btn btn-lg btn-secondary custom-group-btn" style="margin-right: 10px;">Create New Book</a>
          </div>
          <hr class="my-4" />

          @include('layouts.messages')

          @if(is_null($books))
            <h2 class="text-center">No Book records available</h2>
          @else
            <h1 class="text-center">Books</h1>
            <table class="table table-bordered">
              <thead>
                <th>N</th>
                <th>Book Name</th>
                <th>Year</th>
                <th>Author</th>
                <th colspan="3" class="text-center">Action</th>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @foreach($books as $book)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->year }}</td>
                    <td>
                    {{ $book->authors()->first()->firstName }} {{ $book->authors()->first()->lastName }}
                    </td>
                    <td class="text-center">
                      <a href="{{ route('books.show', ['id' => $book->id]) }}" class="btn btn-sm btn-info">
                        Details
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('books.edit', ['id' => $book->id]) }}" class="btn btn-sm btn-success">
                        Edit
                      </a>
                    </td>
                    <td class="text-center">
                      <a href="{{ route('books.destroy', ['id' => $book->id]) }}" class="btn btn-sm btn-danger">
                        Delete
                      </a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>

            {{ $books->links() }}

          @endif

      </div>
    </div>
</div>
@endsection
