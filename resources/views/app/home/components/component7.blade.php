<!-- Banner simples -->
<div id="header" class="bannerSimples" style="background-color: {{isset($componente->cor_fundo) && $componente->cor_fundo != '#000000' ? $componente->cor_fundo : ''}}; color: {{isset($componente->cor_texto) && $componente->cor_texto != '#000000' ? $componente->cor_texto : '#fff'}};">
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
                        border: solid 1px;
                        background: none;
                        position: relative;
                        border-radius: 20px;
                    }
                    .button:hover {
                        color: #383838 !important;
                        background-color: initial !important;
                        background-image: linear-gradient(358deg, white, #b9b9b91a);
                    }
                </style>
            </header>
        </div>
    </div>
    <div class="bannerBg" style='background-image: url("{{ isset($componente->img) ? $componente->img : 'img/banner.jpg' }}")';>
    </div>
    <div class="bannerMonitor">
    </div>
</div>