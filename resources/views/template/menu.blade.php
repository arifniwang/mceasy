@php
$menu = request()->segment(1);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">Arif Niwang Djati</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link {{ $menu == 'soal1' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('soal1') }}">Soal 1</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $menu == 'soal2' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('soal2') }}">Soal 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $menu == 'soal3' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('soal3') }}">Soal 3</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $menu == 'soal4' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('soal4') }}">Soal 4</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ $menu == 'soal5' ? 'active' : '' }}" aria-current="page"
                        href="{{ url('soal5') }}">Soal 5</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
