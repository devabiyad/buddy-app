<ul>
    @foreach($childs as $child)
        <li>
            {{ $child->title }}
        @if(count($child->childs))
                @include('admin.child_categories',['childs' => $child->childs])
            @endif
        </li>
    @endforeach
</ul>
