@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="jumbotron">
                    <h1>
                        Clients Edit
                    </h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Clients Edit</div>

                    <div class="panel-body">

                        <form class="form-horizontal" method="POST" action="{{ route('clients.update', [$client]) }}">
                            {{ csrf_field() }}

                            {{ method_field("PUT") }}

                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12 col-md-offset-2">
                                <label for="name">Name:</label>
                                <input id="name" type="text" class="form-control" name="name" value="{{$client->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>


                            <div class="form-group col-md-10 col-md-offset-2">

                                <a href="{{ route('clients.index') }}" class="btn btn-default" role="button">Cancel</a>

                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>

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
