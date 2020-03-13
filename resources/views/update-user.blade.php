@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Update User</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save_update_user') }}" enctype="multipart/form-data">

	                    @csrf

	                    <input type="hidden" class="form-control" id="id_user" name="id_user" value="{{$user->id}}">

	                    <div class="form-group row">
	                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Nome') }}</label>
	                        <div class="col-md-10">
	                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" required>
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Senha') }}</label>
	                        <div class="col-md-10">
	                            <input type="text" class="form-control" id="password" name="password">
	                        </div>
	                    </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-10 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Salvar') }}
                                </button>
                            </div>
                        </div>

                	</form>

               	</div>
           	</div>
        </div>
    </div>
</div>
@endsection
