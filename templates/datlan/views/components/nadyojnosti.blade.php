<!-- <section>
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <h3 class="mt-3 mb-5 pb-5">Нам доверяют</h3>

            <div class="col-md-6">
                <div class="img-wrapper">
                    <div class="after"></div>
                    <img data-aos="fade-right" src="/template/datlan/images/" class="w-100" alt="images">
                </div>
            </div>
            <div class="col-md-5">
                <h6 data-aos="fade-left" class="title  mb-3"></h6>
                <p data-aos="fade-right"></p>

            </div>
        </div>
    </div>
</section>
 -->
@inject('why_me','\App\Services\NadyojnostService')
<section id="why-us" class="why-us section-bg">
    <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
            <h2>@lang("template::all.why_us")</h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, omnis?</p> --}}
        </div>

        <div class="row gy-4">
            <div class="col-lg-12 d-flex align-items-center">
                <div class="row gy-4">
                @foreach ($why_me->getWhyMeAll() as $item)
                <div class="col-xl-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                      <i class="bi bi-clipboard-data"></i>
                      <h4>{{$item->title}}</h4>
                      <p>{{$item->content}}</p>
                    </div>
                  </div>
                @endforeach
              <!-- End Icon Box -->
{{--
              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="300">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <h4>Ullamco laboris ladore pan</h4>
                  <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                </div>
              </div><!-- End Icon Box -->

              <div class="col-xl-4" data-aos="fade-up" data-aos-delay="400">
                <div class="icon-box d-flex flex-column justify-content-center align-items-center">
                  <h4>Labore consequatur incidid dolore</h4>
                  <p>Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                </div>
              </div><!-- End Icon Box --> --}}

                </div>
            </div>
        </div>
    </div>
</section>
