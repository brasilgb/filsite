<section class="pt-24 pb-0 px-0  bg-[#162131] ">
    <!-- Slider main container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
            <div class="swiper-slide"><img src={{ asset('storage/'. $slider->image) }} alt="" /></div>
            @endforeach
            </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
