@extends('layouts.main')

@section('content')
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-feather="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="shopping-cart" class="report-box__icon text-primary"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                <div class="text-base text-slate-500 mt-1">Item Sales</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="credit-card" class="report-box__icon text-pending"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                <div class="text-base text-slate-500 mt-1">New Orders</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="monitor" class="report-box__icon text-warning"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                <div class="text-base text-slate-500 mt-1">Total Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-feather="user" class="report-box__icon text-success"></i>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END: General Report -->
            <!-- BEGIN: Table -->
            <div class="col-span-12 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        User Table
                    </h2>
                    <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                        <button class="btn box flex items-center text-slate-600 dark:text-slate-300" href="javascript:;"
                            data-tw-toggle="modal" data-tw-target="#user-modal"> <i data-feather="plus"
                                class="hidden sm:block w-4 h-4 mr-2"></i> Add New User
                        </button>
                        <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                                data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                        </button>
                    </div>
                </div>
                <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                    <table class="table table-report sm:mt-2">
                        <thead>
                            <tr>
                                <th class="whitespace-nowrap">NO</th>
                                <th class="whitespace-nowrap">USERNAME</th>
                                <th class="text-center whitespace-nowrap">POSITION</th>
                                <th class="text-center whitespace-nowrap">STATUS</th>
                                <th class="text-center whitespace-nowrap">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @forelse ($users as $row)
                            <tr class="intro-x">
                                <td class="w-40">
                                    {{ $no++ }}
                                </td>
                                <td>
                                    <a href="" class="font-medium whitespace-nowrap"> {{ $row->name }}</a>
                                    <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"> {{ $row->name }}
                                    </div>
                                </td>
                                <td class="text-center">{{ $row->email }}</td>
                                <td class="w-40">
                                    <div class="flex items-center justify-center text-danger"> <i
                                            data-feather="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                                </td>
                                <td class="table-report__action w-56">
                                    <div class="flex justify-center items-center">
                                        <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal"
                                            data-tw-target="#edit-modal-{{ $row->id }}"> <i data-feather="check-square"
                                                class="w-4 h-4 mr-1"></i> Edit </a>
                                        <a class="flex items-center text-danger" href="javascript:;"
                                            data-tw-toggle="modal" data-tw-target="#delete-modal-preview"
                                            data-id={{ $row->id }}> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                            Delete </a>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <div class="alert alert-danger show flex items-center mb-2" role="alert">
                                <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Data belum tersedia
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
            <!-- END: Table -->
        </div>
        <div class="col-span-12 xl:col-span-4 mt-6">
            <!-- BEGIN: MAPS -->
            <div class="col-span-12 xl:col-span-8 mt-6">
                <div class="intro-y block sm:flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">Maps</h2>
                    <div class="sm:ml-auto mt-3 sm:mt-0 relative text-slate-500">
                        <i data-lucide="map-pin" class="w-4 h-4 z-10 absolute my-auto inset-y-0 ml-3 left-0"></i>
                        <input type="text" class="form-control sm:w-56 box pl-10" placeholder="Filter by city">
                    </div>
                </div>
                <div class="intro-y box p-5 mt-12 sm:mt-5">
                    <div>All Site</div>
                    <div class="report-maps mt-5 bg-slate-200 rounded-md" id="map"></div>
                </div>
            </div>
            <!-- END: MAPS -->
        </div>
         <!-- BEGIN: Table -->
         <div class="col-span-12 mt-6">
            <div class="intro-y block sm:flex items-center h-10">
                <h2 class="text-lg font-medium truncate mr-5">
                    Site Table
                </h2>
                <div class="flex items-center sm:ml-auto mt-3 sm:mt-0">
                    <button class="btn box flex items-center text-slate-600 dark:text-slate-300" href="javascript:;"
                        data-tw-toggle="modal" data-tw-target="#site-modal"> <i data-feather="plus"
                            class="hidden sm:block w-4 h-4 mr-2"></i> Add New Site
                    </button>
                    <button class="ml-3 btn box flex items-center text-slate-600 dark:text-slate-300"> <i
                            data-feather="file-text" class="hidden sm:block w-4 h-4 mr-2"></i> Export to PDF
                    </button>
                </div>
            </div>
            <div class="intro-y overflow-auto lg:overflow-visible mt-8 sm:mt-0">
                <table class="table table-report sm:mt-2">
                    <thead>
                        <tr>
                            <th class="whitespace-nowrap">NO</th>
                            <th class="whitespace-nowrap">NAME</th>
                            <th class="text-center whitespace-nowrap">LATITUDE</th>
                            <th class="text-center whitespace-nowrap">LONGITUDE</th>
                            <th class="text-center whitespace-nowrap">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @forelse ($users as $row)
                        <tr class="intro-x">
                            <td class="w-40">
                                {{ $no++ }}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap"> {{ $row->name }}</a>
                                <div class="text-slate-500 text-xs whitespace-nowrap mt-0.5"> {{ $row->name }}
                                </div>
                            </td>
                            <td class="text-center">{{ $row->email }}</td>
                            <td class="w-40">
                                <div class="flex items-center justify-center text-danger"> <i
                                        data-feather="check-square" class="w-4 h-4 mr-2"></i> Inactive </div>
                            </td>
                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">
                                    <a class="flex items-center mr-3" href="javascript:;" data-tw-toggle="modal"
                                        data-tw-target="#edit-modal-{{ $row->id }}"> <i data-feather="check-square"
                                            class="w-4 h-4 mr-1"></i> Edit </a>
                                    <a class="flex items-center text-danger" href="javascript:;"
                                        data-tw-toggle="modal" data-tw-target="#delete-modal-preview"
                                        data-id={{ $row->id }}> <i data-feather="trash-2" class="w-4 h-4 mr-1"></i>
                                        Delete </a>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger show flex items-center mb-2" role="alert">
                            <i data-lucide="alert-octagon" class="w-6 h-6 mr-2"></i> Data belum tersedia
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
        <!-- END: Table -->
        <!-- BEGIN: Add User Modal -->
        <div id="user-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Add New User</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body">
                        <!-- BEGIN: Validation Form -->
                        <form action="{{ route('users.store') }}" method="POST">
                            @csrf
                            <div class="input-form">
                                <label for="name" class="form-label w-full flex flex-col sm:flex-row">
                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least
                                        2 characters</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="John Legend"
                                    minlength="2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="email" class="form-label w-full flex flex-col sm:flex-row">
                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email
                                        address format</span>
                                </label>
                                <input id="email" type="email" name="email" class="form-control"
                                    placeholder="example@gmail.com" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="password" class="form-label w-full flex flex-col sm:flex-row">
                                    Password <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at
                                        least 6 characters</span>
                                </label>
                                <input id="password" type="password" name="password" class="form-control"
                                    placeholder="secret" minlength="6" required>
                            </div>
                            <!-- BEGIN: Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" data-tw-dismiss="modal"
                                    class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                                <button type="submit" class="btn btn-primary mt-5">Register</button>
                            </div>
                            <!-- END: Modal Footer -->
                        </form>
                        <!-- END: Validation Form -->
                    </div>
                    <!-- END: Modal Body -->
                </div>
            </div>
        </div>
        <!-- END: Add User Modal -->

        <!-- BEGIN: Add Site Modal -->
        <div id="site-modal" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Add New Site</h2>
                    </div>
                    <!-- END: Modal Header -->
                    <!-- BEGIN: Modal Body -->
                    <div class="modal-body">
                        <!-- BEGIN: Validation Form -->
                        <form action="" method="POST">
                            @csrf
                            <div class="input-form">
                                <label for="name" class="form-label w-full flex flex-col sm:flex-row">
                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least
                                        2 characters</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control" placeholder="John Legend"
                                    minlength="2" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="latitude" class="form-label w-full flex flex-col sm:flex-row">
                                    Latitude <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                        Latitude</span>
                                </label>
                                <input id="latitude" type="text" name="latitude" class="form-control"
                                    placeholder="-6.175585501844185" required>
                            </div>
                            <div class="input-form mt-3">
                                <label for="password" class="form-label w-full flex flex-col sm:flex-row">
                                    Longitude <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required,
                                        Longitude</span>
                                </label>
                                <input id="longitude" type="text" name="longitude" class="form-control"
                                    placeholder="106.82738152687968" required>
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
        <!-- END: Add Site Modal -->

        <!-- BEGIN: Edit Modal -->
        <div id="edit-modal-{{ $row->id }}" class="modal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- BEGIN: Modal Header -->
                    <div class="modal-header">
                        <h2 class="font-medium text-base mr-auto">Edit Modal</h2>
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
                        <form action="{{ route('users.update', $row->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="input-form">
                                <label for="name" class="form-label w-full flex flex-col sm:flex-row">
                                    Name <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, at least
                                        2 characters</span>
                                </label>
                                <input id="name" type="text" name="name" class="form-control" minlength="2"
                                    value="{{ old('name', $row->name) }}" required>
                            </div>
                            <div class=" input-form mt-3">
                                <label for="email" class="form-label w-full flex flex-col sm:flex-row">
                                    Email <span class="sm:ml-auto mt-1 sm:mt-0 text-xs text-slate-500">Required, email
                                        address format</span>
                                </label>
                                <input id="email" type="email" name="email" class="form-control"
                                    value="{{ old('name', $row->email) }}" required>
                            </div>
                        </form>
                    </div>
                    <!-- END: Modal Body -->
                    <!-- BEGIN: Modal Footer -->
                    <div class="modal-footer">
                        <button type="button" data-tw-dismiss="modal"
                            class="btn btn-outline-secondary w-20 mr-1">Cancel</button>
                        <button type="submit" class="btn btn-primary w-20">Edit</button>
                    </div>
                    <!-- END: Modal Footer -->
                </div>
            </div>
        </div>
        <!-- END: Edit Modal -->

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
                            <form action="{{ route('users.destroy', $row->id) }}" method="POST">
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
</div>
@endsection

@push('scripts')
<script>
    // you want to get it of the window global
    const providerOSM = new GeoSearch.OpenStreetMapProvider();


    //leaflet map
    var leafletMap = L.map('map', {
        fullscreenControl: true,
        // OR
        fullscreenControl: {
            pseudoFullscreen: false // if true, fullscreen to page width and height
        },
        minZoom: 3
    }).setView([-6.211980336407637, 106.83087851315727], 10);

    L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {}).addTo(leafletMap);

    let theMarker = {};

    leafletMap.on('click', function (e) {
        let latitude = e.latlng.lat.toString().substring(0, 15);
        let longitude = e.latlng.lng.toString().substring(0, 15);
        document.getElementById("latitude").value = latitude;
        document.getElementById("longitude").value = longitude;
        let popup = L.popup()
            .setLatLng([latitude, longitude])
            .setContent("Kordinat : " + latitude + " - " + longitude)
            .openOn(leafletMap);

        if (theMarker != undefined) {
            leafletMap.removeLayer(theMarker);
        };
        theMarker = L.marker([latitude, longitude]).addTo(leafletMap);
    });

    const search = new GeoSearch.GeoSearchControl({
        provider: providerOSM,
        style: 'bar',
        searchLabel: 'Search Here',
    });

    leafletMap.addControl(search);

</script>
@endpush
