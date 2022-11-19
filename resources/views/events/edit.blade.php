
<body>
    <x-app-layout>
        <x-slot name="header">
            　{{ Auth::user()->name }}
        </x-slot>
    <h1 class="title">編集画面</h1>
    <div class="contents">
        <form action="/events/{{ $event->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='contents__title'>
                <h2>タイトル</h2>
                <input type='text' name='event[title]' value="{{ $event->title }}">
                <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            <div class='contents__content'>
                <h2>内容</h2>
                <input type='text' name='event[contents]' value="{{ $event->contents }}">
                <p class="title__error" style="color:red">{{ $errors->first('event.contents') }}</p>
            </div>
            <input type="submit" value="保存">
        </form>
    </div>
    </x-app-layout>
</body>
