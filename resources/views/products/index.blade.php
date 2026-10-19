@extends('layouts.app')

@section('content')
 <main class="max-w-7xl mx-auto px-6 py-16 grid gap-10 text-gray-800">
        <h1 class="text-2xl font-bold mb-4">Produkte</h1>

        <a href="{{ route('products.create') }}" class="bg-rose-600 text-white px-3 py-2 rounded">+ Neues Produkt</a>

        @if(session('success'))
            <p class="text-green-600 mt-3">{{ session('success') }}</p>
        @endif
<table class="min-w-full table-auto text-gray-800">
      <thead class="bg-gray-100">
        <tr class="text-left text-gray-600 uppercase text-sm">
    
          <th class="px-6 py-3">Name</th>
          <th class="px-6 py-3">Preis</th>
          <th class="px-6 py-3 text-right">Aktionen</th>
        </tr>
      </thead>
      <tbody id="dataTable">
        <tr class="border-t hover:bg-gray-50">
        @forelse($products as $product)
          <td class="px-6 py-3">{{ $product->name }}</td>
          <td class="px-6 py-3">{{ number_format($product->price, 2) }} €</td>


          <td class="px-6 py-3 flex justify-end gap-2">
            <a href="{{ route('products.edit', $product) }}"class="text-gray-800" title="Bearbeiten">
              <span class="material-icons">edit</span>
                </a>
             <form method="POST" action="{{ route('products.destroy', $product) }}"><button class="text-red-600 hover:text-red-800" title="Löschen">
              @csrf @method('DELETE')<span class="material-icons">delete</span>
            </button></form>
          </td>
        </tr>
                        @empty
                <tr><td colspan="3" class="text-center p-4 text-gray-500">Keine Produkte vorhanden.</td></tr>
                @endforelse
      </tbody>
    </table>

    </div>
</body>
@endsection
</html>
