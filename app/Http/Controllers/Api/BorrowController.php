<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Borrow;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Borrow::with('user', 'book')->get());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        $borrow = Borrow::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrowed_at' => $request->borrowed_at ?? now(),
            'returned_at' => $request->returned_at ?? null,
        ]);

        return response()->json($borrow->load('user', 'book'), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $borrow = Borrow::with('user', 'book')->findOrFail($id);
        return response()->json($borrow);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $borrow = Borrow::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_id' => 'required|exists:books,id',
            'borrowed_at' => 'nullable|date',
            'returned_at' => 'nullable|date|after_or_equal:borrowed_at',
        ]);

        $borrow->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrowed_at' => $request->borrowed_at ?? $borrow->borrowed_at,
            'returned_at' => $request->returned_at ?? $borrow->returned_at,
        ]);

        return response()->json($borrow->load('user', 'book'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $borrow = Borrow::findOrFail($id);
        $borrow->delete();

        return response()->json(null, 204);
    }
}
