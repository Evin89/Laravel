@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2>Dashboard</h2>
                </div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Welcome {{ $user->name }}, you are logged in!
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>
                        Your warbands
                    </h3>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-borderless">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                1<th>Rating</th>
                                <th>Type</th>
                                <th>Active</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($warbands as $item)
                                <tr>
                                    <td>{{ $loop->iteration or $item->id }}</td>
                                    <td><a href="/warbands/{{ $item->id }}">{{ $item->name }}</a></td>
                                    <td>{{ $item->rating }}</td>
                                    <td><a href="/types/{{ $item->type->id }}">{{ $item->type->name }}</a></td>
                                    <td>
                                        @if( $item->active == true) Yes  @elseif ($item->active == false) No @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{--<div class="pagination-wrapper"> {!! $warbands->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
