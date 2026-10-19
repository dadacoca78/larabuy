@extends('layouts.app')

@section('content')
 <main class="max-w-7xl mx-auto px-6 py-16 grid gap-10 text-gray-800">

        <h1 class="text-2xl font-bold mb-4"> Produkt bearbeiten</h1>

        <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="border rounded w-full mb-4 p-2" required>

            <label class="block mb-2 font-semibold">Beschreibung:</label>
            <textarea name="description" class="border rounded w-full mb-4 p-2" rows="3">{{ $product->description }}</textarea>

            <label class="block mb-2 font-semibold">Preis (€):</label>
            <input type="number" name="price" step="0.01" value="{{ $product->price }}" class="border rounded w-full mb-4 p-2" required>

            @if($product->image)
                <p class="mb-2">Aktuelles Bild:</p>
                <img src="{{ asset('storage/' . $product->image) }}" class="h-32 mb-4 rounded border">
            @endif

            <label class="block mb-2 font-semibold">Neues Bild (optional):</label>
            <input type="file" name="image" class="border rounded w-full mb-4 p-2">

            <div class="flex justify-between">
                <a href="{{ route('products.index') }}" class="text-gray-500 hover:underline">← Zurück</a>
                <button type="submit" class="bg-rose-600 text-white px-4 py-2 rounded">Aktualisieren</button>
            </div>
        </form>
    </div>
</body>
@endsection
</html>
