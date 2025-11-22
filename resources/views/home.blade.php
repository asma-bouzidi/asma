@extends('layouts.app')

@section('content')
<div class="text-center py-12">
    <h1 class="text-4xl font-bold text-gray-800 mb-4">Welcome to Library Management System</h1>
    <p class="text-lg text-gray-600 mb-8">Manage your library's authors, categories, books, and borrowing records efficiently.</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-blue-600 mb-2">Authors</h2>
            <p class="text-gray-600 mb-4">Manage book authors</p>
            <a href="{{ route('authors.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">View Authors</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-green-600 mb-2">Categories</h2>
            <p class="text-gray-600 mb-4">Organize books by categories</p>
            <a href="{{ route('categories.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">View Categories</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-purple-600 mb-2">Books</h2>
            <p class="text-gray-600 mb-4">Browse and manage books</p>
            <a href="{{ route('books.index') }}" class="bg-purple-500 text-white px-4 py-2 rounded hover:bg-purple-600">View Books</a>
        </div>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-red-600 mb-2">Borrows</h2>
            <p class="text-gray-600 mb-4">Track book borrowing</p>
            <a href="{{ route('borrows.index') }}" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">View Borrows</a>
        </div>
    </div>
</div>
@endsection
