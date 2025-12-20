<h1>FAQ</h1>

@if($categories->count() === 0)
<p>Er zijn nog geen FAQ items.</p>
@else
@foreach($categories as $category)
<h2>{{ $category->name }}</h2>

@if($category->items->count() === 0)
<p>Geen vragen in deze categorie.</p>
@else
<ul>
    @foreach($category->items as $item)
    <li>
        <strong>{{ $item->question }}</strong><br>
        {{ $item->answer }}
    </li>
    @endforeach
</ul>
@endif
@endforeach
@endif

<p><a href="/">Terug naar home</a></p>
