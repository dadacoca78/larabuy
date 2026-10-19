@extends('layouts.app')
 
@section('content')
     <main class="max-w-7xl mx-auto px-6 py-16 grid gap-10">
        <h1 class="text-2xl font-bold mb-4 text-gray-800"><span class="material-icons cursor-pointer text-2xl">shopping_cart</span> Dein Warenkorb</h1>

        @if(session('success'))
            <p class="text-gray-800 mb-3">{{ session('success') }}</p>
        @endif

        @if(empty($cart))
            <p class="text-gray-800 text-center">Dein Warenkorb ist leer.</p>
        @else
            <table class="w-full mb-4 border text-gray-800">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="p-2 text-left">Produkt</th>
                        <th class="p-2 text-left">Menge</th>
                        <th class="p-2 text-left">Preis</th>
                        <th class="p-2 text-left">Aktion</th>
                    </tr>
                </thead>
                <tbody>
                    @php $sum = 0; @endphp
                    @foreach($cart as $id => $item)
                        @php $sum += $item['price'] * $item['quantity']; @endphp
                        <tr class="border-t">
                            <td class="p-2 flex items-center">
                                @if($item['image'])
                                    <img src="{{ asset('storage/'.$item['image']) }}" class="h-12 w-12 object-cover rounded mr-3">
                                @endif
                                {{ $item['name'] }}
                            </td>
                            <td class="p-2">{{ $item['quantity'] }}</td>
                            <td class="p-2">{{ number_format($item['price'], 2) }} €</td>
                            <td class="p-2">
                                <a href="{{ route('cart.remove', $id) }}" class="text-red-500">Entfernen</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class="flex justify-between items-center text-gray-900">
                <strong class="text-xl">Gesamt: {{ number_format($sum, 2) }} €</strong>
                <div>
                <a href="{{ route('cart.clear') }}" class="bg-rose-600 text-white px-4 py-2 rounded mr-2">Leeren</a>
                <a href="{{ route('checkout.create') }}" class="bg-rose-600 text-white px-4 py-2 rounded mr-2">Zur Kasse</a>
                <a href="{{ route('shop.index') }}" class="bg-gray-900 text-white px-4 py-2 rounded">Weiter einkaufen</a>
                </div>
            </div>
        @endif
 
</body>

</html>
@endsection
