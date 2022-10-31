<section id="project">
    <div class="container">
        <div class="section-title aos-init aos-animate" data-aos="zoom-out">
            <h2>@lang("template::all.projects")</h2>
            {{-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt, omnis?</p> --}}
        </div>
        <div class="row justify-content-between align-items-center">
            <div class="col-md-5">
                <h6 class="title mb-3" data-aos="fade-right">{{$lastProject->title}}</h6>
                <p data-aos="fade-left">{{$lastProject->short_info}}</p>
                <!-- <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequuntur, amet!</p> -->
                <a data-aos="fade-left" href="{{route('web.project.index')}}"><button class="btn btn-outline-primary btn-sm">@lang("template::all.btn_more")</button></a>
            </div>
            <div class="col-md-6">
                <div class="img-wrapper">
                    <div class="after right"></div>
                    <a href="{{route('web.project.index')}}"><img data-aos="fade-right" src="/template/datlan/images/{{$lastProject->image}}" class="w-100" alt="About Us"></a>
                </div>
            </div>
        </div>
    </div>
</section>
