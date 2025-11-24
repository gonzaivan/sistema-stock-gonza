<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Variante</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-slate-800">

    <div class="max-w-xl mx-auto p-6 mt-10">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Cancelar</a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="bg-green-600 px-6 py-4">
                <h1 class="text-xl font-bold text-white">Agregar Variante</h1>
                <p class="text-green-100 text-sm mt-1">
                    Sumando opciones a: <span class="font-bold underline">{{ $product->name }}</span>
                </p>
            </div>

            <form action="{{ route('products.storeVariant', $product) }}" method="POST" class="p-6 space-y-4">
                @csrf

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Medida/Talle *</label>
                        <input type="text" name="size" required placeholder="Ej: Twin" autofocus
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Color</label>
                        <input type="text" name="color" placeholder="Ej: Rojo" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Precio ($) *</label>
                        <input type="number" name="price" required step="0.01" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Stock Inicial *</label>
                        <input type="number" name="stock" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 p-2 border">
                    </div>
                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">SKU (Opcional)</label>
                        <input type="text" name="sku" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500 p-2 border">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-green-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-green-700 transition shadow-lg">
                        + Agregar esta Variante
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>