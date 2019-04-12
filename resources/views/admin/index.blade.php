@extends('layouts.admin')
@section('title', '| Booking List')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <h3>Daftar Booking</h3>
        </div>
    </div>
    @if (\Session::has('success'))
    <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
    </div><br />
    @elseif (\Session::has('fail'))
    <div class="alert alert-fail">
        <p>{{ \Session::get('fail') }}</p>
    </div><br />
    @endif
    <div class="box table-responsive-xl">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Nomor telepon User</th>
                    <th>No Transaksi</th>
                    <th>Kostan</th>
                    <th>Alamat Kostan</th>
                    <th>Pemilik Kostan</th>
                    <th>Nomor telepon Pemilik Kostan</th>
                    <th>Kamar</th>
                    <th>Tanggal Booking</th>
                    <th>Waktu Penempatan</th>
                    <th>Bukti Pembayaran</th>
                    <th>Action</th>
                    
                </tr>
            </thead>
            <tbody>
                @foreach($listUser as $user)
                <tr>
                    
                    @foreach($user->chambersTransaction as $bookedChamber)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $bookedChamber->id }}</td>
                        <td>{{ $bookedChamber->boardinghouse->name }}</td>
                        <td>{{ $bookedChamber->boardinghouse->address }}</td>
                        <td>{{ $bookedChamber->boardinghouse->owner->name }}</td>
                        <td>{{ $bookedChamber->boardinghouse->owner->phone }}</td>
                        <td>{{ $bookedChamber->name }}</td>
                        <td>{{ $bookedChamber->pivot->created_at }}</td>
                        <td>{{ $bookedChamber->pivot->rent_start }}</td>
                        <td>{{ $bookedChamber->pivot->payment_proof }}</td>
                        <td><form action="{{ route('admin.confirmTransaction', [$user->id, $bookedChamber->id])}}" method="post">
                            @csrf
                            <button class="btn btn-danger mx-auto" type="submit"><span class="fas fa-flag"></span></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection