@extends('template::layouts.default')
@section('content')
   <section class="" id="features">
      <div class="container">
        <h2 class="text-center" style="padding: 30px">Последний Проекты</h2>
        <div class="row">
        @forelse($projects as $item)
          <div class="col-md-4" style="margin-bottom: 20px;">
            <div class="card border-light bg-light" style="width: 20rem; padding: 1px; margin: 5px;">
              <a href=""><img src="/template/datlan/images/{{$item->image}}" class="card-img-top" alt="..."></a>
              <div class="card-body">
                <h5>{{$item->title}}</h5>
                <p class="card-text">{{$item->short_info}}</p>
                <button class="btn btn-outline-primary btn-sm"><a href="{{ route('web.project.view', ['id'=>$item->id]) }}">Learn More</a></button>
              </div>
            </div>
          </div>
        @empty
        @endforelse
        </div>
      </div>
    </section>
@endsection
