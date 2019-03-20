@extends('layouts.app')

@section('title', '| New MOU')

@section('stylesheets')

{!! Html::style('css/select2.min.css') !!}
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <h3>Surat Perjanjian</h3>
      </div>
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('PIHAK PERTAMA') }}</div>
                <div class="card-body">
                        Saya yang bertanda tangan di bawah ini: <br><br>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kostariateam->name}}" disabled="true">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kostariateam->nik}}" disabled="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Tanggal Lahir') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kostariateam->regencyBirth->name. "  ".$kostariateam->birth_date}}" disabled="true">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" value="{{$kostariateam->address." ". $kostariateam->regency->name. " " .$kostariateam->regency->province->name}}" disabled="true">
                            </div>
                        </div>
                        Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut sebagai PIHAK
PERTAMA
                </div>
            </div>
        </div>

        <div class="col-md-10">
                                      <div class="card">
                                          <div class="card-header">{{ __('PIHAK KEDUA') }}</div>

                                          <div class="card-body">
                                              <form method="POST" action="{{ route('mou.store') }}">
                                                  @csrf

                                                  <div class="form-group row">
                                                      <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                                          @if ($errors->has('name'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('name') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="nik" class="col-md-4 col-form-label text-md-right">{{ __('NIK') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="nik" type="number" class="form-control{{ $errors->has('nik') ? ' is-invalid' : '' }}" name="nik" value="{{ old('nik') }}" required>

                                                          @if ($errors->has('nik'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('nik') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="regency_id_birth" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                                                      <div class="col-md-6">
                                                          <select class="form-control select2-single" name="regency_id_birth">
                                                              @foreach($listRegency as $regency)
                                                                  <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="birth_date" type="date" class="form-control{{ $errors->has('birth_date') ? ' is-invalid' : '' }}" name="birth_date" value="{{ old('birth_date') }}" required>

                                                          @if ($errors->has('birth_date'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('birth_date') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" placeholder="Desa, RT RW" value="{{ old('address') }}" required>

                                                          @if ($errors->has('address'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('address') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="regency_id_owner" class="col-md-4 col-form-label text-md-right">{{ __('Kota/Kabupaten') }}</label>

                                                      <div class="col-md-6">
                                                          <select class="form-control select2-single" name="regency_id_owner">
                                                              @foreach($listRegency as $regency)
                                                                  <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                  </div>



                                                  <div class="form-group row">
                                                      <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Nomor HP') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="phone" type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                                                          @if ($errors->has('phone'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('phone') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut sebagai PIHAK KEDUA

                                            </div>
                                          </div>
                                        </div>
                                          <div class="col-md-10">
                                            <div class="card">
                                              <div class="card-body">

<br><b>PIHAK PERTAMA</b> telah setuju untuk memberikan kuasa atas pengelolaan bangunan kepada <b>PIHAK KEDUA</b>.
Selanjutnya kedua belah pihak telah bersepakat untuk mengadakan perjanjian yang tertulis dalam 9 (sembilan) pasal, sebagai berikut :
<br>
<br><center><b>Pasal 1 - Harga dan Cara Pembayaran</b></center>
<br>Perjanjian antar kedua belah pihak ini berlaku sah untuk jangka waktu (..............) bulan, terhitung sejak tanggal/bulan/tahun (........../........../............) sampai dengan tanggal/bulan/tahun (........../........../.............) dimana PIHAK PERTAMA dan PIHAK KEDUA sepakat untuk menentukan harga jasa atas pengurusan sewa rumah/kamar/kos-kosan berikut tanah pekarangannya tersebut dengan nilai harga terlampir. Yang akan dibayarkan setelah penyewa rumah/kamas/kos-kosan melunasi pembayaran.
<br>
<br><center><b>Pasal 2 - Jaminan</b></center>
<br>1.	PIHAK  PERTAMA selaku  pemilik  sah  bangunan  berikut  pekarangannya  di alamat  tersebut menjamin bahwa tanah dan bangunan berikut semua fasilitas yang terdapat di dalamnya adalah hak milik sahnya dan bebas dari semua tuntutan hukum dan persoalan-persoalan yang dapat mengganggu PIHAK KEDUA atas pemakaiannya dalam jangka waktu berlakunya surat perjanjian ini.
<br>2.	Semua kerugian yang timbul akibat kelalaian PIHAK PERTAMA dalam memenuhi kewajibannya tersebut sepenuhnya menjadi tanggung jawab PIHAK PERTAMA.
<br>
<br><center><b>Pasal 3 - Pemutusan Kontrak & Serah Terima</b></center>
<br>1.	Jika PIHAK KEDUA membatalkan kontrak tetapi sudah membayar sebagian atau seluruh biaya sewa, maka uang tersebut menjadi milik PIHAK PERTAMA.
<br>2.	Apabila PIHAK PERTAMA dan PIHAK KEDUA bermaksud melanjutkan perjanjian kontrak, maka masing-masing pihak harus memberitahukan terlebih dahulu minimal (..................................................................................... hari/bulan/tahun) sebelum jangka waktu kontrak berakhir.
<br>
<br><center><b>Pasal 4 - Kerusakan Atas Bangunan & Ganti Rugi</b></center>
<br>1.	PIHAK PERTAMA bertanggung jawab seluruhnya akibat dari kerusakan maupun kerugian yang disebabkan oleh kesalahan struktur dari bangunan tersebut. Yang dimaksudkan dengan struktur adalah sistim konstruksi bangunan yang menunjang berdirinya bangunan, seperti: pondasi, balok, kolom, lantai, dan dinding.
<br>2.	PIHAK KEDUA tidak diperbolehkan mengubah struktur dan instalasi dari bangunan tersebut tanpa ijin dan persetujuan dari PIHAK PERTAMA.
<br>3.	PIHAK KEDUA bertanggung jawab atas kerusakan struktur sebagai akibat pemakaian.
<br>4.	PIHAK KEDUA tidak bertanggung jawab atau dibebaskan dari segala ganti rugi atau tuntutan dari PIHAK PERTAMA yang terjadi akibat kerusakan pada bangunan yang diakibatkan oleh force majeure. Yang dimaksud dengan Force majeure adalah hal-hal yang disebabkan oleh faktor extern yang tidak dapat diatasi maupun dihindari, seperti: banjir, gempa bumi, tanah longsor, petir, angin topan, kebakaran, huru-hara, kerusuhan, pemberontakan, pencurian dan perang.
<br>
<br><center><b>Pasal 5 - Ketentuan Kedua Belah Pihak</b></center>
<br>1.	Pihak kedua mendapatkan 7% dari hasil sewa kamar
<br>2.	Pihak pertama akan mengarahkan para konsumen untuk menggunakan pelayanan kostaria
<br>3.	Pihak pertama akan memberikan harga yang lebih tinggi pada konsumen yang tidak menggunakan jasa kostaria
<br>
<br><center><b>Pasal 6 - Pajak & Retribusi</b></center>
<br>PIHAK PERTAMA bertanggung jawab atas berlakunya peraturan-peraturan Pemerintah yang menyangkut perihal pelaksanaan perjanjian ini, misalnya: Pajak-pajak, Iuran Retribusi Daerah (IREDA), dan lain-lainnya.
<br>
<br><center><b>Pasal 7 - Prosedur Serah Terima</b></center>
<br>Setelah berakhir jangka waktu kontrak sesuai dengan pasal satu Surat Perjanjian ini, PIHAK KEDUA bertanggung jawab untuk segera mengosongkan rumah/kamar/kos-kosan dan menyerahkannya kembali kepada PIHAK PERTAMA serta telah memenuhi kewajibannya.
<br>
<br><center><b>Pasal 8 – Penyelesaian Perselisihan</b></center>
<br>PIHAK PERTAMA dan PIHAK KEDUA bersepakat untuk menempuh jalan musyawarah dan mufakat untuk menyelesaikan hal-hal atau perselisihan yang mungkin timbul sehubungan dengan Surat Perjanjian ini. Apabila jalan musyawarah dianggap tidak berhasil untuk mendapatkan penyelesaian yang melegakan kedua belah pihak, kedua belah pihak bersepakat untuk menempuh upaya hukum dengan memilih domisili pada Kantor Kepaniteraan Pengadilan Negeri terdekat.
<br>
<br>Surat Perjanjian ini dibuat oleh kedua belah pihak dengan dasar akal sehat dan pikiran sehat tanpa adanya paksaan maupun tekanan dari pihak-pihak manapun.
<br>
<br>Dengan mengisi data berikut maka <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> terlah menyetujui perjanjian tersebut.
<br><br>

                                                  <div class="form-group row">
                                                      <label for="regency_id" class="col-md-4 col-form-label text-md-right">{{ __('Ditandatangani di :') }}</label>

                                                      <div class="col-md-6">
                                                          <select class="form-control select2-single" name="regency_id">
                                                              @foreach($listRegency as $regency)
                                                                  <option value='{{$regency->id}}'>{{$regency->name}}</option>
                                                              @endforeach
                                                          </select>
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="signed_at" class="col-md-4 col-form-label text-md-right">{{ __('Ditandatangani pada :') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="today" type="date" class="form-control{{ $errors->has('signed_at') ? ' is-invalid' : '' }}" name="signed_at" value="{{ old('signed_at') }}" required>

                                                          @if ($errors->has('signed_at'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('signed_at') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>

                                                  <div class="form-group row">
                                                      <label for="ended_at" class="col-md-4 col-form-label text-md-right">{{ __('Berlaku sampai :') }}</label>

                                                      <div class="col-md-6">
                                                          <input id="ended_at" type="date" class="form-control{{ $errors->has('ended_at') ? ' is-invalid' : '' }}" name="ended_at" value="{{ old('ended_at') }}" required>

                                                          @if ($errors->has('ended_at'))
                                                              <span class="invalid-feedback" role="alert">
                                                                  <strong>{{ $errors->first('ended_at') }}</strong>
                                                              </span>
                                                          @endif
                                                      </div>
                                                  </div>
                                                  <div class="form-group row mb-0">
                                                      <div class="col-md-6 offset-md-4">
                                                          <button type="submit" class="btn btn-primary">
                                                              {{ __('Register') }}
                                                          </button>
                                                      </div>
                                                  </div>
                                              </form>
                                          </div>
                                      </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

	{!! Html::script('js/select2.min.js') !!}
	<script type="text/javascript">
		$('.select2-single').select2();
	</script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

@endsection
