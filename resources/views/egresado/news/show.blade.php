@extends('layouts.egresado.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
        @endif

        <div class="col-md-12">

            <div class="card" style="margin-top: 30px;">
                <div class="card-header">
                        {{ $newsI->title }}

                </div>

                <div class="card-body container">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            {{ $newsI->body }}
                        </div>
                        <div class="col-4">
                            {{ $newsI->mediapath }}
                            
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection