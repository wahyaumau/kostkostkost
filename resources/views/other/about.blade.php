@extends('master.site')

@section('title','About | Kostaria.id')
<!-- ***** Welcome Area Start ***** -->

@section('content')
<!-- ***** Breadcumb Area Start ***** -->
<div class="breadcumb-area bg-img bg-overlay" style="background-image: url(assets/img/bg-img/hero-1.jpg)">
</div>
<!-- ***** Breadcumb Area End ***** -->

<!-- ***** Contact Area Start ***** -->
<div class="dorne-contact-area d-md-flex" id="contact">
    <!-- Contact Form Area -->
    <div class="contact-form-area equal-height">
        <div class="contact-text">
            <h4>Hello, Get in touch with us</h4>
            <p>KOSTARIA adalah usaha di bidang jasa dengan mengoptimalkan teknologi dan berkontribusi untuk masyarakat khususnya mahasiswa dalam rangka pengembangan mahasiswa mandiri dan prestatif yang dihimpun oleh KOSTARIA WITH MILLENIALS.
            </p>
            <p>
            KOSTARIA merupakan fasilitator bagi mahasiswa untuk mencari tempat tinggal secara online selama kuliah. KOSTARIA melayani konsumen dari pencarian secara online, survey, transaksi, hingga konsumen akan melanjutkan atau pindah tempat tinggal. Mahasiswa dapat mengakses KOSTARIA di social media Instagram dan Line serta pada website dan aplikasi.
            </p>
            <p>
            Fasilitas survey yang diberikan oleh KOSTARIA adalah, mahasiswa dapat melakukan safari kosan dengan memilih lebih dari 3 kosan untuk melakukan survey secara gratis. KOSTARIA juga memberikan fasilitas cicilan kosan bagi mahasiswa terkategori orang yang layak untuk dibantu.
            </p>
            <p>
            KOSTARIA memberikan fasilitas untuk jual-beli furnish kamar baru dan bekas juga kebutuhan mahasiswa lainnya seperti buku pada social media line dan instagram.
            </p>
            <p>
            Dengan menggunakan jasa kami, anda sudah menjadi bagian dari mahasiswa yang siap untuk menyelesaikan masalah-masalah dalam kehidupan anda
            </p>
            <div class="contact-info d-lg-flex">
                <div class="single-contact-info">
                    <h6><i class="fa fa-map-signs" aria-hidden="true"></i> Bandung, Jawa Barat</h6>
                    <h6><i class="fa fa-map-signs" aria-hidden="true"></i> Indonesia</h6>
                </div>
                <div class="single-contact-info">
                    <h6><i class="fa fa-envelope-o" aria-hidden="true"></i> saran@kostaria.id</h6>
                    <h6><i class="fa fa-phone" aria-hidden="true"></i> +6285872307307</h6>
                </div>
            </div>
        </div>
        <!-- <div class="contact-form">
            <div class="contact-form-title">
                <h6>Contact Business</h6>
            </div>
            <form action="#">
                <div class="row">
                    <div class="col-12 col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="col-12 col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Email Address">
                    </div>
                    <div class="col-12">
                        <input type="text" name="subject" class="form-control" placeholder="Subject">
                    </div>
                    <div class="col-12">
                        <textarea name="message" class="form-control" id="Message" cols="30" rows="10" placeholder="Your Message"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn dorne-btn">Send</button>
                    </div>
                </div>
            </form>
        </div>
    </div> -->
    <!-- Map Area -->
    <div class="dorne-map-area equal-height">
        <div id="googleMap"></div>
    </div>
</div>
<!-- ***** Contact Area End ***** -->
@endsection
