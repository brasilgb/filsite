<div class="">
    <header class="pt-24 bg-[#162131]">
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <div>
                    <img src={{ asset('storage/' . $category->featured) }} alt="">
                </div>
            @endif
        @endforeach
    </header>

    <div class="bg-[#162131] py-2">
        <div
            class="container m-auto overflow-auto flex items-center md:justify-start justify-between md:gap-6 bg-[#253650] rounded-md p-1">
            @foreach ($categories as $category)
                @if (!is_null($category->category_id))
                    <button type="button" wire:click="servicesall({{ $category->id }})"
                        class="px-6 py-2 rounded-md cursor-pointer drop-shadow-md {{ $category->id == $active || $category->id == $active2 || $category->id == $active3
                            ? 'bg-[#CA0156] border border-[#eb0766] text-white shadow-md'
                            : 'bg-transparent text-white' }}">
                        {{ $category->name }}
                    </button>
                @endif
            @endforeach
        </div>
    </div>

    @if (count($categories) > 0)
        @foreach ($categories as $category)
            @if (is_null($category->category_id))
                <section class="container m-auto py-2">
                    <div class=" text-3xl font-light text-[#162131]">
                        {{ $category->name }}<span class="text-base"> / </span>{{ $categoryActive->name }}
                    </div>
                    <div class="text-sm text-slate-400 pb-6">
                        {!! $category->description !!}
                    </div>
                </section>
            @endif
        @endforeach
    @endif

    <div class="container m-auto grid md:grid-cols-4 gap-4 py-10 md:px-0 px-2">
        @if (count($allservices) > 0)
            @foreach ($allservices as $service)
                @if (count($service->services) > 0)
                    @foreach ($service->services as $srv)
                        <div data-aos="fade-out" class=" bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="rounded-t-lg" src={{ asset('storage/' . $srv->featured) }} alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <p class="mb-4 font-normal text-gray-700">{!! $srv->content !!}</p>
                                <div class="mt-6 flex justify-end">
                                    <a href="https://api.whatsapp.com/send?phone=5551995179173&text=Gostaria de um orçamento sobre "
                                        class="inline-flex items-center gap-4 px-3 py-2 text-sm font-medium text-center text-white bg-[#25D366] hover:bg-[#25D366e3] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Solicite orçamento
                                        <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 308"
                                            xml:space="preserve" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="XMLID_468_">
                                                    <path id="XMLID_469_"
                                                        d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z">
                                                    </path>
                                                    <path id="XMLID_470_"
                                                        d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @else
            @foreach ($services as $service)
                @if (count($service->services) > 0)
                    @foreach ($service->services as $srv)
                        <div data-aos="fade-out" class=" bg-white border border-gray-200 rounded-lg shadow-sm">
                            <img class="rounded-t-lg" src={{ asset('storage/' . $srv->featured) }} alt="" />
                            <div class="p-5">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900">{{ $srv->title }}
                                </h5>
                                <p class="mb-4 font-normal text-gray-700">{!! $srv->content !!}</p>
                                <div class="mt-6 flex justify-end">
                                    <a href="https://api.whatsapp.com/send?phone=5551995179173&text=Gostaria de um orçamento sobre "
                                        class="inline-flex items-center gap-4 px-3 py-2 text-sm font-medium text-center text-white bg-[#25D366] hover:bg-[#25D366e3] rounded-lg focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        Solicite orçamento
                                        <svg fill="#ffffff" height="20px" width="20px" version="1.1" id="Layer_1"
                                            xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 308 308"
                                            xml:space="preserve" stroke="#ffffff">
                                            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                            <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                stroke-linejoin="round">
                                            </g>
                                            <g id="SVGRepo_iconCarrier">
                                                <g id="XMLID_468_">
                                                    <path id="XMLID_469_"
                                                        d="M227.904,176.981c-0.6-0.288-23.054-11.345-27.044-12.781c-1.629-0.585-3.374-1.156-5.23-1.156 c-3.032,0-5.579,1.511-7.563,4.479c-2.243,3.334-9.033,11.271-11.131,13.642c-0.274,0.313-0.648,0.687-0.872,0.687 c-0.201,0-3.676-1.431-4.728-1.888c-24.087-10.463-42.37-35.624-44.877-39.867c-0.358-0.61-0.373-0.887-0.376-0.887 c0.088-0.323,0.898-1.135,1.316-1.554c1.223-1.21,2.548-2.805,3.83-4.348c0.607-0.731,1.215-1.463,1.812-2.153 c1.86-2.164,2.688-3.844,3.648-5.79l0.503-1.011c2.344-4.657,0.342-8.587-0.305-9.856c-0.531-1.062-10.012-23.944-11.02-26.348 c-2.424-5.801-5.627-8.502-10.078-8.502c-0.413,0,0,0-1.732,0.073c-2.109,0.089-13.594,1.601-18.672,4.802 c-5.385,3.395-14.495,14.217-14.495,33.249c0,17.129,10.87,33.302,15.537,39.453c0.116,0.155,0.329,0.47,0.638,0.922 c17.873,26.102,40.154,45.446,62.741,54.469c21.745,8.686,32.042,9.69,37.896,9.69c0.001,0,0.001,0,0.001,0 c2.46,0,4.429-0.193,6.166-0.364l1.102-0.105c7.512-0.666,24.02-9.22,27.775-19.655c2.958-8.219,3.738-17.199,1.77-20.458 C233.168,179.508,230.845,178.393,227.904,176.981z">
                                                    </path>
                                                    <path id="XMLID_470_"
                                                        d="M156.734,0C73.318,0,5.454,67.354,5.454,150.143c0,26.777,7.166,52.988,20.741,75.928L0.212,302.716 c-0.484,1.429-0.124,3.009,0.933,4.085C1.908,307.58,2.943,308,4,308c0.405,0,0.813-0.061,1.211-0.188l79.92-25.396 c21.87,11.685,46.588,17.853,71.604,17.853C240.143,300.27,308,232.923,308,150.143C308,67.354,240.143,0,156.734,0z M156.734,268.994c-23.539,0-46.338-6.797-65.936-19.657c-0.659-0.433-1.424-0.655-2.194-0.655c-0.407,0-0.815,0.062-1.212,0.188 l-40.035,12.726l12.924-38.129c0.418-1.234,0.209-2.595-0.561-3.647c-14.924-20.392-22.813-44.485-22.813-69.677 c0-65.543,53.754-118.867,119.826-118.867c66.064,0,119.812,53.324,119.812,118.867 C276.546,215.678,222.799,268.994,156.734,268.994z">
                                                    </path>
                                                </g>
                                            </g>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            @endforeach
        @endif
    </div>
</div>
