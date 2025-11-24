<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Stock</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="bg-gray-50 text-slate-800">

    <nav class="bg-white border-b border-gray-200 px-4 py-2.5 shadow-sm sticky top-0 z-50">
        <div class="flex flex-wrap justify-between items-center mx-auto max-w-screen-xl">
            <span class="self-center text-xl font-semibold whitespace-nowrap text-blue-600">
                📦 Stock
            </span>
            <div class="flex items-center lg:order-2">
                <a href="{{ route('products.create') }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 mr-2 focus:outline-none">
                    + Nuevo Producto
                </a>
            </div>
        </div>
    </nav>

    <div class="max-w-screen-xl mx-auto p-4 mt-6">
        
        <h1 class="text-2xl font-bold mb-6 text-gray-800 border-l-4 border-blue-600 pl-3">
            Listado de Productos
        </h1>

        @foreach ($products as $product)
            <div class="bg-white rounded-lg shadow-md overflow-hidden mb-8 border border-gray-100">
                
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-100 flex justify-between items-center">
                    <div>
                        <h2 class="text-xl font-bold text-gray-800">{{ $product->name }}</h2>
                        <p class="text-sm text-gray-500">{{ $product->description }}</p>
                    </div>
                    <div class="flex items-center gap-3">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded border border-blue-400">
                            {{ $product->variants->count() }} Variantes
                        </span>
                        
                        <a href="{{ route('products.createVariant', $product) }}" 
                        class="text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-xs px-3 py-1.5 focus:outline-none flex items-center gap-1">
                            <span>+</span> Agregar Talle/Color
                        </a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3">Medida</th>
                                <th scope="col" class="px-6 py-3">Color/Detalle</th>
                                <th scope="col" class="px-6 py-3">Precio</th>
                                <th scope="col" class="px-6 py-3">Stock</th>
                                <th scope="col" class="px-6 py-3">SKU</th>
                                <th scope="col" class="px-6 py-3 text-right">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($product->variants as $variant)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $variant->size }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $variant->color ?? '-' }}
                                    <span class="text-xs text-gray-400 block">{{ $variant->material }}</span>
                                </td>
                                <td class="px-6 py-4 font-bold text-gray-700">
                                    ${{ number_format($variant->price, 0, ',', '.') }}
                                </td>
                                <td class="px-6 py-4">
                                    @if($variant->stock <= $variant->stock_alert)
                                        <span class="bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded border border-red-400">
                                            ⚠️ Solo {{ $variant->stock }}
                                        </span>
                                    @else
                                        <span class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded border border-green-400">
                                            {{ $variant->stock }} u.
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 font-mono text-xs text-gray-500">
                                    {{ $variant->sku }}
                                </td>
                                <td class="px-6 py-4 text-right">
                                    <a href="{{ route('variants.edit', $variant) }}" class="font-medium text-blue-600 hover:underline">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
        @endforeach

        @if($products->isEmpty())
            <div class="text-center py-10 text-gray-500">
                <p>Todavía no cargaste ningún producto.</p>
            </div>
        @endif

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>
</body>
</html>