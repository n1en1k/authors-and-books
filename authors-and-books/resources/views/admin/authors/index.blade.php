@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          <div class="btn-group" role="group" aria-label="Basic example">
            <a href="{{ route('home') }}" class="btn btn-lg btn-dark custom-group-btn" style="margin-right: 10px;">Dashboard</a>
            <a href="{{ route('authors.create') }}" class="btn btn-lg btn-secondary custom-group-btn" style="margin-right: 10px;">Create New Author</a>
          </div>
          <hr class="my-4" />

            @include('layouts.messages')

            @if(is_null($allauthors))
              <h2 class="text-center">No author records available</h2>
            @else
              <br>
              <h2 class="text-center">Author Records</h2>
              <table class="table table-bordered">
                <thead>
                  <th>N</th>
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th colspan="3" class="text-center">Action</th>
                </thead>
                <tbody>
                  <?php $i = 1; ?>
                  @foreach($allauthors as $author)
                    <tr>
                      <td>{{ $i++ }}</td>
                      <td>
                        <a href="{{ route('authors.show', ['id' => $author->id]) }}">
                          {{ $author->firstName }}
                        </a>
                      </td>
                      <td>
                        <a href="{{ route('authors.show', ['id' => $author->id]) }}">
                          {{ $author->lastName }}
                        </a>
                      </td>

                      <td class="text-center">
                        <a href="{{ route('authors.show', ['id' => $author->id]) }}" class="btn btn-sm btn-info">
                          Details
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('authors.edit', ['id' => $author->id]) }}" class="btn btn-sm btn-success">
                          Edit
                        </a>
                      </td>
                      <td class="text-center">
                        <a href="{{ route('authors.destroy', ['id' => $author->id]) }}" class="btn btn-sm btn-danger">
                          Delete
                        </a>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              {{ $allauthors->links() }}

            @endif


        </div>
    </div>
</div>
@endsection
