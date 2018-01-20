@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>
                    <div class="panel-body">

                        @if (Auth::user())
                            <a href="{{ url('/users/create') }}" class="btn btn-success btn-sm" title="Add New Warband">
                                <i class="fa fa-plus" aria-hidden="true"></i> Add New
                            </a>
                            <br/>
                            <br/>
                        @endif

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        @if (Auth::user())
                                            @if(Auth::user()->is_admin == true)
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            @endif
                                                @if (Auth::user()->is_admin != true)
                                                    <th></th>
                                                @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td><a href="/users/{{ $item->id }}">{{ $item->name }}</a></td>
                                        @if (Auth::user())
                                            @if(Auth::user()->is_admin == true)
                                                <td>                        <a href="{{ url('/users/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                </td>
                                                <td>
                                                    <form method="POST" action="{{ url('/users' . '/' . $item->id) }}" accept-charset="UTF-8" style="display:inline">
                                                        {{ method_field('DELETE') }}
                                                        {{ csrf_field() }}
                                                        <button type="submit" class="btn btn-danger btn-xs" title="Delete user" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                                                    </form>
                                                </td>
                                            @endif
                                                @if (Auth::user()->is_admin != true && Auth::user()->id == $item->id)
                                                    <td>                        <a href="{{ url('/users/' . $item->id . '/edit') }}" title="Edit user"><button class="btn btn-primary btn-xs"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                                                    </td>
                                                @endif
                                        @endif

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $users->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
