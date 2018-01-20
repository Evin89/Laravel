@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Warband: {{ $warband->name }}</div>
                    <div class="panel-body">
                        @if(Auth::user())
                            @if (Auth::user()->id == $warband->user->id)
                               <a href="{{ url('/warbands/' . $warband->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                <br><br>
                            @endif
                        @endif

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>User</th>
                                        <td><a href="/users/{{ $warband->user->id }}">{{ $warband->user->name }}</a></td>
                                    </tr>
                                    <tr>
                                        <th> Name </th>
                                        <td> {{ $warband->name }} </td>
                                    </tr><tr><th> Rating </th>
                                        <td> {{ $warband->rating }} </td>
                                    </tr>
                                    <tr><th> Type </th>
                                        <td><a href="/types/{{ $warband->type->id }}">{{ $warband->type->name }}</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
