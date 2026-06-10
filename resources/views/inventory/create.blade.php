<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Inventory') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-gray-900">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('inventory.store') }}" method="POST">
                    @csrf 

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Kode</label>
                        <input type="text" name="kode" value="{{ old('kode') }}" class="w-full border rounded px-3 py-2">
                        @error('kode') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block font-medium mb-1">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="w-full border rounded px-3 py-2">
                        @error('nama') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block font-medium mb-1">Stok</label>
                            <input type="number" name="stok" value="{{ old('stok') }}" class="w-full border rounded px-3 py-2">
                            @error('stok') <div class="text-red-600 text-sm mt-1">{{ $message }}</div> @enderror
                        </div>
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Simpan</button>
                        <a href="{{ route('inventory.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>