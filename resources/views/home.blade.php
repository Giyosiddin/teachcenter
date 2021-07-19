@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if(Auth::user()->isAdmin())
                    <h2>You are Admin!</h2>
                    @endif
                    @if(Auth::user()->isUser())
                    <h2>You are User!</h2>
                    @endif
                    @if(Auth::user()->isDisabled())
                    <h2>You are disabled user!</h2>
                    @endif
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
