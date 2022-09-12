<div class="hconteudo">
    <div class="hlogo">
        <a href="/">
            <img src="{{ asset('img/logo.png') }}" alt="">
        </a>
    </div>
    <div class="hlinks">
        <nav id="nav">

            <ul>
                @foreach($paginas as $pagina)
                    @if($pagina->nome == App\Helpers\PegarPaginaHelper::pegarPagina())
                        <li class="current"><a class="navbar-close" href="/{{$pagina->nome}}">{{ str_replace('-', ' ', strtoupper($pagina->nome)) }}</a></li>
                    @else
                        <li><a class="navbar-close" href="/{{$pagina->nome}}">{{ str_replace('-', ' ', strtoupper($pagina->nome)) }}</a></li>
                    @endif
                @endforeach
            </ul>
        </nav>
    </div>
</div>
