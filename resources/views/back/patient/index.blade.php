@extends('back.templates.default')

@section('title', 'Data Pasien')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Data Pasien</h3>
    </div>
    <div class="card-body">
        @if(session()->has('message'))
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                {{ session('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Tempat Lahir</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Profesi</th>
                    <th>No WhatsApp</th>
                    <th>Tanggal Daftar</th>
                    <th>Keluhan</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

@endsection


@push('styles')
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css ') }}">
@endpush

@push('scripts')
<script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>

<script>
    $(function () {
        $('#dataTable').dataTable({
            "processing": true,
            "serverSide": true,
            "responsive": true,
            "autoWidth": true,
            ajax: '{{ route('patient.data') }}',
            columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, 
            {data: 'name'},
            {data: 'birth_place'},
            {data: 'birth_date'},
            {data: 'gender'},
            {data: 'address'},
            {data: 'profession'},
            {data: 'phone'},
            {data: 'created_at'},
            {data: 'action'}
            ]
        })
    })
            
    $('#dataTable').on('click', 'button#modal' ,function(e){
        var id = $(this).data('id');
        
        $.ajax({
            type: 'GET',
            url: '/patient/get-complaints',
            data: {
                "id": id,
            },
            dataType: 'json',
            success: function(data){
                $("#list-complaints").html("");
                var count = 1;
                $.each(data, function(i){
                    $("#list-complaints").append('<li class="list-group-item">' + count++ + '. ' +  data[i].name + '</li>');
                })
            },
            error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("some error");
            }
        });
    })

    $('#dataTable').on('click', 'button#delete', function(e){
        e.preventDefault();
        var id = $(this).data('id');
        
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.value) {
                $.ajax({
                    type: 'DELETE',
                    url: '/admin/products/' + id,
                    data: {
                        "id": id,
                        "_token": "{{ csrf_token() }}",
                    },
                    success: function(response){
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        location.reload(true);
                    }
                });
            }
        })
    })

</script>
@endpush
