<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Manajemen Inventory') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

             @if(session('success'))
                <div class="mb-4 p-4 text-green-700 rounded" style="background-color: #b6ffa9">
                    {{ session('success') }}
                </div> 
            @endif

            @if(session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                    {{ session('error') }}
                </div> 
            @endif

            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-bold text-gray-800">Daftar Inventory</h3>
                    <a href="{{ route('inventory.create') }}" class="px-4 py-2 text-white rounded hover:bg-blue-700"  style="background-color: #4f75ff">
                        Tambah Inventory
                    </a>
                </div>

                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="text-center"  style="background-color: #f9d9b9">
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Kode</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Stok</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($Inventory as $index => $item)
                            <tr class="text-center">
                                <td class="border px-4 py-2">{{ $Inventory->firstItem() + $index }}</td>
                                <td class="border px-4 py-2">{{ $item->kode }}</td>
                                <td class="border px-4 py-2 text-left">{{ $item->nama }}</td>
                                <td class="border px-4 py-2">{{ $item->stok }}</td>
                                <td class="border px-4 py-2">
                                    <div class="flex justify-center gap-2">
                                        <a href="{{ route('inventory.edit', $item->id) }}" class="px-3 py-1 text-white rounded" style="background-color: #fae100">
                                        Edit
                                        </a>

                                        
                                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin mau hapus?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-1 text-white rounded text-sm" style="background-color: #ff4f4f">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="border px-4 py-2 text-center text-red-500">Data barang kosong.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                
                <div class="mt-4">
                    {{ $Inventory->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>