@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-9">
                <div class="panel panel-default">

                    <div class="panel-heading">Types</div>
                    <div class="panel-body">

                        @if (Auth::user())
                            <a href="{{ url('/warbands/create') }}" class="btn btn-success btn-sm" title="Add New Warband">
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
                                        <th>#</th><th>Name</th>
                                        @if (Auth::user())
                                            @if(Auth::user()->is_author == true)
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            @endif
                                            @if (Auth::user()->is_author != true)
                                                <th></th>
                                            @endif
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($types as $item)
                                    <tr>
                                        <td>{{ $loop->iteration or $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        @if (Auth::user())
                                            @if(Auth::user()->is_author == true)
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
                                        @endif
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper"> {!! $types->appends(['search' => Request::get('search')])->render() !!} </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
