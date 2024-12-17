@extends('layouts.admin')

@section('title')
    Products
@endsection

@section('content-header')
    <h1>Products<small>Display all products</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Products</li>
    </ol>
@endsection

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Products</h3>
                </div>
            </div>
        </div>
    </div>
@endsection
