<section class="mbr-section content4 cid-qCYC1i7rk7" id="content4-2x" data-rv-view="203">
    <div class="container">
        <div class="media-container-row">
            <div class="title col-12 col-md-8">
                <h2 class="align-center pb-3 mbr-fonts-style display-2">Tags</h2>
            </div>
        </div>
    </div>
</section>

<section class="mbr-section content8 cid-qCYBxwqvnB" id="content8-2w" data-rv-view="205">
    <div class="container">
        <div class="media-container-row title">
            <div class="col-12 col-md-12">
                <div class="mbr-section-btn align-center">
                  @isset($categories)
                    @foreach($categories as $category)
                        <a class="btn btn-info-outline display-4" href="/tags/{{$category->name}}">{{$category->name}}</a>
                    @endforeach
                  @endisset
                  @unless(count($categories))
                    <a class="btn btn-info-outline display-4" href="#">No tags</a>
                  @endunless
                </div>
            </div>
        </div>
    </div>
</section>
