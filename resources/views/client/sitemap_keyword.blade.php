<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
<loc>https://www.quickdials.com/</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>1.00</priority>
</url>
<url>
<loc>https://www.quickdials.com/about-us/</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
<url>
<loc>https://www.quickdials.com/business-owners/</loc>
<lastmod>2025-05-09T09:59:21+00:00</lastmod>
<priority>0.80</priority>
</url>
 
 
@foreach ($keywords as $keyword)
<url>
    <loc>{{ url($keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
    
</urlset>