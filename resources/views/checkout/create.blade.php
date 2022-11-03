@extends('layouts.app')

@section('content')
    <section class="checkout">
        <script src="https://cdn.tailwindcss.com"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="/javascript.js"></script>
        <script src="https://kit.fontawesome.com/220acaac22.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
        <div class="container">
            <div class="row text-center pb-70">
                <div class="col-lg-12 col-12 header-wrap">
                    <p class="story">
                        UMKMMovement 1.0 {{$event->title}}
                    </p>
                    <h2 class="primary-header">
                        Order Ticket
                    </h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-9 col-12">
                    <div class="row">
                        <div class="col-lg-5 col-12">
                            <div class="item-bootcamp">
                                <img src="{{ asset('images/logoumkm.png') }}" alt="" class="img-fluid">
                                <h1 class="package text-uppercase">
                                    {{ $event->title }}
                                    <br>
                                    Rp {{$event->price}}
                                </h1>
                                <p class="description">
                                    Kabar Gembira untuk masyarakat Sidoarjo dan Sekitarnya! Sidoarjo UMKMovement bakalan ada
                                    Guest Star yang super seru abis!
                                </p>
                                <div class="text-bold">PROMO BUY 5 GET 1</div>
                                <div class="mb-8">
                                    <div class="text-lg font-bold my-8 border-l-4 border-blue-500 pl-2 ">
                                        Deskripsi Acara
                                    </div>
                                    <div class=" my-4 font-bold">
                                        Informasi Penting
                                    </div>
                                    <div class="text-base leading-loose">
                                        <ul class="list-disc pl-6 list-outside marker:text-blue-400 space-y-3">
                                            <li>Wajib menerapkan Protokol Kesehatan</li>
                                            <li>Wajib menjaga kebersihan Venue acara</li>
                                            <li>Wajib menjaga barang bawaan pribadi karena kehilangan bukan tanggung jawab panitia</li>
                                            <li>Dilarang membawa alkohol dan obat-obatan terlarang</li>
                                            <li>Dilarang membawa benda tajam</li>
                                        <br>
                                    </div>
                                    <div class="font-bold my-4 leading-loose border-l-4 border-blue-500 pl-2 ">
                                        Syarat & Ketentuan
                                    </div>
                                    <div class="leading-loose">
                                        <ul class="list-disc pl-6 list-outside marker:text-blue-400 space-y-3">
                                            <li>Jika kamu melakukan pembelian tiket acara ini, maka dianggap sudah membaca, memahami, dan menyetujui seluruh Syarat & Ketentuan dari acara.
                                            </li>
                                            <li>Tiket yang sudah dibeli tidak dapat dikembalikan.</li>
                                            <li>Tiket yang sudah dibeli tidak dapat diganti jadwalnya</li>
                                            <li>Pembeli wajib mengisi data diri pribadi saat memesan.</li>
                                            <li>Pengunjung wajib sudah divaksin dan memiliki aplikasi Peduli Lindungi.</li>
                                            <li>Pengunjung wajib menggunakan masker selama acara berlangsung.</li>
                                            <li>Pengunjung wajib menjaga protokol kesehatan yang berlaku.</li>
                                            <li>E-tiket tidak dapat diuangkan.</li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-12"></div>
                        <div class="col-lg-6 col-12">
                            <form action="{{ route('checkout.store', $event->id) }}" class="basic-form" method="POST">
                                @csrf
                                <div class="mb-4">
                                    <label class="form-label">Full Name</label>
                                    <input name="name" type="text"
                                        class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" required />
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Email Address</label>
                                    <input name="email" type="email"
                                        class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" required />
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Occupation</label>
                                    <input name="occupation" type="text" class="form-control" />
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Phone</label>
                                    <input name="phone" type="text"
                                        class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" required />
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Address</label>
                                    <input name="address" type="text"
                                        class="form-control {{ $errors->has('address') ? 'is-invalid' : '' }}" />
                                    @if ($errors->has('address'))
                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                    @endif
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">Jumlah Ticket</label>
                                    <input name="qty" type="number" value="0" min="0" max="10"
                                        class="form-control {{ $errors->has('qty') ? 'is-invalid' : '' }}" />
                                    @if ($errors->has('qty'))
                                        <p class="text-danger">{{ $errors->first('qty') }}</p>
                                    @endif
                                </div>
                                {{-- @foreach ($event_details as $event_detail)
                                <label for="form-lavel">{{$event_detail->ticket_name}}</label>
                                    <input type="hidden" name="item[{{ $loop->index }}][name]" readonly value="{{ $event_detail->ticket_name}}" />
                              
                                    <input type="hidden" name="item[{{ $loop->index }}][event_id]" readonly value="{{ $event_detail->event_id }}" />
                               
                                    <input type="number" name="item[{{ $loop->index }}][qty]" value="0" min="0" max="10"/>
                                    
                                    @endforeach --}}
                                <div class="mb-4">
                                    <label class="form-label">Discount Promo</label>
                                    <input name="discount" type="text"
                                        class="form-control {{ $errors->has('discount') ? 'is-invalid' : '' }}" />
                                    @if ($errors->has('discount'))
                                        <p class="text-danger">{{ $errors->first('discount') }}</p>
                                    @endif
                                </div>
                                <button type="submit" class="w-100 btn btn-primary">Pay Now</button>
                                <p class="text-center subheader mt-4">
                                    <img src="{{ asset('images/ic_secure.svg') }}" alt=""> Your payment is secure
                                    and encrypted.
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<script>
    function calc() {
        var tmpText = "";
        var total = 0;
        $(".price").each(function(index) {
            //strip string into num
            tmpText = $(this).text();
            tmpText = tmpText.substr(1);;
            //add number
            total += Number(tmpText)
            console.log(index + ": " + $(this).text());
        });
        $("#result").text("$" + total);
    }
</script>
