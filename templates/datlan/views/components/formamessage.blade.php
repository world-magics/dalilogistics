<section id="contact" class="text-center">
    <div class="container">
        <h1 data-aos="fade-left">Отправит сообщение</h1>
        <p class="mb-5" data-aos="fade-right">Мы являемся официальными партнёрами таких компаний как: Haier, Beko, Hitachi, <br> Philips, Tefal, Moulinex и другие.</p>

        <form class="contact-form col-md-11 col-lg-9 mx-auto" action="{{route('web.store')}}" method="post">
            @csrf
            <div class="form-row">
                <div class="col form-group">
                    <input data-aos="fade-left" type="text" class="form-control" placeholder="Имя" name="fullName" required>
                </div>
                <div class="col form-group">
                    <input data-aos="fade-right" type="email" class="form-control" placeholder="Email" name="email" required>
                </div>
            </div>
            <div class="form-group">
                <textarea name="info" data-aos="fade-left" id="" cols="30" rows="5" class="form-control" placeholder="Сообщение ..." required></textarea>
            </div>
            <div class="form-group">
                <input type="submit" data-aos="fade-right" class="btn btn-primary btn-block" value="Отправит сообщение">
            </div>
        </form>
    </div>
</section>
