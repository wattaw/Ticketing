
<body class="bg-slate-100 ">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js"></script>
    <script src="/javascript.js"></script>
    <script src="https://kit.fontawesome.com/220acaac22.js" crossorigin="anonymous"></script>

   <link rel="stylesheet" href="/css/banner.css">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <!-- Navigation -->
    <div id="nav" class="bg-white">
        <div class="mx-auto container flex justify-between items-center px-4 md:px-0 md:w-10/12 lg:w-8/12">
            <div class="items-center flex">
                <img src="images/logo-sm.png" width="48" max-height="68" class="py-6 mr-2"/>
                <div class="font-medium text-2xl text-blue-400">IdeaTiket</div>
            </div>
            <ul class="place-items-end flex text-right invisible lg:visible">
                <li class="ml-8"><a href="">Home</a></li>
                <li class="ml-8"><a href="">Event</a></li>
                <li class="ml-8"><a href="">About</a></li>
                <li class="ml-8"><a href="" class="px-8 py-4 text-white bg-blue-600 font-semibold rounded-full border border-blue-200 hover:text-blue-600 hover:bg-blue-100 hover:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Log in</a></li>
            </ul>
        </div>
    </div>

    <!-- Hero Banner -->
    <div id="eventbanner" class="eventbanner bg-cover bg-fixed text-white"> 
        <div class="mx-auto container px-4 md:px-0 md:w-10/12 lg:w-8/12 flex flex-row">
            <div class="eventbannerflex flex items-center mx-auto min-h-300">
                <div class="text-center py-10">
                    <!-- <h2 class=" text-2xl text-sky-400">Proudly Present</h2> -->
                    <img src="http://ideacan.id/images/logoumkm.png" class="w-2/3 mx-auto" alt="">
                    <!-- <h1 class="text-4xl font-bold my-2 text-sky-400">Sidoarjo UMKMovement 1.0</h1> -->
                    <p class="text-base mb-6">Event meriah enterpreneur masyarakat Sidoarjo,<br> Yang dimeriahkan oleh banyak artis.</p>
                </div>
            </div>
        </div>
    </div> 

    <!-- Tiket Nav -->
    <div class="ticketnav bg-white ">
        <div class="mx-auto justify-between px-4 py-6 md:px-0 md:w-10/12 lg:w-8/12 items-center flex"> 
            <div class="w-1/3">
                <a href="" class="px-8 py-4 text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">Back</a>
            </div>
            <div class="w-1/3 text-center text-base">
                    Mon, 09 April 2020
            </div>
            <div class="w-1/3 text-right text-2xl font-bold">
                25:03:12:00 <br/> <span class="text-sm font-normal">Sebelum dimulai</span>
            </div>
        </div>
    </div>
    
    <!-- Form Tiket -->
    <div id="tiketform" class="container mx-auto  mt-6 lg:mt-12  px-4 md:px-0 md:w-10/12 lg:w-8/12 mb-12">
        <div class="lg:flex">
            <div class="tiketform-left w-full lg:w-3/5">

                <div class="text-lg font-bold mb-8 border-l-4 border-blue-500 pl-2">
                    Daftar Tiket
                </div>
    
                <!-- List tiket loop -->
                <div class="bg-white rounded-lg p-6 flex flex-col sm:flex-row mb-12 ">
                    <div class="ticketOps w-full sm:mb-0 mb-2">
                        <div class="text-lg sm:pb-4"><b>{{$event->title}}</b></div>
                        <div class="text-base sm:pb-4 ">Morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam.</div>
                        <div class="text-sm text-slate-400">Morbi tristique senectus</div>
                    </div>
                    <div class="ticketOps w-auto shrink-0 flex flex-col place-content-between">
                        <div class="sm:text-right mb-6 font-bold text-lg">Rp. {{$event->price}}</div>
                        <div class="products">
                            <div class="product number flex align-middle text-xl text-center" data-name="Tiket_01" data-price="{{$event->price}}" data-id="0">
                                <button class="minus w-14 h-14 flex items-center justify-center text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">-</button>
                                <input type="input" id="banyaktiket1" class="count w-8 mx-2 text-2xl text-center bg-transparent" value="1" disabled/>
                                <button class="plus w-14 h-14 flex items-center justify-center  text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- loop end -->

                <div class="text-lg font-bold mb-8 border-l-4 border-blue-500 pl-2">
                    Informasi Pemesan
                </div>

                <!-- Is Member? -->
                <div class="p-6 flex bg-white rounded-lg items-center justify-start flex-col sm:flex-row sm:justify-between mb-8">
                    <div class="sm:mb-0 mb-6 ">
                        <div class="text-xl leading-loose"><b>Sudah punya akun IdeaTiket?</b></div>
                        <div class="text-base opacity-40">Gunakan akunmu untuk mempercepat proses pemesanan!</div>
                    </div>
                    <a href="" class="shrink-0 text-center  w-full sm:w-auto px-8 py-4 text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                        Log in
                    </a>
                </div>

                <!-- form -->
                <div class="ticektlist p-6 bg-white rounded-lg">
                    <form action="" >
                        <div class="mb-8">
                            <label class="block text-gray-700 font-bold mb-2">
                            Nama Lengkap* <br>
                            <span class="font-normal text-sm opacity-40">Sesuai dengan KTP/PASPOR</span>
                              <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 mt-2 block w-full appearance-none leading-normal" type="input">
                             </label>
                        </div>
                        <div class="mb-8 ">
                            <label class="block text-gray-700 font-bold mb-2">
                            Email* <br>
                            <span class="font-normal text-sm opacity-40">E-tiket akan dikirim ke email kamu.</span>
                              <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 mt-2 block w-full appearance-none leading-normal" type="input">
                             </label>
                        </div>
                        <div class="">
                            <label class="block text-gray-700 font-bold mb-2">
                            Nomor Ponsel* <br>
                            <input class="leading-tight" type="checkbox">
                            <span class="text-sm font-normal opacity-40">
                                Kirim notifikasi pesanan via WhatsApp.
                            </span>
                              <input class="bg-white focus:outline-none focus:shadow-outline border border-gray-300 rounded-lg py-2 px-4 mt-2 block w-full appearance-none leading-normal" type="input">
                             </label>
                        </div>
                    </form>
                </div>
                <!-- form end -->

                <div class="my-8 p-4 bg-white rounded-lg">
                    <i class="fa-solid fa-circle-info text-yellow-500"></i>
                    <span class="text-base font-normal ml-2">
                        Pastikan datamu sudah benar.
                    </span>
                </div>

                
                <div class="mb-8">
                    <div class="text-lg font-bold my-8 border-l-4 border-blue-500 pl-2 ">
                        Deskripsi Acara
                    </div>
                    <div class=" my-4 font-bold">
                        LYFEONIAM
                    </div>
                    <div class="text-base leading-loose">
                        <p>
                            Konser Musik Paling Kece yang berlokasi tepat di tepi pantai dengan hamparan pasir yang luas membuat kalian terasa lebih nyaman dan bahagia ketika saling bernyanyi riang gembira.
                        </p><br>
                        <p>
                            Kalian bisa sambil menikmati sunset yang indah, bermain wahana, kuliner & berbelanja, serta dapat melihat mobil mobil modifikasi paling keren dan terbesar di Indonesia.<br>
                        </p><br>
                        <p>
                            Konsep unik dan berbeda inilah yang mengharuskan kalian dateng. Dan tentunya lineup Artis akan terus bertambah. See u guys! Have fun!<br>
                        </p> <br>
                    </div>
                    <div class="font-bold my-4 leading-loose border-l-4 border-blue-500 pl-2 ">
                        Syarat & Ketentuan
                    </div>
                    <div class="leading-loose">
                        <ul class="list-disc pl-6 list-outside marker:text-blue-400 space-y-3">
                            <li>Maksimum pembelian 5 (Lima) tiket dalam satu transaksi.</li>
                            <li>iket tidak bisa dipindahtangankan.</li>
                            <li>Semua pemegang Ticket diwajibkan untuk melakukan vaksin COVID-19 minimal 2 kali.</li>
                            <li>E-Voucher wajib ditukar dengan tiket yang sah di tempat acara.</li>
                            <li>Jika ada pertanyaan lebih lanjut bisa contact wa ke +62 81 252 441 432 / email ke lyfe@hinofficial.com</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Total Pesanan -->
            <div class="w-full lg:w-2/5 ">
                <div class="sticky top-14 lg:ml-6">
                    <div class="bg-white rounded-lg p-6">
                        
                        <div id="cartItems">Loading cart...</div>

                    <!-- loop -->
                        <div class="items-center flex justify-between">
                            <div class="flex items-center">
                                <div class="p-2">
                                    <i class="fa-solid fa-ticket scale-150 -rotate-45 text-blue-500"></i>
                                </div>
                                <div class="p-2">
                                    <div class="text-lg font-bold">Festival 001</div>
                                    <div id="banyaktiket1" class="opacity-40">x Tiket</div>
                                </div>
                            </div>
                            <div class="text-right shrink-0 text-base font-bold">Rp. {{$event->price}}</div>
                        </div>
                    <!-- loop end -->

                        <div name="horizontaline" class="border-b-2 border-whitesmoke my-6"></div>
                        <div class="flex justify-between mb-6">
                            <div>Total 3 Tiket</div>
                            <div id="totalPrice" class="text-lg font-bold">Rp. 600.000</div>
                        </div>
                        <div class="next text-center  w-full   sm:w-auto px-8 py-4 text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2">
                            <a href="backup.htm">Beli Tiket</a>
                        </div>
                    </div>

                    <div class="flex py-6 items-center">
                        <div class="w-1/2 opacity-20">Bagikan Event</div>
                        <div class="w-1/2">
                            <div class="flex justify-end">
                                <a class="w-8 h-8 md:w-12 md:h-12 flex justify-center items-center  mr-2  sm:w-auto text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"><i class="fa-brands fa-facebook-f"></i></a>
                                <a class="w-8 h-8 md:w-12 md:h-12 flex justify-center items-center mr-2  sm:w-auto  text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"><i class="fa-brands fa-twitter"></i></a>
                                <a class="w-8 h-8 md:w-12 md:h-12 flex justify-center items-center   sm:w-auto  text-blue-600 font-semibold rounded-full border border-blue-200 hover:text-white hover:bg-blue-600 hover:border-transparent focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-offset-2"><i class="fa-brands fa-instagram"></i></a>
                            </div> 
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>












    <!-- subs -->
    <div class="subs max-w">
        <div class="container bg-white rounded-lg text-center mx-auto md:w-10/12 lg:w-8/12 py-20 my-12">
            <h1 class=" text-xl mb-4">Subscribe Berita IdeaTiket</h1>
            <div class="font-bold text-4xl">TO GET EXCLUSIVE BENIFITS</div>
            <div class="">
                <form action=""
                    method="get" class="validate">
                    <input type="email" value="" name="EMAIL" class="bg-blue-100 rounded-full email w-1/2 h-12 p-6 my-8" id="mce-EMAIL" placeholder="E-mail" required>
                    <input type="submit" value="subscribe" name="subscribe" id="mc-embedded-subscribe" class="mc-button">
                </form>
            </div>
            <div class="opacity-40">We respect your privacy, so we never share your info.</div>
        </div>
    </div>

    <!-- footer -->
    <div class="bg-dark-grey max-w flex text-white">
        <div class="container mx-auto text-center md:w-10/12 lg:w-8/12 px-4">
          <div class="flex justify-start items-start items-center">
            <ul class="flex py-16 items-center">
              <li class="mr-8">
                <a href="#" class="no-underline hover:underline text-white">
                  <h2 class="text-3xl text-bold">IdeaTiket</h2>
                </a>
              </li>
              <li class="mr-8 invisible sm:visible">
                <a class="text-grey-darker no-underline hover:text-white" href="#">Terms of Use</a>
              </li>
              <li class="mr-8 invisible sm:visible">
                <a class="text-grey-darker no-underline hover:text-white" href="#">Privacy</a>
              </li>
            </ul>
            
            <ul class="flex py-16 ml-auto invisible sm:visible">
              <li class="mr-8">
                <a class="text-grey-darker no-underline hover:text-white" href="#">Instagram</a>
              </li>
              <li class="mr-8">
                <a class="text-grey-darker no-underline hover:text-white" href="#">Facebook</a>
              </li>
              <li class="mr-8">
                <a class="text-grey-darker no-underline hover:text-white" href="#">Twitter</a>
              </li>
            </ul>
          </div>
        </div>
    </div>
      
</body>

<script>
    $(document).ready(function() {
        $('.minus').click(function () {
            var $input = $(this).parent().find('input');
            var count = parseInt($input.val()) - 1;
            count = count < 1 ? 0 : count;
            $input.val(count);
            $input.change();
            return false;
        });
        $('.plus').click(function () {
            var $input = $(this).parent().find('input');
            $input.val(parseInt($input.val()) + 1);
            $input.change();
            return false;
        });
    });
</script>

<script  type="text/template" id="carT" >
    <% _.each(items, function (item) { %> <div class = "panel"> <h3> <%= item.name %> </h3>  <span class="label">
  <%= item.count %> piece<% if(item.count > 1)
  {%>s
  <%}%> for <%= item.total %>$</span > </div>
  <% }); %>
</script>

<script>
    function copyTextValue(bf) {
  var banyak = bf.checked ? document.getElementById("banyaktiket1").value : '';
  document.getElementById("banyaktiket2").value = banyak;
}
</script>