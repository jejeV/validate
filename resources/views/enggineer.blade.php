@extends('layouts.main')

@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: Weekly Top Products -->
            <div class="col-span-12 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        Site Location
                    </h2>
                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn box flex items-center text-slate-600 dark:text-slate-300" href="javascript:;"
                            data-tw-toggle="modal" data-tw-target="#add-modal"> <i data-feather="plus"
                                class="hidden sm:block w-4 h-4 mr-2"></i> Add Site
                        </button>
                        <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                                data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to Excel
                        </button>
                    </div>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-report sm:mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">NO</th>
                                <th class="text-center whitespace-nowrap">LATITUDE</th>
                                <th class="text-center whitespace-nowrap">LONGITUDE</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($enggineers as $row)
                            <tr class="intro-x">
                                <td class="w-40">
                                    {{ $no++ }}
                                </td>
                                <td class="text-center">{{ $row->latitude }}</td>
                                <td class="text-center">{{ $row->longitude }}</td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#edit-modal" data-id="$row->id"> <i
                                                data-feather="check-square" class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#delete-modal-preview"
                                            data-id={{ $row->id }}> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            Delete </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger show flex items-center mb-2 mt-2" role="alert">
                                <i data-lucide="alert-octago;n" class="w-6 h-6 mr-2"></i> Data belum tersedia
                            </div>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="intro-y flex flex-wrap sm:flex-row sm:flex-nowrap items-center mt-3">
                    <nav class="w-full sm:w-auto sm:mr-auto">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevrons-left"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">1</a> </li>
                            <li class="page-item active"> <a class="page-link" href="#">2</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">3</a> </li>
                            <li class="page-item"> <a class="page-link" href="#">...</a> </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevron-right"></i>
                                </a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#"> <i class="w-4 h-4" data-feather="chevrons-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <select class="w-20 form-select box mt-3 sm:mt-0">
                        <option>10</option>
                        <option>25</option>
                        <option>35</option>
                        <option>50</option>
                    </select>
                </div>
            </div>

            <!-- BEGIN: Modal Edit -->
            <div id="edit-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Edit Site</h2>
                            <div class="dropdown sm:hidden">
                                <a class="dropdown-toggle w-5 h-5 block" href="javascript:;" aria-expanded="false"
                                    data-tw-toggle="dropdown">
                                    <i data-lucide="more-horizontal" class="w-5 h-5 text-slate-500"></i>
                                </a>
                            </div>
                        </div>
                        <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body">
                            <form action="{{ route('enggineer.update', $row->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div>
                                    <label for="latitude" class="form-label">Latitude</label>
                                    <input id="latitude" type="text" class="form-control" placeholder="Input latitude"
                                        value="{{ old('name', $row->latitude) }}">
                                </div>
                                <div class="mt-3">
                                    <label for="longitude" class="form-label">Longitude</label>
                                    <input id="longitude" type="text" class="form-control" placeholder="Input longitude"
                                        value="{{ old('name', $row->longitude) }}">
                                </div>
                            </form>
                        </div>
                        <!-- END: Modal Body -->
                        <!-- BEGIN: Modal Footer -->
                        <div class="modal-footer">
                            <button type="button" data-tw-dismiss="modal"
                                class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                            <button type="submit" class="btn btn-primary w-20">Send</button>
                        </div>
                        <!-- END: Modal Footer -->
                    </div>
                </div>
            </div>
            <!-- END: Modal Edit -->

            <!-- BEGIN: Modal Add -->
            <div id="add-modal" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <!-- BEGIN: Modal Header -->
                        <div class="modal-header">
                            <h2 class="font-medium text-base mr-auto">Add Site</h2>
                        </div>
                        <!-- END: Modal Header -->
                        <!-- BEGIN: Modal Body -->
                        <div class="modal-body">
                            <!-- BEGIN: Validation Form -->
                            <form action="{{ route('enggineer.store') }}" method="POST">
                                @csrf
                                <div class="input-form">
                                    <label for="latitude" class="form-label w-full flex flex-col sm:flex-row">
                                        Latitude <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                            Latitude</span>
                                    </label>
                                    <input id="latitude" type="text" name="latitude" class="form-control"
                                        placeholder="-6,176032389884715" required>
                                </div>
                                <div class="input-form mt-3">
                                    <label for="longitude" class="form-label w-full flex flex-col sm:flex-row">
                                        Longitude <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                            Longitude</span>
                                    </label>
                                    <input id="longitude" type="text" name="longitude" class="form-control"
                                        placeholder="106,82766778077617" required>
                                </div>
                                <!-- BEGIN: Modal Footer -->
                                <div class="modal-footer">
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-primary mt-5">Add</button>
                                </div>
                                <!-- END: Modal Footer -->
                            </form>
                            <!-- END: Validation Form -->
                        </div>
                        <!-- END: Modal Body -->
                    </div>
                </div>
            </div>
            <!-- END: Modal Add -->

            <!-- BEGIN: Modal Delete -->
            <div id="delete-modal-preview" class="modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body p-0">
                            <div class="p-5 text-center">
                                <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                                <div class="text-3xl mt-5">Are you sure?</div>
                                <div class="text-slate-500 mt-2">Do you really want to delete these records?
                                    <br>This process cannot be undone.</div>
                            </div>
                            <div class="px-5 pb-8 text-center">
                                <form action="{{ route('enggineer.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" data-tw-dismiss="modal"
                                        class="btn btn-outline-secondary w-24 mr-1">Cancel</button>
                                    <button type="submit" class="btn btn-danger w-24">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: Modal Delete -->
        </div>
        @endsection
