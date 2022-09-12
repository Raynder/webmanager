{{$email = ''}}
<!-- Formulario com links -->
<div id="footer">
    <div class="container">
        <div class="row">
            <section class="col-3 col-6-narrower col-12-mobilep">
                <h3>{{ isset($componente[0]->titulo) ? $componente[0]->titulo : 'Título' }}</h3>
                <ul class="links">
                    @foreach ($componente as $elemento)
                        <li><a style="text-decoration: blink;" _target="_blank" href="{{ isset($elemento->link) ? $elemento->link : '' }}">{{ isset($elemento->nomelink) ? $elemento->nomelink : '' }}</a></li>
                        @php $email = $elemento->email; @endphp
                    @endforeach
                </ul>
            </section>

            <section class="col-9 col-12-narrower">
                <h3>Entre em contato</h3>
                <form>
                    <div class="row gtr-50">
                        <div class="col-6 col-12-mobilep">
                            <input type="text" name="nome" id="nome" placeholder="Nome" />
                        </div>
                        <div class="col-6 col-12-mobilep">
                            <input type="email" name="email" id="email" placeholder="Email" />
                        </div>
                        <div class="col-12">
                            <textarea name="mensagem" id="mensagem" placeholder="Mensagem" rows="5">
                            </textarea>
                        </div>
                        <div class="col-12">
                            <ul class="actions">
                                <li><input type="submit" class="button alt" value="Enviar mensagem" /></li>
                            </ul>
                        </div>
                        <input type="hidden" name="email" id="email" value="{{ $email }}">
                    </div>
                </form>
            </section>
        </div>
    </div>

    <ul class="icons">
        <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a></li>
        <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
        <li><a href="#" class="icon brands fa-github"><span class="label">GitHub</span></a></li>
        <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
        <li><a href="#" class="icon brands fa-google-plus-g"><span class="label">Google+</span></a></li>
    </ul>

    <div class="copyright">
        <ul class="menu">
            <li>&copy; Todos os direitos reservados</li>
            <li>Design: <a href="http://flybisistemas.com.br">Flybi Sistemas</a></li>
        </ul>
    </div>
</div>