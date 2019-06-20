<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s6 m3">
                <img class="materialize-logo" src="/dist/img/materialize-logo.png" alt="Materialize">
                <p>Made with love</p>
            </div>
            <div class="col s6 m3">
                <h5>About</h5>
                <ul>
                    <li><a href="/about">Our Story</a></li>

                </ul>
            </div>
            <div class="col s6 m3">
                <h5>Connect</h5>
                <ul>
                    @if(isset($links))

                        @foreach($links as $link)

                            <li><a href="/all-{{ strtolower($link) }}">{{ $link }}</a></li>

                        @endforeach
                    @endif


                </ul>
            </div>
            <div class="col s6 m3">
                <h5>Contact</h5>
                <ul>
                    <li><a href="/support-messages">Support</a></li>
                    <li><a href="/terms-of-service">Terms of Service</a></li>
                    <li><a href="/privacy-policy">Privacy Policy</a></li>

                </ul>
            </div>
        </div>
    </div>
</footer>