@inject('partners', 'App\Services\PartnersService')
<section class="pt-5 pb-5" id="partners">
    <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
            <h2>@lang("template::all.they_trust_us")</h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, omnis?</p> --}}
        </div>
        <div id="myCarousel" class="carousel slide container" data-bs-ride="carousel">
            <div class="carousel-inner w-100">
                @foreach ($partners->getPartnersAll() as $item)
                    @if ($loop->first)
                    <div class="carousel-item active">
                        <div class="col-md-3">
                          <div class="card card-body">
                            <a href="{{ $item->link }}">
                                <img class="img-fluid" src="/template/datlan/image/{{$item->image}}">
                            </a>
                          </div>
                        </div>
                      </div>
                    @else
                    <div class="carousel-item">
                        <div class="col-md-3">
                          <div class="card card-body">
                            <a href="{{ $item->link }}">
                                <img class="img-fluid" src="/template/datlan/image/{{$item->image}}">
                            </a>
                          </div>
                        </div>
                      </div>
                    @endif
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

