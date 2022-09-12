<!-- Cartões -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

<div class="container-cards">
    <section class="style1">
        <div class="titulo">
            <h1>{{ isset($componente[0]->titulo) ? $componente[0]->titulo : 'Título' }}</h1>
        </div>
        <div class="owl-carousel">
            @foreach ($componente as $elemento)
                <article class="card">
                    <div class="flip">
                        <section class="front-card">
                            <div class="conteudo-card">
                                <div class="texto">
                                    <div style="margin: auto;">
                                        <img style="width: 40%;margin: 10px auto 0 auto;" src="{{ $elemento->img }}" alt="">
                                        <h1>{{ $elemento->subtitulo }}</h1>
                                    </div>
                                </div>    
                            </div>
                        </section>
        
                        <section class="back-card">
                            <div class="conteudo-card">
                                <div class="texto">
                                    <h1>{!! $elemento->texto !!}</h1>
                                </div>    
                            </div>
                        </section>
                    </div>
                </article>
            @endforeach
        </div>
    </section>
</div>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel(
            {
                items: 3,
                margin: 10,
                loop: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    900: {
                        items: 4
                    }
                }
            }
        );
    });
</script>

<style>
    .card {
        position: relative;
        height: 348px;
        width: 95%;
        margin: 15px auto;
        perspective: 1000px;
    }

    .card .flip {
        transition: transform .7s cubic-bezier(0.88, 0.41, 0.43, 0.69);;
        transform-style: preserve-3d;
    }

    .card:hover .flip {
        transform: rotateY(180deg);
    }

    .front-card,
    .back-card {
        position: absolute;
        backface-visibility: hidden;
        background-size: cover;
        border-radius: 10px;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
    }

    .back-card {
        background-color: #3150bc;
        height: 348px;
        width: 100%;
        transform: rotateY(180deg);
        text-align: center;
    }

    .front-card>.conteudo-card>.texto>h1{
        color: black;
        font-size: 3rem;
        margin: auto;
    }
    .back-card>.conteudo-card>.texto>h1{
        color: white;
        font-size: 1rem;
        margin: auto;
    }

    .front-card {
        background-image: linear-gradient(45deg, black, #474747d4);
        color: white;
        height: 348px;
        width: 100%;
    }

    .front-card img,
    .back-card img {
        border-radius: 12px;
        box-shadow: 0 0 8px 0 rgba(0, 0, 0, 0.3)
    }

    .conteudo-card{
        height: 100%;
        width: 100%;
        justify-content: center;
        align-items: center;
        -webkit-transform-style: preserve-3d;
        transform-style: preserve-3d;
        -webkit-transform: translateZ(0.1px);
        transform: translateZ(0.1px);
        border-radius: 10px;
    }

    .texto {
        width: 100%;
        height: 100%;
        display: flex;
        border-radius: 10px;
        -webkit-transform: translateZ(50px) scale(.91);
        transform: translateZ(50px) scale(.91);
    }
    .container-cards {

    }
    
    .style1 {
        max-width: 1033px;
        margin: auto;
    }

    .style1>.titulo>h1 {
        font-size: 22pt;
        margin: 0 0 0 0;
        color: inherit;
        width: 100%;
        text-align: center;
        padding: 5px;
    }
    
</style>