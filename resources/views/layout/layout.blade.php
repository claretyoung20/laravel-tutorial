@extends('layout.index')

@section('header')
    <header id="header">
        <a class="logo" href="/">Industrious</a>
        <nav>
            <a href="#menu">Menu</a>
        </nav>
    </header>
@endsection


@section('nav-bar')
    <nav id="menu" style="height: fit-content;">
        <ul class="links">
            <li class="{{ Request::path() === '/' ? 'current-page': '' }}"><a href="/">Home</a></li>
            <li class="{{ Request::is('about-us') ? 'current-page': '' }}" ><a href="/about-us">About Us</a></li>
            <li class="{{ Request::path() === 'contact-us' ? 'current-page': '' }}"><a href="/contact-us">Contact Us</a></li>
            <li class="{{ Request::path() === 'articles/1' ? 'current-page': '' }}" ><a href="/articles">Articles</a></li>

        </ul>
    </nav>
@endsection



@section('body-content')
    @yield('content')
@endsection


@section('footer')
    <footer id="footer">
        <div class="inner">
            <div class="content">
                <section>
                    <h3>Accumsan montes viverra</h3>
                    <p>Nunc lacinia ante nunc ac lobortis. Interdum adipiscing gravida odio porttitor sem non mi integer non faucibus ornare mi ut ante amet placerat aliquet. Volutpat eu sed ante lacinia sapien lorem accumsan varius montes viverra nibh in adipiscing. Lorem ipsum dolor vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing sed feugiat eu faucibus. Integer ac sed amet praesent. Nunc lacinia ante nunc ac gravida.</p>
                </section>
                <section>
                    <h4>Sem turpis amet semper</h4>
                    <ul class="alt">
                        <li><a href="#">Dolor pulvinar sed etiam.</a></li>
                        <li><a href="#">Etiam vel lorem sed amet.</a></li>
                        <li><a href="#">Felis enim feugiat viverra.</a></li>
                        <li><a href="#">Dolor pulvinar magna etiam.</a></li>
                    </ul>
                </section>
                <section>
                    <h4>Magna sed ipsum</h4>
                    <ul class="plain">
                        <li><a href="#"><i class="icon fa-twitter">&nbsp;</i>Twitter</a></li>
                        <li><a href="#"><i class="icon fa-facebook">&nbsp;</i>Facebook</a></li>
                        <li><a href="#"><i class="icon fa-instagram">&nbsp;</i>Instagram</a></li>
                        <li><a href="#"><i class="icon fa-github">&nbsp;</i>Github</a></li>
                    </ul>
                </section>
            </div>
            <div class="copyright">
                &copy; Untitled. Photos <a href="https://unsplash.co">Unsplash</a>, Video <a href="https://coverr.co">Coverr</a>.
            </div>
        </div>
    </footer>
@endsection
