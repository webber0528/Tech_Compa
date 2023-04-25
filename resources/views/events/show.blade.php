
<body>
        <x-app-layout>
            <x-slot name="header">
                　{{ Auth::user()->name }}
            </x-slot>
        <h1 class="title">
            <h2>イベントタイトル</h2>
            {{ $event->title }}
        </h1>
        <div class="content">
            
            <div class="content__post">
                <h3>イベント内容</h3>
                <p>{{ $event->contents }}</p>    
            </div>
            
            <div class="images">
                <img src= "{{ $event->image }}" alt="">
            </div>
        </div>
        
        <p class="edit"><a href="/events/{{ $event->id }}/edit">メッセージを編集する</a></p>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
         </x-app-layout>
</body>
   
