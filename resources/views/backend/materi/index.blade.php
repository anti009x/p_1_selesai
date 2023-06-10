@extends('layouts.app')

@section('content')
    <!-- Sertakan CSS Bootstrap yang spesifik untuk file ini -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .cardou {
            margin-right: 30px;
            margin-top: 3rem;
        }

        .btn-potion1 {
            margin-bottom: -20px;
        }

        .btn-potion {

            margin-bottom: -15px;
        }

        .btn-potion1 a,
        .btn-potion a {
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            margin-bottom: 19px;
        }

        .hihi {
            margin-left: 30rem;

            margin-top: 1rem;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
            color: #00204a;

        }

        h3 {
            font-family: 'Courier New', Courier, monospace;
            color: #FFFFFF;
            font-weight: bold;

        }
    </style>
    <div class="hihi">
        <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"
            style="width: 15rem;">
            <h3>
                BELAJAR SEKARANG
            </h3>
        </button>
    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="cardou">
            <div class="card" style="width: 18rem; height: 550px;">
                <img src="{{ asset('matematika.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">MATEMATIKA</h5>
                    <p class="card-text" style="text-align: justify">Matematika, adalah bidang ilmu, yang mencakup studi
                        tentang topik-topik seperti
                        bilangan, rumus dan struktur terkait, bangun dan ruang tempat mereka berada, dan besaran serta
                        perubahannya. Tidak ada kesepakatan umum tentang ruang lingkup yang tepat atau status
                        epistemologisnya</p>
                    <div class="btn-potion">
                        <a href="matematika" class="btn btn-primary">BELAJAR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cardou">
            <div class="card" style="width: 18rem; height: 550px; ">
                <img src="{{ asset('ipa.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title"> IPA</h5>
                    <p class="card-text" style="text-align: justify">Ilmu pengetahuan alam atau kerap diperpendek sebagai
                        ilmu alam adalah istilah yang
                        digunakan yang merujuk pada rumpun ilmu di mana objeknya adalah benda-benda alam dengan hukum-hukum
                        yang pasti dan umum, berlaku kapan pun dan di mana pun. Orang yang menekuni bidang ilmu pengetahuan
                        alam disebut sebagai Saintis.</p>
                    <div class="btn-potion">
                        <a href="ipa" class="btn btn-primary">BELAJAR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cardou">
            <div class="card" style="width: 18rem; height: 550px; ">
                <img src="{{ asset('ips.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">IPS</h5>
                    <p class="card-text" style="text-align: justify">Pendidikan IPS adalah penyederhanaan atau adaptasi dari
                        disiplin ilmu-ilmu sosial
                        dan humaniora, serta kegiatan dasar manusia yang diorganisasikan dan disajikan secara ilmiah dan
                        pedagogik/psikologis untuk tujuan pendidikan. Definisi tersebut berlaku untuk pendidikan dasar dan
                        menengah</p>
                    <div class="btn-potion">
                        <a href="ips" class="btn btn-primary">BELAJAR</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="cardou">
            <div class="card" style="width: 18rem; height: 550px; ">
                <img src="{{ asset('indonesia.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">BAHASA INDONESIA</h5>
                    <p class="card-text" style="text-align: justify">Bahasa Indonesia merupakan mata pelajaran yang
                        diberikan di sekolah untuk
                        meningkatkan keterampilan siswa dalam menulis, membaca, dan berkomunikasi.</p>
                    <div class="btn-potion">
                        <a href="indonesia" class="btn btn-primary">BELAJAR</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sertakan JS Bootstrap yang spesifik untuk file ini -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
@endsection

@section('styles')
    @parent
    <!-- Tambahkan CSS tambahan khusus untuk file ini -->
    <style>

    </style>
@endsection

@section('scripts')
    @parent
@endsection
