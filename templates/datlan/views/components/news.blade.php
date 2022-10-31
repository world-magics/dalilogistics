<!-- <section class="" id="features">
    <div class="container">
        <h3 class="mt-3 mb-5 pb-5" data-aos="fade-left">Наш Новости</h3>
        <div class="row">
            @forelse($news as $item)
            <div  class="col-sm-10 col-md-3 m-auto" style="padding-bottom: 30px;">
                 <div data-aos="zoom-in" class="card border-light bg-light">
                  <a href="{{route('web.see-all.news')}}"><img src="/template/datlan/images/{{$item->image}}" class="card-img-top" alt="..."></a>
                  <div class="card-body">
                    <h5>{{$item->title}}</h5>
                    <p class="card-text">{{$item->info}}</p>
                    <a href="{{route('web.see-all.news')}}"><button class="btn btn-outline-primary btn-sm">Читать далее</button></a>
                  </div>
                </div>
            </div>
            @empty

            @endforelse
        </div>
    </div>
</section> -->
