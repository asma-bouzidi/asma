@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Borrow Record</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('borrows.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="user_id">User:</label>
            <select name="user_id" id="user_id" class="form-control" required>
                <option value="">Select User</option>
                @foreach($users as $user)
                  <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="book_id">Book:</label>
            <select name="book_id" id="book_id" class="form-control" required>
                <option value="">Select Book</option>
                @foreach($books as $book)
                  <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>{{ $book->title }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group mb-3">
            <label for="borrowed_at">Borrowed At:</label>
            <input type="datetime-local" name="borrowed_at" id="borrowed_at" class="form-control" value="{{ old('borrowed_at') }}" required>
        </div>

        <div class="form-group mb-3">
            <label for="returned_at">Returned At (optional):</label>
            <input type="datetime-local" name="returned_at" id="returned_at" class="form-control" value="{{ old('returned_at') }}">
        </div>

        <button type="submit" class="btn btn-primary">Create Borrow Record</button>
        <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
