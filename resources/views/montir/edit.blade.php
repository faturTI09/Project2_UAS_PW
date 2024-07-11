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
          <h3 class="card-title"> edit Montir</h3>

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
            @foreach ($data_montir as $montir)
            <form action="{{url('montir/update/'.$montir->id)}}" method="POST">
                          {{csrf_field()}}
                    <div class="form-group">
                        <label for="nomor">Nomor </label>
                        <input type="text" class="form-control" id="nomor" value="{{$montir->nomor}}" name="nomor" required>
                    </div>
                        <div class="form-group">
                          <label for="nama">Nama</label>
                          <input type="text" class="form-control" id="nama" value="{{$montir->nama}}" name="nama" required>
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
                      <input type="date" class="form-control" id="tgl_lahir" value="{{$montir->tgl_lahir}}" name="tgl_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="tmp_lahir">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tmp_lahir" value="{{$montir->tmp_lahir}}" name="tmp_lahir" required>
                    </div>
                    <div class="form-group">
                        <label for="keahlian">Keahlian</label>
                        <input type="text" class="form-control" id="keahlian" value="{{$montir->keahlian}}" name="keahlian" required>
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
            @endforeach
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
         
        </div>
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