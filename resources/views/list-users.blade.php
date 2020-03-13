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
            <div class="card">
                <div class="card-header">User List</div>

                <div class="card-body">
                
                    @if (count($users) > 0)

                        @foreach ($users as $user)
                            <a class="pointer-click" onclick="event.preventDefault();$('#id_update_user').val( {{$user->id}} ); $('#update_user').submit();"> {{$user->name}} </a> <br>
                        @endforeach

                    @endif

                </div>

                <form id="update_user" name="update_user" method="POST" action="{{ route('update_user') }}">
                    @csrf
                    <input type="hidden" id="id_update_user" name="id_update_user">
                </form>

            </div>
        </div>
    </div>
</div>

@endsection
