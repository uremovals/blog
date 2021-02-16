<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @foreach ($products as $product)
        <url>
            <loc>{{ url('/category')}}/{{ str_replace('+', '-', strtolower($product->category_id)) }}</loc>
            <lastmod>{{ $product->updated_at->tz('UTC')->toAtomString() }}</lastmod>
            <changefreq>Monthly</changefreq>
            <priority>0.9</priority>
        </url>
    @endforeach
</urlset>
