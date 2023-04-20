<x-app-layout>
    
    
    
    @foreach($users as $u)
              <a href="/chats/{{$u->id}}" class="alert-link">{{ $u->name }}</a><br/>
              
    @endforeach
        
</x-app-layout>
