@extends('layouts.admin')

@section('title')
    {{ $product->name }}
@endsection

@section('content-header')
    <h1>{{ $product->name }}<small>{{ $product->description }}</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li><a href="{{ route('admin.products') }}">Products</a></li>
        <li class="active">{{ $product->name }}</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Product List</h3>
                <div class="box-tools search01">
                    <form action="{{ route('admin.products') }}" method="GET">
                        <div class="input-group input-group-sm">
                            <input type="text" name="filter[*]" class="form-control pull-right" value="{{ request()->input()['filter']['*'] ?? '' }}" placeholder="Search Products">
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                <a href="{{ route('admin.products.new') }}"><button type="button" class="btn btn-sm btn-primary" style="border-radius: 0 3px 3px 0;margin-left:-1px;">Create New</button></a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>ID</th>
                            <th>Threads</th>
                            <th>Memory</th>
                            <th>Allocations</th>
                            <th>Databases</th>
                            <th>Backups</th>
                            <th>Storage</th>
                            <th>Egg ID</th>
                            <th>Price</th>
                        </tr>
                        @foreach ($product->options as $option)
                            <tr data-product="{{ $product->id }}">
                                <td><code>{{ $option->id }}</code></td>
                                <td>{{ $option->cpu_limit }}%</td>
                                <td>{{ $option->memory }}MB</td>
                                <td>{{ $option->allocation_limit }}</td>
                                <td>{{ $option->database_limit }}</td>
                                <td>{{ $option->backup_limit }}</td>
                                <td>{{ $option->storage }}MB</td>
                                <td>{{ $option->egg_id }}</td>
                                <td>£{{ number_format($option->price / 100, 2) }}</td>
                                <td>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"><button type="button" class="btn btn-xs btn-primary">Edit</button></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
