<h1>{{$heading}}</h1>
@php
    $page = 1;
@endphp

<h2>Page num: {{$page}} </h2>

@if (count($posts) != 0)
    @foreach ($posts as $post)
        <h4>{{$post['title']}}</h4>
        <p>Age: {{$post['age']}}</p>
    @endforeach
@else
    <h4>No post found</h4>
@endif
