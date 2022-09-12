<div name="teste" id="footer">
    <div class="container">
        <div class="row">
            @include('app.home.footer.links', ['links' => $links])

            @include('app.home.footer.form', ['form' => $form])
        </div>
    </div>

    @include('app.home.footer.social', ['social' => $social])
</div>