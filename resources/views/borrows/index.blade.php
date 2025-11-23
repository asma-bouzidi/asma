@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrow Records</h1>

    <a href="{{ route('borrows.create') }}" class="btn btn-primary mb-3">Create New Borrow</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if($borrows->isEmpty())
        <p>No borrow records found.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User</th>
                    <th>Book</th>
                    <th>Borrowed At</th>
                    <th>Returned At</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrows as $borrow)
                    <tr>
                      <td>{{ $borrow->id }}</td>
                      <td>{{ $borrow->user->name }}</td>
                      <td>{{ $borrow->book->title }}</td>
                      <td>{{ $borrow->borrowed_at }}</td>
                      <td>{{ $borrow->returned_at ?? 'Not returned' }}</td>
                      <td>
                        <a href="{{ route('borrows.show', $borrow->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('borrows.destroy', $borrow->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
