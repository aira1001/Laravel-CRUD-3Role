<!doctype html>
{{-- <link href="{{ asset('css/signin.css') }}" rel="stylesheet"> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{-- {{ __('Dashboard') }} --}}
            {{ __('List Project') }}
        </h2>
    </x-slot>
    <div class="container-fluid">
        @if (Session::get('success', false))
            <?php $data = Session::get('success'); ?>
            <div class="alert alert-success" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @elseif (Session::get('warning', false))
            <?php $data = Session::get('warning'); ?>

            <div class="alert alert-warning" role="alert">
                <i class="fa fa-check"></i>
                {{ $data }}
            </div>
        @endif
    </div>

    <body>
        <main class="m-5">
            <div class="container">
                <a href="/project/create" class="btn btn-primary mb-4">Add Project</a>
                <div class="row row-cols-4">
                    @foreach ($project as $listproject)
                        <div class="col">
                            <div class="card mb-4">
                                <img src="https://source.unsplash.com/1600x900/?web-development" class="card-img-top"
                                    alt="image">
                                <div class="d-flex">
                                    <span
                                        class="me-auto p-2 badge {{ $listproject->status ? 'text-bg-success' : 'text-bg-danger' }}"
                                        style="width: 60px; margin: 5px; height: 25px;">{{ $listproject->status ? 'success' : 'false' }}
                                    </span>
                                    <?php $userRole = Auth::user()->id_role; ?>
                                    @if ($userRole != 1)
                                        <a class="p-2 bi bi-trash text-danger" style="font-size: 20px"
                                            data-bs-toggle="modal" data-bs-target="#DeleteModal"></a>
                                        <a class="p-2 bi bi-pencil-square text-primary" style="font-size: 20px"
                                            href="{{ route('project.edit', $listproject->id_project) }}"></a>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title fw-bold">{{ $listproject->nama }}</h5>
                                    <p class="card-text text-break">{{ $listproject->keterangan }}.</p>
                                    {{-- <a href="#" class="btn btn-primary">Go somewhere</a> --}}
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="DeleteModal" tabindex="-1" aria-labelledby="DeleteModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="DeleteModalLabel">Delete Project</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are You Sure Want to Delete this Project ?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">No</button>
                                        <form action="{{ route('project.destroy', $listproject->id_project) }}"
                                            method="POST">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-primary">Yes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </main>

    </body>

</x-app-layout>
