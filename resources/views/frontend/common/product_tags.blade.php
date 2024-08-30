<style>
@media only screen and (max-width: 767px) {
    .test-widget {
        display: none;
    }
}
</style>

<div class="sidebar-widget test-widget product-tag wow fadeInUp">
    <h3 class="section-title">Product tags</h3>
    <div class="sidebar-widget-body outer-top-xs">

        <div class="tag-list">

            @if (session()->get('language') == 'hindi')

                @foreach ($tags_hin as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/' . $tag->product_tags_hin) }}">
                        {{ str_replace(',', ' ', $tag->product_tags_hin) }}</a>
                @endforeach
            @else
                @foreach ($tags_en as $tag)
                    <a class="item active" title="Phone" href="{{ url('product/tag/' . $tag->product_tags_en) }}">
                        {{ str_replace(',', ' ', $tag->product_tags_en) }}</a>
                @endforeach
            @endif
        </div>
        <!-- /.tag-list -->
    </div>
    <!-- /.sidebar-widget-body -->
</div>
<!-- /.sidebar-widget -->
