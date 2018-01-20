@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">User: {{ $user->name }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/users') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr><th> Name </th><td> {{ $user->name }} </td></tr>
                                    <tr><th> Email </th><td> {{ $user->email }} </td></tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <h3>Warbands</h3>
                            <table class="table table-borderless">
                                <tbody>

                                    <tr>
                                        <th>Name</th>
                                        <th>Rating</th>
                                        <th>Type</th>
                                    </tr>
                                    @foreach($warbands as $item)

                                        <tr>
                                            <td><a href="/warbands/{{ $item->id }} ">{{ $item->name }}</a></td>
                                            <td>{{ $item->rating }}</td>
                                            <td><a href="/types/{{ $item->type->id }}">{{ $item->type->name }}</a></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
