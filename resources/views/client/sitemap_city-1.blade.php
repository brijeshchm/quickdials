<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
 @foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('bhopal/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('kolkata/'.$keyword->slug) }}</loc>  
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>    
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('faridabad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>    
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('ghaziabad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>    
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('pune/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>    
    <priority>0.7</priority>
</url>
@endforeach  
</urlset>