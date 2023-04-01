<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Form Requests
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;

// Models
use App\Books;
use App\Authors;

use Session;

class BooksController extends Controller
{
    public function index()
    {
      $books = Books::with('authors')->paginate(10);
      return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        $authors = Authors::select('id', 'firstName', 'lastName')->get();
        return view('admin.books.create', compact('authors'));
    }

    public function store(StoreBooksRequest $request)
    {
      
      $validated = $request->validated();

      $input = [
        'name' => $request->input('name'),
        'author' => $request->input('author'),
        'year' => $request->input('year'),
      ];

      Books::create($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'New book record created');

      return redirect()->route('books.index');
    }

    public function show($id)
    {
      $book = Books::find($id);
      return view('admin.books.show', compact('book'));
    }

    public function edit($id)
    {
      $book = Books::find($id);
      $authors = Authors::select('id', 'firstName', 'lastName')->get();
      return view('admin.books.edit', compact(['book', 'authors']));
    }

    public function update(UpdateBooksRequest $request, $id)
    {

      $validated = $request->validated();

      $input = [
        'name' => $request->input('name'),
        'author' => $request->input('author'),
        'year' => $request->input('year'),
      ];

      $oldBookRecord = Books::find($id);
      $oldBookRecord->update($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Book record updated');

      return redirect()->route('books.index');
    }

    public function destroy($id)
    {
      $book = Books::find($id);
      $book->delete();

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Book record deleted');


      return redirect()->route('books.index');
    }
}
