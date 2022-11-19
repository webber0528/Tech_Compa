<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                　{{ Auth::user()->name }}
            </x-slot>
        <h1>TOP</h1>
        <div class='events'>
            @foreach ($events as $e)
                <div class='event'>
                    <h2 class='title'><a href="/events/{{ $e->id }}">{{ $e->contents }}</a></h2>
                    <p class='contents'><a href="/events/{{ $e->id }}">{{ $e->title }}</a></p>
                    <p class='image'>{{ $e->image}}</p>
                    
                    
                </div>
                <form action="/events/{{ $e->id }}" id="form_{{ $e->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="button" onclick="deleteEvent({{ $e->id }})">イベント削除</button>
            </form>
            @endforeach
            
            
            <a href='/events/create'>イベント作成</a>
            
            <div class='paginate'>
                {{ $events->links() }}
            </div>
            
            
            
            <script>
                function deleteEvent(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            
        </div>
        </x-app-layout>
    </body>
</html>