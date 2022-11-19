<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Event</title>
    </head>
    
    <body>
        <x-app-layout>
            <x-slot name="header">
                　{{ Auth::user()->name }}
            </x-slot>
        <h1>Event</h1>
        <form action="/events" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="event[title]" placeholder="タイトル" value = "{{ old('event.title') }}" />
                <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
                
            </div>
            <div class="contentss">
                <h2>Contents</h2>
                <textarea name="event[contents]" >{{ old('event.contents') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('event.contents') }}</p>
                <textarea name="event[image]"></textarea>
            </div>
            <input type="submit" value="イベント登録"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        </x-app-layout>
    </body>
   
</html>