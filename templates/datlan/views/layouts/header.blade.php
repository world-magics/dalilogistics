@inject("adminService", "App\Services\AdminService")
@php
    $trans = $adminService;
@endphp
<nav id="scrollspy" class="navbar page-navbar navbar-light navbar-expand-md fixed-top" data-spy="affix" data-offset-top="20">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="/template/datlan/logo.png" alt="logo" class="img-fluid" width="180px;"/> <span class="text-dark"></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#service">@lang("template::all.service")</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#project">@lang("template::all.projects")</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#partners">@lang("template::all.they_trust_us")</a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#features">Новости</a>
                </li> --}}
                {{-- <li class="nav-item">
                    <a class="nav-link" href="#testmonial">Наши партнеры</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="#contact">@lang("template::all.contacts")</a>
                </li>
                <div class="switch-lang">
                    @foreach(\App\Services\AdminService::getLocales() as $locale)
                        @if($locale["is_current_locale"])
                            <div class="current-lang">
                                <p class="lang-text">{{\Illuminate\Support\Str::upper($locale["code"])}}</p>
                                <img src="{{$locale["icon"]}}" alt="" class="lang-flag">
                            </div>
                        @else
                            <a class="lang-dropdown" href="/{{$locale["translated_url"]}}">
                                <div class="selecting-lang">
                                    <p class="lang-text">{{\Illuminate\Support\Str::upper($locale["code"])}}</p>
                                    <img src="{{$locale["icon"]}}" alt="" class="lang-flag">
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </ul>
        </div>
    </div>
</nav>
