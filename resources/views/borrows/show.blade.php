@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrow Record Details</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td>{{ $borrow->id }}</td>
        </tr>
        <tr>
            <th>User</th>
            <td>{{ $borrow->user->name }}</td>
        </tr>
        <tr>
            <th>Book</th>
            <td>{{ $borrow->book->title }}</td>
        </tr>
        <tr>
            <th>Borrowed At</th>
            <td>{{ $borrow->borrowed_at }}</td>
        </tr>
        <tr>
            <th>Returned At</th>
            <td>{{ $borrow->returned_at ?? 'Not returned' }}</td>
        </tr>
        <tr>
            <th>Created At</th>
            <td>{{ $borrow->created_at }}</td>
        </tr>
        <tr>
            <th>Updated At</th>
            <td>{{ $borrow->updated_at }}</td>
        </tr>
    </table>

    <a href="{{ route('borrows.index') }}" class="btn btn-secondary">Back to Borrow List</a>
    <a href="{{ route('borrows.edit', $borrow->id) }}" class="btn btn-warning">Edit Borrow Record</a>
</div>
@endsection
