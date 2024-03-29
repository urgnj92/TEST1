@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href='index'>You are logged in!</a>
                </div>


                <div>
                    <button type="button" onclick="history.back()">{{ __('戻る') }}</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
