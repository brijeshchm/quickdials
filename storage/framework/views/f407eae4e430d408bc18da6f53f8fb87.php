<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
 
    <?php $__currentLoopData = $keywords; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyword): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <url>
        <loc><?php echo e(url('/')); ?>/noida/<?php echo generate_slug($keyword->keyword) ?></loc>
        <lastmod><?php 
        echo gmdate(DATE_ATOM,mktime(0,0,0,date('m',strtotime($keyword->updated_at)),date('d',strtotime($keyword->updated_at)),date('Y',strtotime($keyword->updated_at)) ));
        ?>
        </lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.8</priority>
    </url>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</urlset><?php /**PATH /home/quickdials/public_html/resources/views/client/sitemap-noida.blade.php ENDPATH**/ ?>