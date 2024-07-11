<!-- Navbar -->
@include('layouts.header');
<!-- /.navbar -->
<!-- Main Sidebar Container -->
@include('layouts.sidebar');
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Dashboard Detail Layanan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Blank Page</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Detail Layanan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Pekerjaan</th>
                                <th>Biaya</th>
                                <th>Layanan</th>
                                <th>Montir</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data_detail_layanan as $detail_layanan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $detail_layanan->pekerjaan }}</td>
                                <td>{{ $detail_layanan->biaya }}</td>
                                <td>{{ $detail_layanan->nama_layanan}}</td>
                                <td>{{ $detail_layanan->nama_pj_montir }}</td>
                                <td>
                                <a href="{{url('detail_layanan/detail/'.$detail_layanan->id)}}"><button class="btn btn-success"><i class="fas fa-info-circle"></i></button></a>
                                <a href="{{url('detail_layanan/edit/'.$detail_layanan->id)}}"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a> 
                                    <form action="{{ route('detail_layanan.destroy', $detail_layanan->id) }}" method="POST" style="display:inline-block;">
                                         @csrf
                                         @method('DELETE')
                                         <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus periksa ini?')"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="btn-group-vertical">
                    <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#inputModal">Tambah</button>
                    <!-- Modal -->
                    <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="inputModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="inputModalLabel">Tambah Detail Layanan</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ url('detail_layanan/store') }}" method="POST">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="pekerjaan">Pekerjaan</label>
                                            <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="biaya">Biaya</label>
                                            <input type="text" class="form-control" id="biaya" name="biaya" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="layanan_id">Layanan</label>
                                            <select id="select" name="layanan_id" class="form-control">
                                                @foreach ($layanans as $layanan)
                                                <option value="{{ $layanan->id }}">{{ $layanan->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="pj_montir_id">Montir</label>
                                            <select id="select" name="pj_montir_id" class="form-control">
                                                @foreach ($montirs as $montir)
                                                <option value="{{ $montir->id }}">{{ $montir->nama }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary btn-block" style="box-shadow: 0 8px 15px rgba(247, 147, 29, 0.4);">Simpan</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
{{-- footer --}}
@include('layouts.footer');
{{-- tutup footer --}}
