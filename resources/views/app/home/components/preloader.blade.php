
<div class="preload">
    <div>
        <img src="{{ asset('img/logo.png') }}" alt="">
        <h1>Em construção.</h1>
    </div>
</div>
<style>
    .preload{
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #fff;
        z-index: 9999;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .preload >div > img{
        transition: .5s;

    }
    
    h1 {
        font-size: 22pt;
        width: 100%;
        text-align: center;
    }
</style>
<script>
    setInterval(function(){
        if(document.querySelector('.preload>div>img').style.marginTop == '-100px'){
            document.querySelector('.preload>div>img').style.marginTop = '0px';
        }else{
            document.querySelector('.preload>div>img').style.marginTop = '-100px';
        }
    }, 500);
    $(document).ready(function(){
        $('.preload').fadeOut(1000);
        $('.monitor').css('left', '49%');
    });
</script>