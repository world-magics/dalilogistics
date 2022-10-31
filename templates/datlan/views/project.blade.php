@extends('template::layouts.default')
@section('content')
<section class="" id="features">
    <div class="container">
      <h2 class="text-center" style="padding: 30px">Проект</h2>
      <div class="row" style="padding: 30px; background-color: #FFFFFF;">
        <div class="col">
          <img src="/template/datlan/images/{{ $project->image }}" class="img-thumbnail" alt="...">
        </div>
        <div class="col" style="padding: 50px">
          <h2>{{ $project->title }}</h2>
          <h6>{{ $project->short_info }}</h6>
          <p>{!! $project->content !!}</p>
        </div>
      </div>
    </div>
  </section>
@endsection
