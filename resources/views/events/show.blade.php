<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Event詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <x-app-layout>
            <x-slot name="header">
                　{{ Auth::user()->name }}
            </x-slot>
        <h1 class="title">
            {{ $event->title }}
        </h1>
        <div class="content">
            <div class="content__post">
                <h3>本文</h3>
                <p>{{ $event->contents }}</p>    
            </div>
        </div>
        <p class="edit"><a href="/events/{{ $event->id }}/edit">イベント編集する</a></p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
         </x-app-layout>
    </body>
   
</html>