<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

@foreach ($blogs as $blog)
<url>
    <loc>{{ url('blog/'.$blog->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($blog->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach


@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('coimbatore/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach


@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('dhanbad/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('prayagraj/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('raipur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('rajkot/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('kota/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('kanpur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('jodhpur/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
</url>
@endforeach

@foreach ($keywords as $keyword)
<url>     
      <loc>{{ url('jhansi/'.$keyword->slug) }}</loc>
    <lastmod>{{ \Carbon\Carbon::parse($keyword->updated_at)->toAtomString() }}</lastmod>
    <changefreq>daily</changefreq>
    <priority>0.7</priority>
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


</urlset>


 