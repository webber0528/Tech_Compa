<x-app-layout>

            <div class="my-4 p-4 rounded-lg bg-blue-200" name="chatscontents">

                @foreach($chat as $c)
                    <div class='chat'>
                        @if($c->user_id)
                        <p style ="text-align: right">
                            <a>{{$c->user->name}} &ensp;{{$c->created_at}}</a><br>
                            <big>{{$c->message}}</big>
                        <form action="/chats/{{ $c->id }}" id="form_{{ $c->id }}" method="post" align="right">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteEvent({{ $c->id }})" >削除</button>
                        </form>
                        </p>
                        @else
                        <p align="left">
                            <a>{{$c->user->name}} &ensp;{{$c->created_at}}</a><br>
                            <big>{{$c->message}}</big>
                        <form action="/chats/{{ $c->id }}" id="form_{{ $c->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="deleteEvent({{ $c->id }})">削除</button>
                        </form>
                        </p>
                        @endif

                    </div>


                @endforeach


            </div>
            <div>
                <form action="/chats/{{$user->id}}" method="POST">
                        @csrf
                        <input type="hidden" >
                        <input class=type "text" style="width: 400px;"name="chat[message]"  maxlength="100">
                        <button class="mt-2 md:mt-0 md:ml-2 py-1 px-2 rounded text-center bg-gray-500 text-white" type="submit">送信</button>
                </form>
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
