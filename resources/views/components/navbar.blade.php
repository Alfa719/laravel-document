<nav class="navbar navbar-expand-lg navbar-dark background fixed-top shadow-lg">
    <div class="container">
        <a class="navbar-brand d-flex" style="font-family: 'Poppins', sans-serif;" href="#">
            <img src="{{ asset('asset/img/web/logo-UNUJA.png') }}" width="50" class="text-shadow" alt="">
            <span class="d-flex flex-column ml-2">
                <span class="title">Laravel Project</span>
                <span class="subtitle mt-n2">Unuja Product</span>
            </span>
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <img src="{{ asset('asset/img/user') }}/{{ Auth::user()->image }}" width="40" height="40"
                    class="text-shadow rounded-circle mr-2" alt="">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="">{{ __('Harap Login Terlebih Dahulu') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold text-capitalize"
                                    style="color: white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('home') }}">Dashboard
                                    </a>
                                    @if (Auth::user()->level_user == 'dosen')

                                        <a class="dropdown-item"
                                            href="{{ url('dosen') }}/{{ Auth::user()->nomor_induk }}">Profile
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('dosen.add.product', Auth::user()->nomor_induk) }}">Add
                                            Product
                                        </a>
                                        <hr>
                                    @elseif (Auth::user()->level_user == 'mahasiswa')
                                        <a class="dropdown-item"
                                            href="{{ url('mahasiswa') }}/{{ Auth::user()->nomor_induk }}">Profile
                                        </a>
                                        <a class="dropdown-item"
                                            href="{{ route('mahasiswa.add.product', Auth::user()->nomor_induk) }}">Add
                                            Product
                                        </a>
                                        <hr>
                                    @endif
                                    <a class="dropdown-item"
                                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                        href="#">
                                        Log Out
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
