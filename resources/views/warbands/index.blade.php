@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            {{--@include('admin.sidebar')--}}

            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Warbands</div>
                    <div class="panel-body">

                    @if (Auth::user())
                                <a href="{{ url('/warbands/create') }}" class="btn btn-success btn-sm" title="Add New Warband">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add New
                                </a>
                                <br/>
                                <br/>
                        @endif
                        
                        <form method="GET" action="{{ url('/warbands/search') }}" accept-charset="UTF-8" class="navbar-form navbar-right" role="search">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit">
                                       OK
                                    </button>
                                </span>
                            </div>
                        </form>

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th><th>User</th><th>Name</th><th>Rating</th><th>Type</th><th></th><th></th><th></th><th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($warbands as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td><a href="/users/{{ $item->user->id }}">{{ $item->user->name}}</a></td>
                                        <td><a href="/warbands/{{ $item->id }}">{{ $item->name }}</a></td>
                                        <td>{{ $item->rating }}</td>
                                        <td><a href="/types/{{ $item->type->id }}">{{ $item->type->name }}</a></td>
                                        @if(Auth::user())
                                            <td>
                                                <form method="POST" action="{{ url('/warbands' . '/' . $item->id) . '/up' }}" accept-charset="UTF-8" style="display:inline">
                                                {{ method_field('PATCH') }}
                                                {{ csrf_field() }}
                                                    <button type="submit" title="Vote up" onclick="return confirm(&quot;Confirm rate up?&quot;)">
                                                        <p>{{ HTML::image('images/vote_up.png', 'vote up', array('class' => 'thumb')) }}</p>
                                                    </button>
                                                </form>

                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ url('/warbands' . '/' . $item->id) . '/down' }}" accept-charset="UTF-8" style="display:inline">
                                                    {{ method_field('PATCH') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" title="Vote down" onclick="return confirm(&quot;Confirm rate down?&quot;)">
                                                        <p>{{ HTML::image('images/vote_down.png', 'vote down', array('class' => 'thumb')) }}</p>
                                                    </button>
                                                </form>

                                                </a>
                                            </td>
                                            @if (Auth::user()->id == $item->user->id)
                                                <td>                        <a href="{{ url('/warbands/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ url('/warbands' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                                @endif
                                        @endif
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
