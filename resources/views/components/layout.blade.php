@include('partials._header')
@include('partials._mainnav')
@include('partials._secondarynav')

{{ $slot }}

@include('partials._footer')