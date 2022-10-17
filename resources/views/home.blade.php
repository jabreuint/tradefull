@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="bg-light p-5 rounded">
                        <h1>Welcome to Tradefull!</h1>
                        <p class="lead">Tradefull is a complete e-commerce solution that helps companies better manage their warehousing, fulfillment, shipping, and logistics.</p>
                        <a class="btn btn-lg btn-primary" href="{{ route('account.edit') }}" role="button">My Account »</a>
                    </div>

                    <div class="bg-light p-5 rounded">
                        <h3>User Logging Activity</h3>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">User Agent</th>
                                    <th scope="col" style="white-space:nowrap;">IP Address</th>
                                    <th scope="col" style="white-space:nowrap;">Log Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($userLoggingLogs as $userLoggingLog)
                                    <tr>
                                        <th scope="row">{{ $userLoggingLog->id }}</th>
                                        <td>{{ $userLoggingLog->user->name }}</td>
                                        <td>{{ $userLoggingLog->user_agent }}</td>
                                        <td>{{ $userLoggingLog->ip_address }}</td>
                                        <td>{{ $userLoggingLog->created_at }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {!! $userLoggingLogs->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
