<section class="contact-content boxed__m flex-it f-row f-just-between">
    @group('contact_image')
    <div class="contact-img">
        <img src="@sub('image', 'url')" alt="@sub('image', 'alt')">
    </div>
    @endgroup
    @group('contact_text')
    <div class="contact-text">
        @sub('text')
    </div>
    @endgroup
</section>