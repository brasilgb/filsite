<section>
    <div class="container m-auto py-16 grid grid-cols-4 gap-6">

@for ($x=0; $x <= 15; $x++)
        <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm">
            <a href="#">
                <img class="p-8 rounded-t-lg" src="https://flowbite.com/docs/images/products/apple-watch.png"
                    alt="product image" />
            </a>
            <div class="px-5 pb-5">
                <p class="text-sm text-gray-500">Apple</p>
                <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">Apple Watch Series 7 GPS, Aluminium
                        Case, Starlight Sport</h5>
                </a>
                <div class="flex items-center mt-2.5 mb-5">
                    <del class="bg-gray-100 text-[#CA0156] text-xs font-semibold px-2.5 py-0.5 rounded-sm ms-3">R$
                        2.558,36</del>
                    <span class="bg-blue-100 text-blue-800 text-lg font-semibold px-2.5 py-0.5 rounded-full ms-3">R$
                        2.235,27</span>
                </div>
                <div class="flex items-center justify-between">
                    <a href="#"
                        class="text-white bg-[#CA0156] hover:bg-[#ca0155e3] focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">
                        Detalhes
                    </a>
                    <a href="#"
                        class="text-white bg-transparent focus:ring-0 focus:outline-none p-2.5 text-center">
                        <img class="w-auto h-8" src={{ asset('images/msocial/whatsapp.svg') }} alt="">
                    </a>
                </div>
            </div>
        </div>
        @endfor
    </div>
</section>
