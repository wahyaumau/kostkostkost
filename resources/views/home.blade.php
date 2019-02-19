@extends('master.site')

@section('title','Beranda | Kostaria.id')
<!-- ***** Welcome Area Start ***** -->

@section('content')
<section class="dorne-welcome-area bg-img bg-overlay" style="background-image: url(assets/img/bg-img/hero-1.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center justify-content-center">
            <div class="col-12 col-md-10">
                <div class="hero-content">
                    <h2>Cari kos-kosan?</h2>
                    <h4>Kami akan membantu anda menemukannya.</h4>
                </div>
                <!-- Hero Search Form -->
                <div class="hero-search-form">
                    <!-- Tabs -->
                    <div class="nav nav-tabs" id="heroTab" role="tablist">
                        <a class="nav-item nav-link active" id="nav-places-tab" data-toggle="tab" href="#nav-places" role="tab" aria-controls="nav-places" aria-selected="true">Kost</a>
                        <a class="nav-item nav-link" id="nav-events-tab" data-toggle="tab" href="#nav-events" role="tab" aria-controls="nav-events" aria-selected="false">Hotel</a>
                    </div>
                    <!-- Tabs Content -->
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-places" role="tabpanel" aria-labelledby="nav-places-tab">
                            <h6>Apa yang anda cari?</h6>
                            <form action="#" method="get">
                                <select class="custom-select">
                                    <option selected>Universitas</option>
                                    <option value="1">UPI</option>
                                    <option value="2">POLBAN</option>
                                    <option value="3">UNIKOM</option>
                                    <option value="4">POLTEKPOS</option>
                                    <option value="5">MARANATHA</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>Kota</option>
                                    <option value="1">BANDUNG</option>
                                    <option value="2">JAKARTA</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>Rentang Harga</option>
                                    <option value="1">Rp 3jt - Rp 5jt / Bulan</option>
                                    <option value="2">Rp 5jt - Rp 7jt / Bulan</option>
                                    <option value="3">> Rp 7jt / Bulan</option>
                                </select>
                                <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="nav-events" role="tabpanel" aria-labelledby="nav-events-tab">
                            <h6>Maaf, fitur ini belum tersedia.</h6>
                            <!-- <form action="#" method="get">
                                <select class="custom-select">
                                    <option selected>Your Destinations</option>
                                    <option value="1">New York</option>
                                    <option value="2">Latvia</option>
                                    <option value="3">Dhaka</option>
                                    <option value="4">Melbourne</option>
                                    <option value="5">London</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>All Catagories</option>
                                    <option value="1">Catagories 1</option>
                                    <option value="2">Catagories 2</option>
                                    <option value="3">Catagories 3</option>
                                </select>
                                <select class="custom-select">
                                    <option selected>Price Range</option>
                                    <option value="1">$100 - $499</option>
                                    <option value="2">$500 - $999</option>
                                    <option value="3">$1000 - $4999</option>
                                </select>
                                <button type="submit" class="btn dorne-btn"><i class="fa fa-search pr-2" aria-hidden="true"></i> Search</button>
                            </form> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero Social Btn -->
    <div class="hero-social-btn">
        <div class="social-title d-flex align-items-center">
            <h6>Follow kami di Social Media</h6>
            <span></span>
        </div>
        <div class="social-btns">
          <a href="https://kostaria.id/url/ig"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="https://kostaria.id/url/wa"><i class="fa fa-whatsapp" aria-haspopup="true"></i></a>
          <a href="https://kostaria.id/url/line"><i class="fa fa-line" aria-haspopup="true"></i></a>
        </div>
    </div>
</section>
<!-- ***** Welcome Area End ***** -->

@endsection
