<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" >
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('hyderabad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->format('Y-m-d') }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('jamshedpur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->format('Y-m-d') }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('jabalpur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->format('Y-m-d') }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('gwalior/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->format('Y-m-d') }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('guwahati/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->format('Y-m-d') }}</lastmod>
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



@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('meerut/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
 
@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('ahmedabad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
</url>
@endforeach
</urlset>