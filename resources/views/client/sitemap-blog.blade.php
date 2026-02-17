<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">

 <?php $blogs = DB::table('blogdetails');
		$blogs = $blogs->select('title', 'slug','updated_at');
		$blogs = $blogs->get();
      
        ?>
    @foreach ($blogs as $blog)
    <url>
        <loc>{{ url('/') }}/blog/<?php echo generate_slug($blog->slug) ?></loc>
        <lastmod><?php 
        echo gmdate(DATE_ATOM,mktime(0,0,0,date('m',strtotime($blog->updated_at)),date('d',strtotime($blog->updated_at)),date('Y',strtotime($blog->updated_at)) ));
        ?>
        </lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    @endforeach 
</urlset>