<section class="pt-32 pb-16 px-8 md:px-12 bg-[#162131] ">
    <!-- Slider main container -->
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)
                <div class="swiper-slide"><img src={{ asset('storage/' . $slider->image) }} alt="" /></div>
            @endforeach
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
    </div>
</section>
