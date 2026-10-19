
@extends('layouts.app')

@section('content')
        <h1 class="text-3xl font-bold text-green-600 mb-4">✅ Bestellung erfolgreich!</h1>
        <p class="mb-3">Danke, {{ $validated['customer_name'] }}!</p>
        <p>Eine Bestätigung wurde an <strong>{{ $validated['customer_email'] }}</strong> gesendet.</p>
        <p class="mt-4 text-xl font-semibold">Gesamt: {{ number_format($total, 2) }} €</p>
        <a href="{{ route('shop.index') }}" class="inline-block mt-6 bg-blue-500 text-white px-4 py-2 rounded">
            Weiter einkaufen
        </a>
    </div>
</body>
@endsection
</html>
