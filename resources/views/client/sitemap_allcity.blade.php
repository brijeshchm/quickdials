<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('aurangabad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('bhopal/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('ludhiana/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('bhubaneswar/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
 
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('madurai/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
  
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('coimbatore/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
  

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('ranchi/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('srinagar/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('surat/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach



@foreach ($keywords as $keyword)
<url>     
    <loc>{{ url('indore/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach


@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('gorakhpur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('chennai/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach


</urlset>