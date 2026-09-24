<?php echo '<?xml version="1.0" encoding="UTF-8"?>'; ?>
<urlset xmlns="http://www.sitemap.org/schemas/sitemap/0.9">
  <url>
    <loc>{{ route('home') }}</loc>
    <changefreq>daily</changefreq>
    <priority>1.0</priority>
  </url>
  <url>
    <loc>{{ route('packages.index') }}</loc>
    <changefreq>daily</changefreq>
    <priority>0.9</priority>
  </url>
  <url>
    <loc>{{ route('destinations.index') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ route('visa.index') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ route('flights.index') }}</loc>
    <changefreq>daily</changefreq>
    <priority>0.8</priority>
  </url>
  <url>
    <loc>{{ route('hotels.index') }}</loc>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>

  @foreach($packages as $p)
  <url>
    <loc>{{ route('packages.show', $p->slug) }}</loc>
    <lastmod>{{ $p->updated_at->toAtomString() }}</lastmod>
    <changefreq>weekly</changefreq>
    <priority>0.8</priority>
  </url>
  @endforeach

  @foreach($destinations as $d)
  <url>
    <loc>{{ route('destinations.show', $d->slug) }}</loc>
    <lastmod>{{ $d->updated_at->toAtomString() }}</lastmod>
    <changefreq>monthly</changefreq>
    <priority>0.7</priority>
  </url>
  @endforeach
</urlset>
