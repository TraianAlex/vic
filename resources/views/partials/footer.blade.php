<section once="" class="cid-qBPIYxGdWA mbr-reveal" id="footer7-1p" data-rv-view="1097">
    <div class="container">
        <div class="media-container-row align-center mbr-white">
            <div class="row">
                <ul class="foot-menu">
                <li class="foot-menu-item mbr-fonts-style display-7"><strong><a href="/" class="text-white">Home</a></strong></li><li class="foot-menu-item mbr-fonts-style display-7"><strong><a href="/services" class="text-white">Services</a></strong></li><li class="foot-menu-item mbr-fonts-style display-7"><strong><a href="/about" class="text-white">About us</a></strong></li><li class="foot-menu-item mbr-fonts-style display-7"><strong><a href="/contact" class="text-white">Contact</a></strong></li></ul>
            </div>
            <div class="row">
                <div class="social-list align-right pb-2">
                <div class="soc-item">
                        <a href="https://twitter.com/traian_victor" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-twitter socicon" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.facebook.com/traianvic" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-facebook socicon" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.youtube.com/channel/UCeoH6zOjnyV1s5_gl8ymKMw?view_as=subscriber" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-youtube socicon" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://www.instagram.com/traianvic/" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-instagram socicon" media-simple="true"></span>
                        </a>
                    </div><div class="soc-item">
                        <a href="https://plus.google.com/u/0/111060604048056069183" target="_blank">
                            <span class="mbr-iconfont mbr-iconfont-social socicon-googleplus socicon" media-simple="true"></span>
                        </a>
                    </div></div>
            </div>
            <div class="row row-copirayt">
                <p class="mbr-text mb-0 mbr-fonts-style mbr-white display-7">
                    © Copyright {{date('Y')}} TA - All Rights Reserved
                </p>
            </div>
        </div>
    </div>
</section>

<example-component></example-component>
<link-component></link-component>
<div class="panel-body">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
</div>
