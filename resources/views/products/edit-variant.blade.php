<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Variante</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-slate-800">

    <div class="max-w-xl mx-auto p-6 mt-10">
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Cancelar</a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="bg-orange-500 px-6 py-4">
                <h1 class="text-xl font-bold text-white">Editar Variante</h1>
                <p class="text-orange-100 text-sm mt-1">
                    Producto: <span class="font-bold">{{ $product->name }}</span>
                </p>
            </div>

            <form action="{{ route('variants.update', $variant) }}" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT') <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Medida/Talle</label>
                        <input type="text" name="size" value="{{ $variant->size }}" required 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 p-2 border">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700">Color</label>
                        <input type="text" name="color" value="{{ $variant->color }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 p-2 border">
                    </div>
                    
                    <div class="bg-yellow-50 p-2 rounded border border-yellow-200 col-span-2 grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-800">Precio ($)</label>
                            <input type="number" name="price" value="{{ $variant->price }}" required step="0.01" 
                                   class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:border-orange-500 focus:ring-orange-500 p-2 border font-bold text-lg">
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-gray-800">Stock Actual</label>
                            <input type="number" name="stock" value="{{ $variant->stock }}" required 
                                   class="mt-1 block w-full rounded-md border-gray-400 shadow-sm focus:border-orange-500 focus:ring-orange-500 p-2 border font-bold text-lg">
                        </div>
                    </div>

                    <div class="col-span-2">
                        <label class="block text-sm font-medium text-gray-700">SKU</label>
                        <input type="text" name="sku" value="{{ $variant->sku }}" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-orange-500 focus:ring-orange-500 p-2 border">
                    </div>
                </div>

                <div class="pt-4">
                    <button type="submit" class="w-full bg-orange-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-orange-700 transition shadow-lg">
                        Actualizar Datos
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>