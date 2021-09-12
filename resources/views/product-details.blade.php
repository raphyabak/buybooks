@extends('layouts.main')
@section('body')
    <main class="my-8">
        {{-- <div class="container px-6 mx-auto">

    </div> --}}
        <!-- component -->
        @livewire('product-details', ['product' => $product], key($product->id))
    </main>

@endsection
