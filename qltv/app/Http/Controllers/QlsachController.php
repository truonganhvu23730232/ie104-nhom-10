<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class QlsachController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $books = Book::latest()->get();

        return view('qltv.qlsach.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('qltv.qlsach.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên sách',
            'name.max' => 'Tên sách không được quá 255 ký tự',
        ]);

        Book::create([
            'name' => $request->name,
        ]);

        return redirect()->route('qltv.qls');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book)
    {
        //
        return view('qltv.qlsach.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
        ], [
            'name.required' => 'Vui lòng nhập tên sách',
            'name.max' => 'Tên sách không được quá 255 ký tự',
        ]);

        $book->update([
            'name' => $request->name,
        ]);

        return redirect()->route('qltv.qls');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();

        return redirect()->route('qltv.qls');
    }
}
