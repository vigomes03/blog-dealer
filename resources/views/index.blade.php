@extends('layouts.app')

@section('content')

<style type="text/css">
    
    .post-board {
        border: 1px solid rgba(0, 0, 0, 0.125);
        padding: 10px;
    }

    .pointer-click {
        cursor: pointer;
    }

</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <br>
            <form id="pesquisa" name="pesquisa" method="POST" action="{{ route('/') }}">
                @csrf
                <input type="text" id="pesquisa" name="pesquisa" style="height: 33px;position: relative;top: 3px;">
                <button type="submit" class="btn btn-primary">
                    {{ __('Pesquisar') }}
                </button>
            </form>
            <br>
            <br>


            <div class="card">
                <div class="card-header">Post List</div>

                <div class="card-body">
                    
                    @if (count($posts) > 0)

                        @foreach ($posts as $post)

                            <div class="post-board">                            
                                <div class="row">                                
                                    <div class="col-4">
                                        @if ($post->img)
                                            <img src="{{$post->img}}" width="100%">
                                        @else
                                            <img src="img/placeholder.png" width="100%">
                                        @endif
                                    </div>
                                    <div class="col-4">
                                        <h4> {{$post->title}} </h4>
                                        <span> {{$post->body}} </span>
                                        {{date_format(date_create($post->created_at),"d/m/Y")}} - {{$post->author}}
                                    </div>
                                </div>
                                @if (Auth::user())
                                    @if (Auth::user()->is_admin == "Y" || Auth::user()->id == $post->id_user)
                                        <div class="row" style="padding-top: 15px"> 
                                            <div class="col-12">
                                                <a class="pointer-click" onclick="event.preventDefault();$('#id_update').val( {{$post->id}} ); $('#update_post').submit();"> Editar </a> |
                                                <a class="pointer-click" onclick="event.preventDefault();$('#id_remove').val( {{$post->id}} ); $('#remove_post').submit();"> Remover </a>  
                                            </div>
                                        </div>
                                    @endif
                                @endif
                            </div>

                        @endforeach

                    @else
                        Não existem POSTS no momento
                    @endif

                </div>

                <form id="remove_post" name="remove_post" method="POST" action="{{ route('remove_post') }}">
                    @csrf
                    <input type="hidden" id="id_remove" name="id_remove">
                </form>

                <form id="update_post" name="update_post" method="POST" action="{{ route('update_post') }}">
                    @csrf
                    <input type="hidden" id="id_update" name="id_update">
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
