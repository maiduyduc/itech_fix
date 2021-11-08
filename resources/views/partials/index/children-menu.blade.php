@if($categoryParent->categoryChidlren->count())
    <ul class="dropdown-menu">
        @foreach($categoryParent->categoryChidlren as $cate)
            <li>
                <a class="dropdown-item" href="{{ route('courses.list',['slug'=>$cate->slug, 'id'=>$cate->id]) }}">
                    {{ $cate->name }}
                </a>
                @if($cate->categoryChidlren->count())
                    @include('partials.index.children-menu', ['categoryParent'=>$cate])
                @endif
            </li>
        @endforeach
    </ul>
@endif
