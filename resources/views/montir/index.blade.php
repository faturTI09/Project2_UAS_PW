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
            <h1>Dashboard Montir</h1>
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
          <h3 class="card-title">Montir</h3>

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
                  <th>Nomor</th>
                  <th>Nama</th>
                  <th>Gender</th>
                  <th>Tanggal Lahir</th>
                  <th>Tempat Lahir</th>
                  <th>Keahlian</th>
                  <th>Kategori Montir</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($data_montir as $montir)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $montir->nomor }}</td>
                  <td>{{ $montir->nama }}</td>
                  <td>{{ $montir->gender }}</td>
                  <td>{{ $montir->tgl_lahir }}</td>
                  <td>{{ $montir->tmp_lahir }}</td>
                  <td>{{ $montir->keahlian }}</td>
                  <td>{{ $montir->nama_kategori_montir }}</td>
                  <td>
                    <a href="{{url('montir/detail/'.$montir->id)}}"><button class="btn btn-success"><i class="fas fa-info-circle"></i></button></a>
                    <a href="{{url('montir/edit/'.$montir->id)}}"><button class="btn btn-warning"><i class="fas fa-edit"></i></button></a> 
                    <form action="{{ route('montir.destroy', $montir->id) }}" method="POST" style="display:inline-block;">
                         @csrf
                         @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus montir ini?')"><i class="fas fa-trash-alt"></i></button>
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
                      <h5 class="modal-title" id="inputModalLabel">Tambah Montir</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <form action="{{url('montir/store')}}" method="POST">
                          {{csrf_field()}}
                          <div class="form-group">
                            <label for="nomor">Nomor </label>
                            <input type="text" class="form-control" id="nomor" name="nomor" required>
                        </div>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" name="nama" required>
                      </div>
                      <div class="form-group">
                       <label for="gender">Gender</label>
                       <br>
                       <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="gender" name="gender" value="L" class="custom-control-input" {{$montir->gender == 'l' ? 'checked' : ''}}>
                            <label class="custom-control-label" for="gender">L</label>
                       </div>
                          <div class="custom-control custom-radio custom-control-inline">
                          <input type="radio" id="gender2" name="gender" value="P" class="custom-control-input" {{$montir->gender == 'p' ? 'checked' : ''}}>
                           <label class="custom-control-label" for="gender2">P</label>
                          </div>
                       </div>
                     </div>
                    <div class="form-group">
                      <label for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="keahlian">Keahlian</label>
                        <input type="text" class="form-control" id="keahlian" name="keahlian" required>
                    </div>
                          <div class="form-group">
                              <label for="kategori_montir_id">Kategori Montir</label>
                              <select id="select" name="kategori_montir_id" class="form-control">
                                  @foreach ($kategori_montirs as $kategori_montir)
                                  <option value="{{$kategori_montir->id}}">{{$kategori_montir->nama}}</option>
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
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  {{-- footer --}}
  @include('layouts.footer');
  {{-- tutup footer --}}