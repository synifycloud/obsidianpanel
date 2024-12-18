@extends('layouts.admin')

@section('content')
<h1>Create Product</h1>

<form action="{{ route('admin.products.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control"></textarea>
    </div>

    <div class="form-group">
        <label for="nest_id">Nest ID</label>
        <input type="number" name="nest_id" id="nest_id" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Create Product</button>
</form>
@endsection
