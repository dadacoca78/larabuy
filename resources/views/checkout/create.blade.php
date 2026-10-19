@extends('layouts.app')

@section('content')
 <main class="max-w-7xl mx-auto px-6 py-16 grid gap-10 text-gray-800">
        <h1 class="text-2xl font-bold mb-4">Bestellung abschließen</h1>

        <form method="POST" action="{{ route('checkout.store') }}">
            @csrf

            <label class="block mb-2 font-semibold">Name:</label>
            <input type="text" name="customer_name" class="border w-full p-2 rounded mb-4" required>

            <label class="block mb-2 font-semibold">E-Mail:</label>
            <input type="email" name="customer_email" class="border w-full p-2 rounded mb-4" required>

            <p class="font-semibold mb-2">Gesamtbetrag: 
                {{ number_format(array_sum(array_map(fn($i)=>$i['price']*$i['quantity'],$cart)),2) }} €
            </p>

            <button type="submit" class="w-full bg-rose-600  text-white py-2 rounded">
                Bestellung aufgeben
            </button>
        </form>
    </div>
</body>
@endsection
</html>
