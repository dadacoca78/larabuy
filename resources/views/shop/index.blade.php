
@extends('layouts.app')

@section('content')
 <main class="max-w-7xl mx-auto px-6 py-16 grid gap-10 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
    @forelse($products as $product)
        <div class="bg-sky-50 rounded-xl overflow-hidden shadow-lg hover:scale-105 transition-transform duration-200">
            @if($product->image)
                <img src="{{ asset('storage/'.$product->image) }}" alt="{{ $product->name }}" class="h-48 w-full object-cover rounded mb-3">
            @endif
			<div class="p-4">
            <h2 class="text-lg font-semibold text-gray-800">{{ $product->name }}</h2>
            <p class="text-gray-400 text-sm mt-1">{{ Str::limit($product->description, 80) }}</p>
			<div class="mt-4 flex justify-between items-center">
			  <span class="text-gray-800 font-bold text-lg">{{ number_format($product->price, 2) }} €</span>
			  <a href="{{ route('cart.add', $product) }}" class="bg-rose-600 text-white px-3 py-1 rounded flex items-center">
				<span class="material-icons cursor-pointer text-sm">shopping_cart</span>
			  </a>
			  </div>
			</div>
       
        </div>
    @empty
        <p class="col-span-4 text-center text-gray-500">Noch keine Produkte verfügbar.</p>
    @endforelse

@endsection
