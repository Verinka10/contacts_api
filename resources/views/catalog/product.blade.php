@extends('layouts.app')


<h3>Test products ({{ $db }})</h3>
@section('content')
    @foreach ($products as $product)
            <div>{{ $product }}</div>
    @endforeach 
@endsection

