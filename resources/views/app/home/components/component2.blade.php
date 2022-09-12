<!-- Texto Simples -->
<section class="wrapper style2" style="background-color: {{isset($componente->cor_fundo) && $componente->cor_fundo != '#000000' ? $componente->cor_fundo : ''}}; color: {{isset($componente->cor_texto) && $componente->cor_texto != '#000000' ? $componente->cor_texto : ''}};">
    <!-- Informações do bloco -->
    <div class="bloco-texto">
        <div class="text-wrapper">
            <h2>{{ isset($componente->titulo) ? $componente->titulo : 'Título' }}</h2>
            {!! isset($componente->texto) ? $componente->texto : 'Subtítulo' !!}
            <div class="textLink">
                <a href="{{ isset($componente->linkbuton) ? $componente->linkbuton : '#' }}" class="button">{{ isset($componente->textobuton) ? $componente->textobuton : '' }}</a>
            </div>
        </div>
    </div>
</section>