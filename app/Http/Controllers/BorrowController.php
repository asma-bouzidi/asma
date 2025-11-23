<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\User;
use App\Models\Book;

class BorrowController extends Controller
{
    public function index()
    {
        $borrows = Borrow::with('user','book')->get();
        return view('borrows.index', compact('borrows'));
    }

    public function create()
    {
        $users = User::all();
        $books = Book::all();
        return view('borrows.create', compact('users', 'books'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        Borrow::create($request->all());
        return redirect()->route('borrows.index')->with('success','Borrow record created successfully.');
    }

    public function show(string $id)
    {
        $borrow = Borrow::with('user', 'book')->findOrFail($id);
        return view('borrows.show', compact('borrow'));
    }

    public function edit(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $users = User::all();
        $books = Book::all();
        return view('borrows.edit', compact('borrow', 'users', 'books'));
    }

    public function update(Request $request, string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'required|date',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);
        $borrow->update($request->all());
        return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully.');
    }

    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();
        return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully.');
    }
}
