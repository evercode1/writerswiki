<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12 m3 center">
                <h5>About</h5>
                <ul>
                    <li><a href="/about">Our Story</a></li>
                    <li><a href="/profile/1-max-vonne">Max Vonne</a></li>

                </ul>
            </div>





            <div class="col s12 m3 center">
                <h5>Connect</h5>
                <ul>
                    @if(isset($navs))

                        @foreach($navs as $nav)

                            <li><a href="/all-{{ strtolower($nav) }}">{{ ucwords($nav) }}</a></li>

                        @endforeach
                    @endif


                </ul>
            </div>
            <div class="col s12 m3 center">
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