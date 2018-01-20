@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                {{--<img src="/public/images/Mordheim_Intro_Logo.png" alt="">--}}
                <h2>Welcome!</h2>
                <p>Build and keep track of your Mordheim warbands, and explore warbands of other people!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <h3>Highest rated warbands</h3>
                <div class="table-responsive">
                    <table class="table table-borderless">
                        <thead>
                        <tr>
                           <th>Name</th><th>User</th><th>Rating</th><th>Type</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($warbands as $item)
                            <tr>
                                <td><a href="{{ url('/warbands/' . $item->id) }}">{{ $item->name}}</a></td>
                                <td>{{ $item->user->name }}</td>
                                <td>{{ $item->rating }}</td><td>{{ $item->type->name }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{--<div class="pagination-wrapper"> {!! $warbands->appends(['search' => Request::get('search')])->render() !!} </div>--}}
                </div>
            </div>
        </div>
    </div>
@endsection