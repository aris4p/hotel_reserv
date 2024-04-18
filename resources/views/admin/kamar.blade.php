@extends('layout.admin_main')
@section('body')

<div class="pagetitle">
    <h1>{{ $title }}</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ $title }}</li>
        </ol>
    </nav>
</div><!-- End Page Title -->
@if ($message = Session::get('Success') )
<div class="alert alert-success alert-block">
    <strong>{{ $message }}</strong>
</div>
@endif
<div class="mb-3">
    <a href="#" class="btn btn-primary tombol-tambah-kamar" type="submit">Tambah</a>
</div>
<section class="section dashboard">
    <!-- Table with hoverable rows -->
    <table class="table table-striped" style="width:100%" >
        @php
        $no=1;
        @endphp
        <thead>
            <tr>
                <th scope="col">No</th>

                <th scope="col">Nama Produk</th>
                <th scope="col">Tipe</th>
                <th scope="col">Harga</th>
                <th scope="col">Gambar Produk</th>
                <th scope="col">Aksi</th>

            </tr>
        </thead>
    </table>

    <!-- Modal Tambah data -->
    <form  action="javascript:void(0)" class="form-horizontal" onSubmit="return checkForm(this);" enctype='multipart/form-data'>
        @csrf
    <div class="modal fade" id="tambah-kamar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"  >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Kamar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger d-none"></div>
                    <div class="alert alert-success d-none"></div>
                    <div class="row mb-3">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="stok" class="col-sm-2 col-form-label">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tipe" name="tipe">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="harga" name="harga">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="harga" class="col-sm-2 col-form-label">Gambar</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" id="gambar" name="gambar">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close" data-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary tombol-simpan">Simpan</button>
                </div>
            </div>
        </div>
    </div>
    </form>
    {{-- End Tambah Modal --}}


    <!-- Edit Modal -->
    <form  action="javascript:void(0)" class="form-horizontal" onSubmit="return checkForm(this);">
        @csrf
        <div class="modal fade editKamar" id="edit-kamar" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Kamar</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body editKamar">

                        <div class="form-group">
                            <input type="hidden" name="id" id="id" class="form-control">
                            <label class="col-lg control-label">Nama Kamar</label>
                            <div class="col-lg-10">
                                <input type="text" name="nama" id="nama" value="" class="form-control">
                            </div>
                            <label class="col-lg control-label">Tipe</label>
                            <div class="col-lg-10">
                                <input type="text" name="tipe" id="tipe" value="" class="form-control">
                            </div>
                            <label class="col-lg control-label">Harga</label>
                            <div class="col-lg-10">
                                <input type="text" name="harga" id="harga" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="saveBtn">Save changes</button>
                        <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div><!-- End Basic Modal-->
    </form>
    <!-- End Table with hoverable rows -->
</section>

<script src="//code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
<script type="text/javascript"
src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript"
src="//cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/af-2.3.7/b-2.1.1/cr-1.5.5/date-1.1.1/fc-4.0.1/fh-3.2.1/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.0/sp-1.4.0/sl-1.3.4/sr-1.0.1/datatables.min.js">
</script>
<script>
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    });

    //membuat datatables
    var table = $('.table').DataTable({
        processing: true,
        autoWidth: false,
        responsive: true,
        lengthChange: true,
        processing: true,
        serverSide: true,
        dom: 'lfrtip',
        //mengambil data dengan dana controller
        ajax: "{{ route('datatable') }}",
        columns: [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'nama',
            name: 'nama',
            orderable: true,
            searchable: true
        },
        {
            data: 'tipe',
            name: 'tipe',
            orderable: false,
            searchable: false
        },
        {
            data: 'harga',
            name: 'harga',
            orderable: false,
            searchable: false
        },
        {
            data: 'gambar',
            name: 'gambar'

        },
        {
            data: 'action',
            name: 'action',
            orderable: false,
            searchable: false
        },
        ]
    });



    // Tambah Data
    $('body').on('click', '.tombol-tambah-kamar', function(e){
        $('#tambah-kamar').modal('show');
        $('.tombol-simpan').click(function(){
            simpan();
        });
    });
    // $('body').on('click', '.tombol-edit-kamar', function(e){
    //     $('#edit-kamar').modal('show');
    //     $('.tombol-simpan').click(function(){
    //         simpan();
    //     });
    // });


    //edit Produk
    $('body').on('click', '.editKamar', function(e){
        let id = $(this).data('id');
        let var_url = "{{ route('edit-kamar', ':id') }}";
        var_url = var_url.replace(':id', id);
        $.ajax({
            url: var_url,
            type: 'GET',
            success:function(response){
                $('#edit-kamar').modal('show');
                $('#nama').val(response.nama);
                $('#tipe').val(response.tipe);
                $('#harga').val(response.harga);


                console.log(response);
                $('.tombol-simpan').click(function(){
                    simpan(id);
                });
            }

        });
    });



    // tutup modal
    $('.close').click(function(){
        $("#tambah-kamar").modal('hide');
    });
    $('#tambah-kamar').on('hidden.bs.modal', function(){
        $('#nama').val('');
        $('#tipe').val('');
        $('#harga').val('');

        $('.alert-danger').addClass('d-none');
        $('.alert-danger').html('');

        $('.alert-success').addClass('d-none');
        $('.alert-success').html('');
    });

    // function simpan dan update
    function simpan(id = '') {

        if (id == '') {
            var var_url = "{{ route('kamar_add') }}";
            var var_type = 'POST';
        } else {
            var var_url = "{{ route('edit-kamar', ':id') }}";
            var_url = var_url.replace(':id', id);
            var var_type = 'PUT';
        }
        $.ajax({
            url: var_url,
            type: var_type,
            data: {

                nama: $('#nama').val(),
                tipe: $('#tipe').val(),
                harga: $('#harga').val(),
                gambar: $('#gambar').val()

            },

            success: function(response) {
                if (response.errors) {
                    $('.alert-danger').removeClass('d-none').find('ul').remove();
                    $('.alert-danger').append("<ul>");
                        $.each(response.errors, function(key, value) {
                            $('.alert-danger').find('ul').append("<li>" + value + "</li>");
                        });
                        $('.alert-danger').append("</ul>");
                    } else {
                        $('.alert-success').removeClass('d-none').html(response.Success);
                    }
                    $('.table').DataTable().ajax.reload();
                }
            });
        }


    //     //delete produk

        $('body').on('click','.deleteProduk',function(){
            var id = $(this).data('id');
            console.log(id);
            var deleteConfirm = confirm("Menghapus produk akan menghapus seluruh transaksi yang berelasi, apakah kamu yakin?");
            if (deleteConfirm == true) {
                // AJAX request
                $.ajax({
                    url: "{{ route('delete-product') }}",
                    type: 'post',
                    data: {_token: CSRF_TOKEN,id: id},
                    success: function(response){
                        if(response.message == "Success"){
                            // Reload DataTable
                            table.ajax.reload();
                        }else{
                            alert("Invalid ID.");
                        }
                    }
                });
            }

        });

    //     let formSubmitted = false;
    //     function checkForm(form)
    //     {
    //         if(formSubmitted) {
    //             return false;
    //         }
    //         form.saveBtn.disabled = true;
    //         formSubmitted = true;
    //         return true;
    //     }

    </script>

    @endsection
