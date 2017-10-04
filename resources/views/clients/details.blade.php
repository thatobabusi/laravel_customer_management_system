@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jumbotron">
                    <h1>
                        Clients Details
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Clients Details</div>

                    <div class="panel-body">

                        <div>

                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="name" class="col-md-2">Name:</label>
                                <p class="col-md-10">{{$client->name}}</p>
                            </div>

                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="name" class="col-md-2">Creator:</label>
                                <p class="col-md-10">{{$client->CreatedBy->first_name}} {{$client->CreatedBy->last_name}}</p>
                            </div>

                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="name" class="col-md-2">Created:</label>
                                <p class="col-md-10">{{$client->created_at}}</p>
                            </div>

                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="name" class="col-md-2">Last Updated:</label>
                                <p class="col-md-10">{{$client->updated_at}}</p>
                            </div>

                            <div class="form-group col-md-12 col-md-offset-2">
                                <label for="name" class="col-md-2">Status:</label>
                                <p class="col-md-10">{{$client->name}}</p>
                            </div>


                            <div class="form-group col-md-10 col-md-offset-2">

                                <a href="{{ route('clients.edit', [$client]) }}" class="btn btn-default" role="button">Edit</a>

                                {!! Form::open(['method' => 'DELETE', 'route' => ['clients.destroy', $client], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('extra_js')
    <script>
        //ExtraJS
    </script>
@endsection
