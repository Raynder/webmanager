<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="/" class="nav-link">Home</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ms-auto">
        @guest
        @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @endif

        @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
        @endif
        @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
        @endguest
    </ul>
</nav>

<script>
    // identificar qual menu está ativo e atribuir a class active
    $(document).ready(function() {
        var url = window.location.href;
        var activePage = url.substr(url.lastIndexOf('/') + 1);
        
        //verificar se contem a palavra create ou edit na url
        if(url.indexOf('create') > -1) {
            //pegar a pos a penultima barra / e pegar o valor a partir da posição
            var activePage = url.split('/')[url.split('/').length - 2];
        }
        if(url.indexOf('edit') > -1){
            var activePage = url.split('/')[url.split('/').length - 3];
        }
        $('.nav-link').each(function() {
            var linkPage = this.href.substr(this.href.lastIndexOf('/') + 1);
            if (activePage == linkPage) {
                $(this).addClass('active');
                pai = $(this).parent().parent().parent().get(0);

                if(pai.getElementsByTagName('ul')[0].classList.contains('nav-treeview')){
                    pai.classList.add('menu-open');
                }
                if (pai.classList.contains('menu-open')) {
                    pai.querySelector('a').classList.add('active');
                }
            }
        });
    });
</script>
