<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">
                <i class="ri-home-8-line"></i>
                <span>Домашняя страница</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.banner.index') }}">
                <i class="ri-download-cloud-2-line"></i>
                <span>Баннеры</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.about.index') }}">
                <i class="ri-newspaper-fill"></i>
                <span>О нас</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.kachestva.index') }}">
                <i class="ri-service-fill"></i>
                <span>Услуги</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.project.index') }}">
                <i class="ri-building-2-fill"></i>
                <span>Проекты</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.nadyojnost.index') }}">
                <i class="ri-coupon-3-fill"></i>
                <span>Почему мы</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('admin.partners.index') }}">
                <i class="ri-parking-fill"></i>
                <span>Партнёры</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->
        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#category-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-price-tag-3-fill"></i><span>Каталог</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="category-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('admin.banner.index') }}">
                        <i class="bi bi-circle"></i><span>Баннеры</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.about.index') }}">
                        <i class="bi bi-circle"></i><span>О нас</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.kachestva.index') }}">
                        <i class="bi bi-circle"></i><span>Услуги</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.project.index') }}">
                        <i class="bi bi-circle"></i><span>Datlan проекты</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.nadyojnost.index') }}">
                        <i class="bi bi-circle"></i><span>ПОЧЕМУ МЫ</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.news.index') }}">
                        <i class="bi bi-circle"></i><span>Datlan новости</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.partners.index') }}">
                        <i class="bi bi-circle"></i><span>Datlan партнёры</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#statement-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-discuss-fill"></i><span>Сообщение</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="statement-nav" class="nav-content collapse" data-bs-parent="#statement-nav">
                <li>
                    <a href="{{ route('admin.message.index') }}">
                        <i class="bi bi-circle"></i><span>Бланк заявления</span>
                    </a>
                </li>
            </ul>
        </li> --}}

        {{-- <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#settings-nav" data-bs-toggle="collapse" href="#">
                <i class="ri-settings-5-fill"></i><span>Настройка</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="settings-nav" class="nav-content collapse " data-bs-parent="#settings-nav">
                <li>
                    <a href="{{ route('admin.setting.index') }}">
                        <i class="bi bi-circle"></i><span>Настройка</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.role.index') }}">
                        <i class="bi bi-circle"></i><span>Роли</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.user.index') }}">
                        <i class="bi bi-circle"></i><span>@lang("all.users")</span>
                    </a>
                </li>
            </ul>
        </li> --}}
        <!-- End Components Nav -->
    </ul>
</aside>
<!-- End Sidebar-->
