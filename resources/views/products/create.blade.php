<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo Producto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-slate-800">

    <div class="max-w-2xl mx-auto p-6 mt-10">
        
        <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline mb-4 inline-block">&larr; Volver al listado</a>

        <div class="bg-white rounded-lg shadow-lg overflow-hidden border border-gray-200">
            <div class="bg-blue-600 px-6 py-4">
                <h1 class="text-xl font-bold text-white">Nuevo Producto</h1>
                <p class="text-blue-100 text-sm">Carga el producto general y su primera variante.</p>
            </div>

            <form action="{{ route('products.store') }}" method="POST" class="p-6 space-y-6">
                @csrf <div>
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">1. Concepto General</h3>
                    <div class="grid grid-cols-1 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre del Producto *</label>
                            <input type="text" name="name" required placeholder="Ej: Juego de Sábanas Hotelera" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Descripción</label>
                            <textarea name="description" rows="2" placeholder="Detalles generales..." 
                                      class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border"></textarea>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4 rounded-md border border-gray-200">
                    <h3 class="text-lg font-semibold text-gray-700 border-b pb-2 mb-4">2. Detalles de la Primera Variante</h3>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Medida/Talle *</label>
                            <input type="text" name="size" required placeholder="Ej: King Size" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Color</label>
                            <input type="text" name="color" placeholder="Ej: Blanco" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Precio de Venta ($) *</label>
                            <input type="number" name="price" required step="0.01" placeholder="15000" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Stock Inicial *</label>
                            <input type="number" name="stock" required placeholder="10" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Código (SKU)</label>
                            <input type="text" name="sku" placeholder="Ej: SAB-KING-001" 
                                   class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 p-2 border">
                        </div>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg">
                        💾 Guardar Producto
                    </button>
                </div>

            </form>
        </div>
    </div>

</body>
</html>