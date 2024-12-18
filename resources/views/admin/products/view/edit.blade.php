@extends('layouts.admin')

@section('content')
<h1>Edit Product: {{ $product->name }}</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST">
    @csrf
    @method('PUT')

    <!-- Product Information -->
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $product->name }}" required>
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
    </div>

    <div class="form-group">
        <label for="nest_id">Nest ID</label>
        <input type="number" name="nest_id" id="nest_id" class="form-control" value="{{ $product->nest_id }}" required>
    </div>

    <!-- Options -->
    <h3>Options</h3>
    <div id="options">
        @foreach ($product->options as $index => $option)
            <div class="option mb-3 border p-3">
                <h4>Option #{{ $index + 1 }}</h4>
                <input type="hidden" name="options[{{ $index }}][id]" value="{{ $option->id }}">

                <div class="form-group">
                    <label for="memory_{{ $index }}">Memory (MB)</label>
                    <input type="number" name="options[{{ $index }}][memory]" id="memory_{{ $index }}" class="form-control" value="{{ $option->memory }}" required>
                </div>

                <div class="form-group">
                    <label for="cpu_limit_{{ $index }}">CPU Limit (%)</label>
                    <input type="number" name="options[{{ $index }}][cpu_limit]" id="cpu_limit_{{ $index }}" class="form-control" value="{{ $option->cpu_limit }}" required>
                </div>

                <div class="form-group">
                    <label for="allocation_limit_{{ $index }}">Allocation Limit</label>
                    <input type="number" name="options[{{ $index }}][allocation_limit]" id="allocation_limit_{{ $index }}" class="form-control" value="{{ $option->allocation_limit }}" required>
                </div>

                <div class="form-group">
                    <label for="database_limit_{{ $index }}">Database Limit</label>
                    <input type="number" name="options[{{ $index }}][database_limit]" id="database_limit_{{ $index }}" class="form-control" value="{{ $option->database_limit }}" required>
                </div>

                <div class="form-group">
                    <label for="backup_limit_{{ $index }}">Backup Limit</label>
                    <input type="number" name="options[{{ $index }}][backup_limit]" id="backup_limit_{{ $index }}" class="form-control" value="{{ $option->backup_limit }}" required>
                </div>

                <div class="form-group">
                    <label for="storage_{{ $index }}">Storage (MB)</label>
                    <input type="number" name="options[{{ $index }}][storage]" id="storage_{{ $index }}" class="form-control" value="{{ $option->storage }}" required>
                </div>

                <div class="form-group">
                    <label for="egg_id_{{ $index }}">Egg ID</label>
                    <input type="number" name="options[{{ $index }}][egg_id]" id="egg_id_{{ $index }}" class="form-control" value="{{ $option->egg_id }}" required>
                </div>

                <div class="form-group">
                    <label for="price_{{ $index }}">Price</label>
                    <input type="number" name="options[{{ $index }}][price]" id="price_{{ $index }}" class="form-control" value="{{ $option->price }}" required>
                </div>

                <button type="button" class="btn btn-danger remove-option" data-index="{{ $index }}">Remove Option</button>
            </div>
        @endforeach
    </div>

    <button type="button" id="add-option" class="btn btn-secondary">Add Option</button>
    <br><br>

    <button type="submit" class="btn btn-primary">Update Product</button>
</form>

<script>
    let optionIndex = {{ $product->options->count() }};

    // Add new option dynamically
    document.getElementById('add-option').addEventListener('click', function () {
        const optionsDiv = document.getElementById('options');
        const newOption = `
            <div class="option mb-3 border p-3">
                <h4>Option #${optionIndex + 1}</h4>

                <div class="form-group">
                    <label for="memory_${optionIndex}">Memory (MB)</label>
                    <input type="number" name="options[${optionIndex}][memory]" id="memory_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="cpu_limit_${optionIndex}">CPU Limit (%)</label>
                    <input type="number" name="options[${optionIndex}][cpu_limit]" id="cpu_limit_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="allocation_limit_${optionIndex}">Allocation Limit</label>
                    <input type="number" name="options[${optionIndex}][allocation_limit]" id="allocation_limit_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="database_limit_${optionIndex}">Database Limit</label>
                    <input type="number" name="options[${optionIndex}][database_limit]" id="database_limit_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="backup_limit_${optionIndex}">Backup Limit</label>
                    <input type="number" name="options[${optionIndex}][backup_limit]" id="backup_limit_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="storage_${optionIndex}">Storage (MB)</label>
                    <input type="number" name="options[${optionIndex}][storage]" id="storage_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="egg_id_${optionIndex}">Egg ID</label>
                    <input type="number" name="options[${optionIndex}][egg_id]" id="egg_id_${optionIndex}" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="price_${optionIndex}">Price</label>
                    <input type="number" name="options[${optionIndex}][price]" id="price_${optionIndex}" class="form-control" required>
                </div>

                <button type="button" class="btn btn-danger remove-option" data-index="${optionIndex}">Remove Option</button>
            </div>`;
        optionsDiv.insertAdjacentHTML('beforeend', newOption);
        optionIndex++;
    });

    // Remove option dynamically
    document.getElementById('options').addEventListener('click', function (event) {
        if (event.target.classList.contains('remove-option')) {
            const optionElement = event.target.closest('.option');
            optionElement.remove();
        }
    });
</script>
@endsection
