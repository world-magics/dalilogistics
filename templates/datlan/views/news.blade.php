@extends('template::layouts.default')
@section('content')
<section class="" id="features">
      <div class="container">
        <h2 class="text-center" style="padding: 50px">Наш Новости</h2>
        @forelse($news as $item)
        <div class="row">
          <div class="col">
            <div class="card mb-3 bg-light" style="max-width: 1400px; border: none;">
              <div class="row g-0">
                <div class="col-md-3">
                  <a href="assets/imgs/news_img.jpg" target="_blank"><img src="/template/datlan/images/{{$item->image}}" class="img-fluid rounded-start" alt="..."></a>
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title">{{$item->title}}</h5>
                    <p class="card-text">{{$item->info}}</p>
                    
                  </div>
                </div>
              </div>
            </div>        
          </div>
        </div>
        @empty
        @endforelse
      </div>
    </section>
@endsection