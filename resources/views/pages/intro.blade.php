
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">
            <div class="row">
                <div class="col-lg-5 col-md-6">
                    <div class="about-img" data-aos="fade-right" data-aos-delay="100">
                        <img src="{{ url('frontend/assets/img/about-img.jpg') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="about-content" data-aos="fade-left" data-aos-delay="100">
                    @foreach($items as $item) 
                        <h2>{{$item->n_title}}</h2> 
                        {!! $item->n_detail !!}
                    @endforeach
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End About Section -->

</main><!-- End #main -->
