<!-- Banner com Zoom -->
<div id="header" class="bannerZoom" style="background-color: {{isset($componente->cor_fundo) && $componente->cor_fundo != '#000000' ? $componente->cor_fundo : ''}}; color: {{isset($componente->cor_texto) && $componente->cor_texto != '#000000' ? $componente->cor_texto : '#fff'}};">
    <div class="bannerInfo">
        <div class="hinfos info1">
            <header>
                <h1><a href="/">{{ isset($componente->titulo) ? $componente->titulo : 'Título' }}</a></h1>
                {!! isset($componente->texto) ? $componente->texto : 'Subtítulo' !!}
                
                <div class="textLink">
                    <a href="{{ isset($componente->linkbuton) ? $componente->linkbuton : '#' }}" class="button">{{ isset($componente->textobuton) ? $componente->textobuton : '' }}</a>
                </div>
                <style>
                    header a.button {
                        top: 20px;
                        background: none;  
                        position: relative; 
                    }
                    .button:hover {
                        top: 10px;
                        transition: all 1s;
                        color: #383838 !important;
                        background-color: initial !important;
                        background-image: linear-gradient(358deg, white, #b9b9b91a);
                        box-shadow:  0px 6px 16px 1px white, inset 1px 3px 20px 0px white;
                    }
                </style>
            </header>
        </div>
    </div>
    <div class="bannerBg">
        <img src="{{ isset($componente->img) ? $componente->img : 'img/banner.jpg' }}" alt="">
    </div>
    <div class="bannerMonitor">
        <img class="monitor" src="{{ asset('img/monitor.png') }}" alt="">
    </div>
</div>