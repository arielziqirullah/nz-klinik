@extends('back.templates.default')

@section('title', 'Data Tindakan')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Data Tindakan / Layanan</h3>
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
        <a href="{{ route('tindakan_create') }}" class="btn btn-primary mb-3">Tambah Tindakan</a>
        <table id="dataTable" class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Discount</th>
                    <th>Deskripsi</th>
                    <th>Gambar</th>
                    <th>Aksi</th>
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
            ajax: '{{ route('dentist.data') }}',
            columns: [{
                data: 'DT_RowIndex',
                orderable: false,
                searchable: false
            }, 
            {data: 'name'},
            {data: 'price'},
            {data: 'discount'},
            {data: 'description'},
            {data: 'image'},
            {data: 'action'}
            ]
        })
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
                    url: '/dentist/delete/' + id,
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
                        setTimeout(function(){ location.reload(true); }, 1500);
                        
                    }
                });
            }
        })
    })

</script>
@endpush
