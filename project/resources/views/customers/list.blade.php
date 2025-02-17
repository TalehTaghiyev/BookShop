@extends('layouts.master')
@section('title',"Customers List")
@section('content')
    <main id="main-container">

        <!-- Hero -->
        <div class="bg-body-light">
            <div class="content content-full">
                <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                    <h1 class="flex-sm-fill font-size-h2 font-w400 mt-2 mb-0 mb-sm-2">Siyahı</h1>
                    <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Müştərilər</li>
                            <li class="breadcrumb-item active" aria-current="page">Siyahı</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- END Hero -->

        <!-- Page Content -->
        <div class="content">
            <!-- Dynamic Table Full -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    @include('layouts.errors')
                </div>
                <div class="block-content block-content-full">
                    <!-- DataTables init on table by adding .js-dataTable-full class, functionality is initialized in js/pages/be_tables_datatables.min.js which was auto compiled from _js/pages/be_tables_datatables.js -->
                    <table class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 80px;">#</th>
                            <th>Ad Soyad</th>
                            <th class="d-none d-sm-table-cell" style="width: 30%;">Email</th>
                            <th class="d-none d-sm-table-cell" style="width: 15%;">Status</th>
                            <th style="width: 15%;">Əməliyyatlar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ \App\Http\Controllers\Customers\General::UserGet($user->user_id)->name ?? "Tapılmadı" }}</td>
                                <td>{{ \App\Http\Controllers\Customers\General::UserGet($user->user_id)->email ?? "Tapılmadı" }}</td>
                                <td>
                                    @if($user->status=="1")
                                        <span class="badge badge-success">Vip müştəri</span>
                                    @elseif($user->status=="2")
                                        <span class="badge badge-info">Standart müştəri</span>
                                    @elseif($user->status=="3")
                                        <span class="badge badge-danger">İstənməyən müştəri</span>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-outline-info btn-sm" onclick="ViewCustomer({{ $user->id }},'{{ asset('') }}')">Bax</button>
                                    <button onclick="UserUpdateView({{ $user->id }})" class="btn btn-outline-info">
                                        Redaktə Et
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END Dynamic Table Full -->
        </div>
        <!-- END Page Content -->
    </main>
    <div class="modal fade" id="customerView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">İstifadəçi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <tr>
                            <th>Şəkil</th>
                            <td id="img"></td>
                        </tr>
                        <tr>
                            <th>Ad Soyad</th>
                            <td id="name"></td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td id="email"></td>
                        </tr>
                        <tr>
                            <th>Telefon</th>
                            <td id="phone"></td>
                        </tr>
                        <tr>
                            <th>Ünvan</th>
                            <td id="address"></td>
                        </tr>
                        <tr>
                            <th>Doğum Tarixi</th>
                            <td id="date"></td>
                        </tr>
                        <tr>
                            <th>Status</th>
                            <td id="status"></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Bağla</button>
                </div>
            </div>
        </div>
    </div>


@endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/js/plugins/datatables/buttons-bs4/buttons.bootstrap4.min.css') }}">
@endsection

@section('js')
    <script src="{{ asset('assets/js/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/be_tables_datatables.min.js') }}"></script>
    <script src="{{ asset('assets/js/general.js') }}"></script>
@endsection
