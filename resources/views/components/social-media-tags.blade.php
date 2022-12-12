{{-- Open Graph data --}}
<meta property="og:title" content="Turbo Laravel" />
<meta property="og:type" content="website" />
<meta property="og:url" content="{{ config('app.url') }}" />

{{-- The image dimensions are necessary otherwise it will not display on LinkedIn --}}
<meta property="og:image" content="{{ asset('/images/turbo-laravel-og.jpg') }}" />
<meta property="og:image:height" content="630" />
<meta property="og:image:width" content="1200" />
<meta property="og:description" content="An elegant way to combine Hotwire and Laravel." />
<meta property="og:locale" content="en_US">
<meta property="og:site_name" content="Turbo Laravel" />

{{-- Twitter Card meta --}}
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:title" content="Turbo Laravel" />
<meta name="twitter:description" content="An elegant way to combine Hotwire and Laravel." />
