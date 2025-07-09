<div>
    <button wire:click="create()" class="bg-green-500 text-white font-bold py-2 px-4 rounded mb-4">Tambah Data Orang Tua</button>
    @if(session()->has('message'))<div class="bg-green-100 border text-green-700 px-4 py-3 rounded mb-4">{{ session('message') }}</div>@endif
    @if($isModalOpen)
        <div class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
            <div class="bg-white rounded-lg p-6 w-1/3">
                <h2 class="text-xl font-bold mb-4">{{ $orangtua_id ? 'Edit Data' : 'Tambah Data Baru' }}</h2>
                <form wire:submit.prevent="store">
                    <div class="mb-4"><label for="nama">Nama Orang Tua:</label><input type="text" id="nama" wire:model="nama" class="shadow w-full border rounded py-2 px-3">@error('nama')<span class="text-red-500">{{$message}}</span>@enderror</div>
                    <div class="mb-4"><label for="siswa_id"> Nama Anak:</label><select id="siswa_id" wire:model="siswa_id" class="shadow w-full border rounded py-2 px-3"><option>-- Pilih Siswa --</option>@foreach($listSiswa as $s)<option value="{{$s->id}}">{{$s->nama}}</option>@endforeach</select>@error('siswa_id')<span class="text-red-500">{{$message}}</span>@enderror</div>
                    <div class="flex justify-end"><button type="button" wire:click="closeModal()" class="bg-gray-500 text-white font-bold py-2 px-4 rounded mr-2">Batal</button><button type="submit" class="bg-blue-500 text-white font-bold py-2 px-4 rounded">{{$orangtua_id?'Update':'Simpan'}}</button></div>
                </form>
            </div>
        </div>
    @endif
    <table class="min-w-full bg-white"><thead class="bg-gray-200"><tr><th class="py-3 px-4 text-left">#</th><th class="py-3 px-4 text-left">Nama Orang Tua</th><th class="py-3 px-4 text-left">Nama Siswa</th><th class="py-3 px-4 text-left">Aksi</th></tr></thead><tbody class="divide-y">@forelse($listOrangtua as $item)<tr><td class="py-3 px-4">{{$loop->iteration}}</td><td class="py-3 px-4">{{$item->nama}}</td><td class="py-3 px-4">{{$item->siswa->nama ?? 'N/A'}}</td><td class="py-3 px-4 flex gap-2"><button wire:click="edit({{$item->id}})" class="bg-blue-500 text-white font-bold py-1 px-2 rounded">Edit</button><div x-data="{showModal:false,itemId:null}"><button @click="showModal=true;itemId={{$item->id}};" class="bg-red-500 text-white font-bold py-1 px-2 rounded">Hapus</button><div x-show="showModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50"@click.away="showModal=false"><div class="bg-white rounded-lg p-6 w-1/3"><h2 class="text-lg font-bold mb-4">Konfirmasi</h2><p class="mb-4">Anda yakin?</p><div class="flex justify-end"><button @click="showModal=false" class="bg-gray-300 font-bold py-2 px-4 rounded mr-2">Batal</button><button wire:click="delete(itemId)"@click="showModal=false"class="bg-red-500 text-white font-bold py-2 px-4 rounded">Ya, Hapus</button></div></div></div></div></td></tr>@empty<tr><td colspan="4" class="text-center py-4">Data belum ada.</td></tr>@endforelse</tbody></table>
</div>
