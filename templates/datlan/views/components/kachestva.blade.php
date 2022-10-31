@inject('services', 'App\Services\KachestvaService')
<section id="service" class="services">
      <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
          <h2>@lang("template::all.service")</h2>
        </div>
        <div class="row">
            @foreach ( $services->getServicesAll() as $item)
            <div class="col-lg-6 col-md-6 mt-5">
                <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
                  <div class="icon"><img src="/template/datlan/images/{{$item->imgurl}}" alt="About Us" width="100px;"></div>
                  <h4 class="title" style="margin-left: 60px;"><a href="#">{{ $item->title }}</a></h4>
                   {{-- @if ($item->content != null)
                    <p class="description" style="margin-left: 60px;">{{ $item->content }}</p>
                   @endif --}}
                </div>
              </div>
            @endforeach
          {{-- <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left">
              <div class="icon"><i class="bi bi-briefcase" style="color: #ff689b;"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="100">
              <div class="icon"><img src="/template/datlan/images/{{$kachestva->imgurl}}" alt="About Us" width="25%"></div>
              <h4 class="title"><a href="">{{$kachestva->title}}</a></h4>
              <p class="description">{{ $kachestva->content }}</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="200">
              <div class="icon"><i class="bi bi-card-checklist" style="color: #3fcdc7;"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="300">
              <div class="icon"><i class="bi bi-binoculars" style="color:#41cf2e;"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="400">
              <div class="icon"><i class="bi bi-globe" style="color: #d6ff22;"></i></div>
              <h4 class="title"><a href="">Nemo Enim</a></h4>
              <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mt-5">
            <div class="icon-box aos-init aos-animate" data-aos="zoom-in-left" data-aos-delay="500">
              <div class="icon"><i class="bi bi-clock" style="color: #4680ff;"></i></div>
              <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
              <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
            </div>
          </div> --}}
        </div>

      </div>
    </section>
