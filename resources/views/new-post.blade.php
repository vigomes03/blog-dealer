@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-header">Novo Post</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('save_post') }}" enctype="multipart/form-data">

	                    @csrf

	                    <div class="form-group row">
	                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Titulo') }}</label>
	                        <div class="col-md-10">
	                            <input type="text" class="form-control" id="title" name="title" required>
	                        </div>
	                    </div>
                	
	                    <div class="form-group row">
	                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Imagem') }}</label>
	                        <div class="col-md-10">
	                            <input type="file" class="form-control" id="img" name="img">
	                        </div>
	                    </div>

	                    <div class="form-group row">
	                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('Corpo') }}</label>
	                        <div class="col-md-10">
	                            <textarea class="form-control" id="body" name="body" required></textarea>
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
