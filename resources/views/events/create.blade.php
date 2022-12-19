<body>
        <x-app-layout>
            
        <h1>Event</h1>
        <form action="/events" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="event[title]" placeholder="タイトル" value = "{{ old('event.title') }}" />
                <p class="title__error" style="color:red">{{ $errors->first('event.title') }}</p>
            </div>
            
            <div class="contents">
                <h2>Contents</h2>
                <textarea name="event[contents]" >{{ old('event.contents') }}</textarea>
                <p class="contents__error" style="color:red">{{ $errors->first('event.contents') }}</p>
                    <div class="images">
                        <input type="file"  name="image" >
                        <p class="photos__error" style="color:red">{{ $errors->first('image') }}</p>
                    </div>
            </div>
            <input type="submit" value="イベント登録"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        
        </x-app-layout>
        
    
    <input type="submit">
</form>
</body>
   
