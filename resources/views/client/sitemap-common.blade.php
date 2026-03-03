<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
@php 
$keywords = DB::table('keyword')->select('slug','updated_at')->whereNotNull('slug')->get();
@endphp

    @foreach ($keywords as $keyword)
    <url>
        <loc>https://www.quickdials.com/<?php echo $city; ?>/<?php echo $keyword->slug; ?></loc>
          <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach 
</urlset>