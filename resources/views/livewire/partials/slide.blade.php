<section class="pt-24 pb-0 px-0  bg-[#162131] ">
    <!-- Slider main container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide">
                <a href={{ $slider->link ? $slider->link : '/' }} target="_blank" rel="noopener noreferrer">
                    <img src={{ asset('storage/'. $slider->image) }} alt="" />
                </a>
            </div>
            @endforeach
            </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
