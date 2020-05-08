@if (count($breadcrumbs))
    <ul class="c-breadcrumb">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($breadcrumb->url && !$loop->last)
                <li class="c-breadcrumb__item"><a href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }} /</a></li>
            @else
                <li class="c-breadcrumb__item active">{{ $breadcrumb->title }}</li>
            @endif
        @endforeach
    </ul>
@endif
