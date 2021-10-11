@extends('layouts.app')
@section('title', 'Data Keluarga Budi')
@section('description', '')
@section('keywords', '')

@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
@endsection

@section('style')
@endsection

@section('content')
<div class="row mt-4 mb-4">
    <div class="col-md-12">
        <h5>Data Keluarga Budi</h5>
        @include('components.flash-messages')
        <a href="{{ route('family.create') }}" class="btn btn-info">Add New</a>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
    <table id="example" class="display dt-family" style="width:100%" data-url="{{ route('family.datatable') }}">
        <thead>
            <tr>
                <th width="10px">No</th>
                <th>Name</th>
                <th>Gender</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
    </div>
</div>
@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
@endsection

@section('custom-scripts')
<script>
    const $classname = 'dt-family';
    const $table = $('.' + $classname);
    const $columns = [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            className: 'text-center',
            searchable: false
        },
        {
            data: 'name',
            name: 'name'
        },
        {
            data: 'gender',
            name: 'gender',
            className: 'text-center',
        },
        {
            data: 'action',
            name: 'action',
            className: 'text-center',
            orderable: false,
            searchable: false
        },
    ];
    $('.' + $classname).DataTable({
        processing: false,
        serverSide: true,
        ajax: $table.data('url'),
        columns: $columns,
        order: [0, 'ASC'],
        "oLanguage": {
            "oPaginate": {
                "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
                "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>'
            },
            "sProcessing": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader spin"><line x1="12" y1="2" x2="12" y2="6"></line><line x1="12" y1="18" x2="12" y2="22"></line><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"></line><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"></line><line x1="2" y1="12" x2="6" y2="12"></line><line x1="18" y1="12" x2="22" y2="12"></line><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"></line><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"></line></svg>',
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Cari...",
            "sLengthMenu": "Show :  _MENU_",
        },
        "lengthMenu": [5, 20, 50, 100],
        "pageLength": 20
    });
</script>
@endsection
