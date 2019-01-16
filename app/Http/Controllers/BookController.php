<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Search\BookSearch;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::orderBy('id', 'desc')->get();

        $data = [
            'title' => 'My books',
            'books' => $books,
            'searchFields' => ['name'=>null, 'edition'=>null, 'cost'=>null, 'pages'=>null],
        ];

        return view('books.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'New Book',
        ];

        return view('books.new', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'edition' => 'required',
            'pages' => 'required',
            'cost' => 'required',
        ]);

        $book = New Book;
            $book->name = $request['name'];
            $book->edition = $request['edition'];
            $book->cost = $request['cost'];
            $book->pages = $request['pages'];
        $book->save();

        return \Redirect::to('/books')->with('message', 'Book was added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $id)
    {
        $data = [
            'title' => 'Book Details',
            'book' => $id,
        ];

        return view('books.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $id)
    {
        $data = [
            'title' => 'Edit Book Details',
            'book' => $id,
        ];

        return view('books.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'edition' => 'required',
            'pages' => 'required',
            'cost' => 'required',
        ]);

        $book = Book::findorFail($id);
            $book->name = $request['name'];
            $book->edition = $request['edition'];
            $book->cost = $request['cost'];
            $book->pages = $request['pages'];
        $book->update();

        return \Redirect::to('/books')->with('message', 'Book was updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $id)
    {
        $id->delete();

        return \Redirect::to('/books')->with('message', 'Book was deleted successfully');
    }

    /**
     * Search the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function searchBook(Request $request)
    {
        $books = BookSearch::apply($request);

        $data = [
            'title' => 'Book Search Result',
            'books' => $books,
            'searchFields' => $request->all()
        ];

        return view('books.index', $data);
    }
}
