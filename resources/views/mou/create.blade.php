@extends('layouts.kostariateam')

@section('title', '| New MOU')

@section('stylesheets')
<link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
  <div class="row justify-content-center" style="text-align: justify; text-justify: inter-word;">
    <div class="col-md-10">
      <h3>Surat Perjanjian</h3>
    </div>
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('PIHAK PERTAMA') }}</div>
        <div class="card-body">
          Saya yang bertanda tangan di bawah ini: <br><br>
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
            Dalam hal ini bertindak atas nama diri pribadi yang selanjutnya disebut sebagai PIHAK PERTAMA
        </div>
      </div>
    </div>
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">{{ __('PIHAK KEDUA') }}</div>
        <div class="card-body">
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
          <br>
          <center><b>Pasal 1 - Harga dan Cara Pembayaran</b></center>
          <br>Perjanjian antar kedua belah pihak ini berlaku sah untuk jangka waktu 12 (dua belas) bulan, terhitung sejak ditandatangani dimana <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> sepakat untuk menentukan harga jasa atas pengurusan sewa
          rumah/kamar/kos-kosan berikut tanah pekarangannya tersebut dengan nilai harga terlampir. Yang akan dibayarkan setelah penyewa rumah/kamas/kos-kosan melunasi pembayaran.
          <br>
          <br>
          <center><b>Pasal 2 - Jaminan</b></center>
          <br>
          <ol type="1">
            <li>PIHAK PERTAMA selaku pemilik sah bangunan berikut pekarangannya di alamat tersebut menjamin bahwa tanah dan bangunan berikut semua fasilitas yang terdapat di dalamnya adalah hak milik sahnya dan bebas dari semua tuntutan hukum dan
              persoalan-persoalan yang dapat mengganggu <b>PIHAK KEDUA</b> atas pemakaiannya dalam jangka waktu berlakunya surat perjanjian ini.
            <li>Semua kerugian yang timbul akibat kelalaian <b>PIHAK PERTAMA</b> dalam memenuhi kewajibannya tersebut sepenuhnya menjadi tanggung jawab PIHAK PERTAMA.
          </ol>
          <br>
          <br>
          <center><b>Pasal 3 - Pemutusan Kontrak & Serah Terima</b></center>
          <ol type="1">
            <li>Jika <b>PIHAK KEDUA</b> membatalkan kontrak tetapi sudah membayar sebagian atau seluruh biaya sewa, maka uang tersebut menjadi milik PIHAK PERTAMA.
            <li>Apabila <b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> bermaksud melanjutkan perjanjian kontrak, maka masing-masing pihak harus memberitahukan terlebih dahulu minimal 1 (satu) bulan sebelum jangka waktu kontrak berakhir.
          </ol>
          <br>
          <br>
          <center><b>Pasal 4 - Kerusakan Atas Bangunan & Ganti Rugi</b></center>
          <br>
          <ol type="1">
            <li><b>PIHAK PERTAMA</b> bertanggung jawab seluruhnya akibat dari kerusakan maupun kerugian yang disebabkan oleh kesalahan struktur dari bangunan tersebut. Yang dimaksudkan dengan struktur adalah sistim konstruksi bangunan yang menunjang
              berdirinya bangunan, seperti: pondasi, balok, kolom, lantai, dan dinding.
            <li><b>PIHAK KEDUA</b> tidak diperbolehkan mengubah struktur dan instalasi dari bangunan tersebut tanpa ijin dan persetujuan dari PIHAK PERTAMA.
            <li><b>PIHAK KEDUA</b> bertanggung jawab atas kerusakan struktur sebagai akibat pemakaian.
            <li><b>PIHAK KEDUA</b> tidak bertanggung jawab atau dibebaskan dari segala ganti rugi atau tuntutan dari <b>PIHAK PERTAMA</b> yang terjadi akibat kerusakan pada bangunan yang diakibatkan oleh force majeure. Yang dimaksud dengan Force
              majeure adalah hal-hal yang disebabkan oleh faktor extern yang tidak dapat diatasi maupun dihindari, seperti: banjir, gempa bumi, tanah longsor, petir, angin topan, kebakaran, huru-hara, kerusuhan, pemberontakan, pencurian dan perang.
          </ol>
          <br>
          <br>
          <center><b>Pasal 5 - Ketentuan Kedua Belah Pihak</b></center>
          <br>
          <ol type="1">
            <li><b>PIHAK KEDUA</b> mendapatkan 7% dari hasil sewa kamar
            <li><b>PIHAK PERTAMA</b> akan mengarahkan para konsumen untuk menggunakan pelayanan kostaria
            <li><b>PIHAK PERTAMA</b> akan memberikan harga yang lebih tinggi pada konsumen yang tidak menggunakan jasa kostaria
          </ol>
          <br>
          <br>
          <center><b>Pasal 6 - Pajak & Retribusi</b></center>
          <br><b>PIHAK PERTAMA</b> bertanggung jawab atas berlakunya peraturan-peraturan Pemerintah yang menyangkut perihal pelaksanaan perjanjian ini, misalnya: Pajak-pajak, Iuran Retribusi Daerah (IREDA), dan lain-lainnya.
          <br>
          <br>
          <center><b>Pasal 7 - Prosedur Serah Terima</b></center>
          <br>Setelah berakhir jangka waktu kontrak sesuai dengan pasal satu Surat Perjanjian ini, <b>PIHAK KEDUA</b> bertanggung jawab untuk segera mengosongkan rumah/kamar/kos-kosan dan menyerahkannya kembali kepada <b>PIHAK PERTAMA</b> serta
          telah memenuhi kewajibannya.
          <br>
          <br>
          <center><b>Pasal 8 – Penyelesaian Perselisihan</b></center>
          <br><b>PIHAK PERTAMA</b> dan <b>PIHAK KEDUA</b> bersepakat untuk menempuh jalan musyawarah dan mufakat untuk menyelesaikan hal-hal atau perselisihan yang mungkin timbul sehubungan dengan Surat Perjanjian ini. Apabila jalan musyawarah
          dianggap tidak berhasil untuk mendapatkan penyelesaian yang melegakan kedua belah pihak, kedua belah pihak bersepakat untuk menempuh upaya hukum dengan memilih domisili pada Kantor Kepaniteraan Pengadilan Negeri terdekat.
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

    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script type="text/javascript">
        $('.select2-single').select2();
    </script>

    <script type="text/javascript">
        document.querySelector("#today").valueAsDate = new Date();
    </script>

    <script type="text/javascript">
        $('.select2-single').select2();
    </script>
 <script>
     $(document).ready(function() {

    $('select[name="regency_id"]').on('change', function(){
        var regencyId = $(this).val();
        if(regencyId) {
            $.ajax({
                url: '/address/getDistricts/'+regencyId,
                type:"GET",
                dataType:"json",
                success:function(data) {


                    $('select[name="district_id"]').empty();
                    $('select[name="village_id"]').empty();
                    $('select[name="district_id"]').append('<option value="">Pilih Kecamatan</option>');

                    $.each(data, function(key, value){

                        $('select[name="district_id"]').append('<option value="'+ key +'">' + value + '</option>');

                    });
                }
            });
        } else {
            $('select[name="district_id"]').empty();
            $('select[name="village_id"]').empty();
        }

    });

    $('select[name="district_id"]').on('change', function(){
        var districtId = $(this).val();
        if(districtId) {
            $.ajax({
                url: '/address/getVillages/'+districtId,
                type:"GET",
                dataType:"json",
                success:function(data) {

                    $('select[name="village_id"]').empty();
                    $('select[name="village_id"]').append('<option value="">Pilih Desa</option>');


                    $.each(data, function(key, value){
                        $('select[name="village_id"]').append('<option value="'+ key +'">' + value + '</option>');
                    });
                }
            });
        } else {
            $('select[name="village_id"]').empty();
        }

    });

});
 </script>

@endsection
