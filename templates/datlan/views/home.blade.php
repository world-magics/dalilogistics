@extends('template::layouts.default')
@section('content')

   @include('template::components.promo')
   @include('template::components.about')
   @include('template::components.kachestva')
   @include('template::components.proekti')
   @include('template::components.news')
   @include('template::components.nadyojnosti')
   @include('template::components.partnors')

    {{-- <section class="has-bg-img text-center text-light height-auto" style="background-image: url(assets/imgs/bg-img-2.jpg)">
        <h1 class="display-4 text-success" data-aos="fade-up-right"> Компания Datlan</h1>
    </section> --}}

   {{-- @include('template::components.formamessage') --}}
@endsection
