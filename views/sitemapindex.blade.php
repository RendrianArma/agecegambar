<?php echo '<?xml version="1.0" encoding="UTF-8" ?>'; ?>
<?php echo '<?xml-stylesheet type="text/xsl" href="https://'.$_SERVER['SERVER_NAME'].'/sitemap-theme.xsl"?>';?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php ?>
@for($i = 1; $i <= $data['totalsitemap']; $i++)
<sitemap>
	<loc>https://{{$_SERVER['SERVER_NAME']}}/sitemap-post{{$i}}.xml</loc>
	<lastmod>{{date('c')}}</lastmod>
</sitemap>
@endfor
</sitemapindex>
