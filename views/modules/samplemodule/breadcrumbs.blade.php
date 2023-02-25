<p>
    @foreach ($items as $item)
        <a href="{{ $item['link'] }}">{{ $item['title'] }}</a>
    @endforeach
</p>
