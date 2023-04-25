
<body>
    <x-app-layout>
        
    <h1 class="title">編集画面</h1>
    <div class="contents">
        <form action="/events/{{ $event->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class='contents__title'>
                <h2>イベントタイトル</h2>
                <input type='text' name='event[title]' value="{{ $event->title }}">
                <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            
            <div class='contents__content'>
                <h2>イベント内容</h2>
                <input type='text' name='event[contents]' value="{{ $event->contents }}">
                <p class="title__error" style="color:red">{{ $errors->first('event.contents') }}</p>
                <img src= "{{ $event->image }}" alt="">
                 <input type="file"  name="updateimg" >
                    <p class="photos__error" style="color:red">{{ $errors->first('image') }}</p>
            </div>
            

            <input type="submit" value="保存">
        </form>
    </div>
    </x-app-layout>
</body>
