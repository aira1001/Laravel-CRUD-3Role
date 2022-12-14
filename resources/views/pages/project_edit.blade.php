<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            {{ __('Edit Project') }}
        </h2>
    </x-slot>

    <main class="my-5 mx-auto" style="width: 700px">
        <form method="POST" action="{{ route('project.update', $project->id_project) }}">
            @method('put')
            @csrf
            <div class="card p-5">
                <div class="mb-3">
                    <label for="nama-project" class="form-label">Nama Project</label>
                    <input name="nama" type="text" class="form-control" id="inputNama"
                        placeholder="masukkan nama project" value="{{ $project->nama }}">
                    @error('nama')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ket-project" class="form-label">keterangan</label>
                    <textarea name="keterangan" class="form-control" id="inputKet" placeholder="masukkan keterangan">{{ $project->keterangan }}</textarea>
                    @error('keterangan')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3 form-check">
                    <label for="status-project">status</label>
                    <input name="status" type="checkbox" class="form-check-input" id="exampleCheck1" @checked? value=1>
                    @error('status')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Edit</button>
            </div>

        </form>
    </main>
</x-app-layout>
