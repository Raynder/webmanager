<!-- Cartões -->
<link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">

<div class="container-cards">
    <section class="style1">
        <div class="titulo">
            <h1>CONHEÇA NOSSOS PRODUTOS</h1>
        </div>
        <div class="owl-carousel">
            <article class="card">
                <div class="flip">
                    <section class="front-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>FlyTax</h1>
                            </div>    
                        </div>
                    </section>
    
                    <section class="back-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a estrutura atual da organização auxilia a preparação e a composição do remanejamento dos quadros funcionais.</h1>
                            </div>    
                        </div>
                    </section>
                </div>
            </article>
    
            <article class="card">
                <div class="flip">
                    <section class="front-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>FlyPrice</h1>
                            </div>    
                        </div>
                    </section>
    
                    <section class="back-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a estrutura atual da organização auxilia a preparação e a composição do remanejamento dos quadros funcionais.</h1>
                            </div>    
                        </div>
                    </section>
                </div>
            </article>
    
            <article class="card">
                <div class="flip">
                    <section class="front-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>FlyDocs</h1>
                            </div>    
                        </div>
                    </section>
    
                    <section class="back-card">
                        <div class="conteudo-card">
                            <div class="texto">
                                <h1>Nunca é demais lembrar o peso e o significado destes problemas, uma vez que a estrutura atual da organização auxilia a preparação e a composição do remanejamento dos quadros funcionais.</h1>
                            </div>    
                        </div>
                    </section>
                </div>
            </article>
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
        background-color: #000;
        height: 348px;
        width: 100%;
        transform: rotateY(180deg);
        text-align: center;
    }

    .front-card>.conteudo-card>.texto>h1{
        color: black;
        font-size: 4rem;
        margin: auto;
    }
    .back-card>.conteudo-card>.texto>h1{
        color: white;
        font-size: 1rem;
        margin: auto;
    }

    .front-card {
        background-color: #fff;
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
        color: black;
        width: 100%;
        text-align: center;
        padding: 5px;
    }
    
</style>