@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    users 
                    @if(Session::has('bookingConfirmed'))
                        {{ Session::get('user_email_checking') }}
                        @else
                            {{ "error" }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
