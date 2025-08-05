<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-6">
                <h3 class="text-xl font-bold mb-2 text-gray-700">👋 Selamat datang, Admin!</h3>
                <p class="text-gray-600 mb-6">Kelola produk lempeng singkong milik sendiri atau para Mitra dari halaman ini.</p>

                <!-- Tambah Produk -->
                <div class="bg-blue-100 rounded p-5 mb-8 border">
                    <h4 class="text-lg font-semibold mb-4">➕ Tambah Produk Baru</h4>
                    <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="name" :value="'Nama Produk'" />
                                <x-text-input name="name" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="price" :value="'Harga (Rp)'" />
                                <x-text-input type="number" name="price" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="stock" :value="'Stok'" />
                                <x-text-input type="number" name="stock" class="w-full" />
                            </div>
                            <div>
                                <x-input-label for="wa" :value="'Nomor WhatsApp Mitra'" />
                                <x-text-input type="text" name="wa" class="w-full" placeholder="contoh: 081234567890" />
                            </div>
                            <div>
                                <x-input-label for="user_id" :value="'Pilih Mitra (Pemilik Produk)'" />
                                <select name="user_id" class="w-full border-gray-300 rounded-md shadow-sm">
                                    <option value="">Admin (Sendiri)</option>
                                    @foreach($mitras as $mitra)
                                        <option value="{{ $mitra->id }}">{{ $mitra->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div>
                                <x-input-label for="image" :value="'Gambar Produk'" />
                                <x-text-input type="file" name="image" class="w-full" />
                            </div>
                        </div>
                        <div>
                            <x-input-label for="description" :value="'Deskripsi'" />
                            <textarea name="description" rows="3" class="w-full border-gray-300 rounded-md shadow-sm"></textarea>
                        </div>
                        <div>
                            <x-primary-button>Tambah Produk</x-primary-button>
                        </div>
                    </form>
                </div>

                <!-- Tambah Mitra -->
                <div class="bg-green-100 rounded p-5 mb-8 border">
                    <h4 class="text-lg font-semibold mb-4">👤 Tambah Akun Mitra</h4>
                    <form method="POST" action="{{ route('admin.mitra.store') }}" class="space-y-4">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="name" :value="'Nama Lengkap Mitra'" />
                                <x-text-input name="name" class="w-full" required />
                            </div>
                            <div>
                                <x-input-label for="email" :value="'Email Mitra'" />
                                <x-text-input type="email" name="email" class="w-full" required />
                            </div>
                            <div>
                                <x-input-label for="password" :value="'Password Sementara'" />
                                <x-text-input type="password" name="password" class="w-full" required />
                            </div>
                        </div>
                        <div>
                            <x-primary-button>Tambah Mitra</x-primary-button>
                        </div>
                    </form>
                </div>

                @if(session('success'))
                    <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Daftar Produk -->
               <!-- Tombol Toggle -->
<div class="flex gap-4 mb-4">
    <button onclick="toggleProduk('admin')" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Daftar Produk Admin</button>
    <button onclick="toggleProduk('mitra')" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Daftar Produk Mitra</button>
</div>

<!-- Produk Admin -->
<div id="produk-admin" style="display: none;">
    <h4 class="text-md font-semibold mb-3 text-blue-700">📦 Produk Milik Admin</h4>

    @if(session('success') && session('from') === 'admin')
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($productsAdmin as $product)
            <div class="bg-grey border rounded-lg shadow p-5">
                <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $product->name }}" class="text-lg font-bold w-full" />

                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover rounded mb-2" alt="{{ $product->name }}">
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label :value="'Harga (Rp)'" />
                            <x-text-input type="number" name="price" value="{{ $product->price }}" class="w-full" />
                        </div>
                        <div>
                            <x-input-label :value="'Stok'" />
                            <x-text-input type="number" name="stock" value="{{ $product->stock }}" class="w-full" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label :value="'Nomor WhatsApp'" />
                            <x-text-input type="text" name="wa" value="{{ $product->wa }}" class="w-full" />
                        </div>
                    </div>

                    <div>
                        <x-input-label :value="'Deskripsi'" />
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <x-input-label :value="'Ubah Gambar (Opsional)'" />
                    <x-text-input type="file" name="image" class="w-full" />

                    <div class="flex justify-between items-center mt-4">
                        <x-primary-button>Simpan</x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Hapus produk ini?')" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>Hapus</x-danger-button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 col-span-2">Tidak ada produk admin.</p>
        @endforelse
    </div>
</div>

<!-- Produk Mitra -->
<div id="produk-mitra" style="display: none;">
    <h4 class="text-md font-semibold mb-3 text-green-700">📦 Produk Mitra</h4>

    @if(session('success') && session('from') === 'mitra')
        <div class="mb-4 text-green-700 bg-green-100 border border-green-300 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @forelse($productsMitra as $product)
            <div class="bg-grey border rounded-lg shadow p-5">
                <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data" class="space-y-3">
                    @csrf
                    @method('PUT')

                    <input type="text" name="name" value="{{ $product->name }}" class="text-lg font-bold w-full" />

                    <p class="text-sm text-gray-500">👤 Mitra: <strong>{{ $product->user->name }}</strong></p>

                    @if ($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-48 object-cover rounded mb-2" alt="{{ $product->name }}">
                    @endif

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label :value="'Harga (Rp)'" />
                            <x-text-input type="number" name="price" value="{{ $product->price }}" class="w-full" />
                        </div>
                        <div>
                            <x-input-label :value="'Stok'" />
                            <x-text-input type="number" name="stock" value="{{ $product->stock }}" class="w-full" />
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <x-input-label :value="'Nomor WhatsApp'" />
                            <x-text-input type="text" name="wa" value="{{ $product->wa }}" class="w-full" />
                        </div>
                    </div>

                    <div>
                        <x-input-label :value="'Deskripsi'" />
                        <textarea name="description" class="w-full border-gray-300 rounded-md shadow-sm" rows="3">{{ $product->description }}</textarea>
                    </div>

                    <x-input-label :value="'Ubah Gambar (Opsional)'" />
                    <x-text-input type="file" name="image" class="w-full" />

                    <div class="flex justify-between items-center mt-4">
                        <x-primary-button>Simpan</x-primary-button>
                    </div>
                </form>

                <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}" onsubmit="return confirm('Hapus produk ini?')" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <x-danger-button>Hapus</x-danger-button>
                </form>
            </div>
        @empty
            <p class="text-gray-500 col-span-2">Tidak ada produk mitra.</p>
        @endforelse
    </div>
</div>

<!-- Script Toggle -->
<script>
    function toggleProduk(tipe) {
        document.getElementById('produk-admin').style.display = 'none';
        document.getElementById('produk-mitra').style.display = 'none';

        if (tipe === 'admin') {
            document.getElementById('produk-admin').style.display = 'block';
        } else if (tipe === 'mitra') {
            document.getElementById('produk-mitra').style.display = 'block';
        }
    }
</script>
</div> <!-- Tutup .p-6 -->
</div> <!-- Tutup .max-w-7xl -->
</div> <!-- Tutup .py-10 -->
</x-app-layout>
