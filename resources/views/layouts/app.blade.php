<!DOCTYPE html>
<html lang="de">
   <head>
      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>{{ $title ?? 'LaraBuy' }}</title>
      <script src="https://cdn.tailwindcss.com"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
   </head>
   <body class="bg-gray-200 text-gray-100">
      <header class="bg-gray-900 border-b border-gray-800 sticky top-0 z-50 text-gray-400">
         <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-4">
            <h1 class="text-2xl font-bold text-white"><a href="{{ route('shop.index') }}" class="font-bold text-xl"><span class="material-icons text-4xl ">storefront</span></a></h1>
            <div class="flex items-center space-x-4">
               <a href="{{ route('products.index') }}"><span class="material-icons cursor-pointer">person_outline</span></a>
               <a href="{{ route('cart.index') }}"><span class="material-icons cursor-pointer">shopping_cart</span></a>
            </div>
         </div>
      </header>
      <section class="bg-rose-600 py-24 text-center">
         <div class="max-w-2xl mx-auto">
            <h2 class="text-5xl font-extrabold mb-4">Shop</h2>
            <p class="text-gray-300 mb-8 text-lg">Neue Kollektion 2025</p>
            <a href="#" class="bg-gray-900 text-white px-8 py-3 rounded-lg text-lg font-semibold inline-flex items-center">
            <span class="material-icons mr-2">shopping_bag</span> Jetzt entdecken
            </a>
         </div>
      </section>
      @yield('content')
      </main>
      <footer class="bg-gray-900 border-t border-gray-800 text-gray-400 text-sm text-center py-8">
         <p>© {{ date('Y') }}LaraBuy</p>
      </footer>
   </body>
</html>
