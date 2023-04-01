<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;
use Illuminate\Http\Request;

// Form Requests
use App\Http\Requests\StoreAuthorsRequest;
use App\Http\Requests\UpdateAuthorsRequest;

// Models
use App\Authors;

use Session;

class AuthorsController extends Controller
{
    public function index()
    {
        $allauthors = Authors::select('id', 'firstName', 'lastName')->paginate(10);
        return view('admin.authors.index', compact('allauthors'));
    }

    public function create()
    {
      return view('admin.authors.create');
    }

    public function store(StoreAuthorsRequest $request)
    {
        $validated = $request->validated();

        $input = [
          'firstName' => $request->input('firstName'),
          'lastName' => $request->input('lastName')
        ];


        Authors::create($input);

        Session::flash('alert-class', 'alert-success');
        Session::flash('message', 'New Author record created');

        return redirect()->route('authors.index');
    }

    public function show($id)
    {
      $author = Authors::find($id);
      return view('admin.authors.show', compact('author'));
    }

    public function edit($id)
    {
        $author = Authors::find($id);
        return view('admin.authors.edit', compact('author'));
    }

    public function update(UpdateAuthorsRequest $request, $id)
    {
      $validated = $request->validated();

      $input = [
        'firstName' => $request->input('firstName'),
        'lastName' => $request->input('lastName')
      ];

      $oldAuthorRecord = Authors::find($id);
      $oldAuthorRecord->update($input);

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Author record updated');

      return redirect()->route('authors.index');
    }

    public function destroy($id)
    {
      $oldAuthorRecord = Authors::find($id);

      $oldAuthorRecord->delete();

      Session::flash('alert-class', 'alert-success');
      Session::flash('message', 'Author record deleted');

      return redirect()->route('authors.index');
    }
}
