@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="GET" action="/register/validate">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('user_type') ? ' has-error' : '' }}">
                            <label for="user_type" class="col-md-4 control-label">Faculty/School</label>

                            <div class="col-md-6 radio">
                                <label><input id="user_type" type="radio" value="0" name="user_type" required autofocus>Ateneo High School</label> <br>
                                <label><input id="user_type" type="radio" value="1" name="user_type" required autofocus>Loyola Schools (Undergraduate) </label> <br>
                                <label><input id="user_type" type="radio" value="2" name="user_type" required autofocus>Employee</label> <br>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Next
                                </button>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
