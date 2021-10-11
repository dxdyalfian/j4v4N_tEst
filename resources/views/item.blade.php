<li>
    {{ $item->name }}
    @if ($item['children'])
        <ul>
            @each('item', $item['children'], 'item')
        </ul>
    @endif
</li>