
<x-app-layout>
    
       
    
        <div class='events'>
            @foreach ($events as $e)
                <div class='event'align="center">
                    
                    <div class='title' >
                        <a href="/events/{{ $e->id }}">{{ $e->title }}</a>
                    </div>
                    
                    <div class='contents' >
                        <a>{{ $e->contents }}</a>
                    </div>
                    
                    <div class="images" >
                        <img src= "{{ $e->image }}" alt="">
                    </div>
                    
                    <div class="user_name" >
                        <a>{{ $e->user->name }}さんが作成</a>
                    </div>
                </div>
               
                <form action="/events/{{ $e->id }}" id="form_{{ $e->id }}" method="post" >
                    <div align="right">
                    @csrf
                    @method('DELETE')
                    <button type="button" onclick="deleteEvent({{ $e->id }})">イベント削除</button>
                    </div>
                </form>
                <hr>
            @endforeach
            
            
            <a href='/events/create'>
                <div align="right">
                イベント作成
                </div>
            </a>
        </div>
            
            <script>
                function deleteEvent(id) {
                    'use strict'
                    if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
                        document.getElementById(`form_${id}`).submit();
                    }
                }
            </script>
            
            
        
    
</x-app-layout>
