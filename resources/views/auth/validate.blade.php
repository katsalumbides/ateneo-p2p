@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                @if($user_type == 0)
                    <form class="form-horizontal" role="form" method="POST" action="/register/validate/{{$user_type}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('hs_id_number') ? ' has-error' : '' }}">
                            <label for="hs_id_number" class="col-md-4 control-label">High School ID Number</label>

                            <div class="col-md-6">
                                <input id="hs_id_number" type="text" class="form-control" name="hs_id_number" value="{{ old('hs_id_number') }}" required autofocus>

                                @if ($errors->has('hs_id_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('hs_id_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('grade_level') ? ' has-error' : '' }}">
                            <label for="grade_level" class="col-md-4 control-label">Grade Level</label>

                            <div class="col-md-6">
                                <input id="grade_level" type="text" class="form-control" name="grade_level" value="{{ old('grade_level') }}" required autofocus>

                                @if ($errors->has('grade_level'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('grade_level') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('section') ? ' has-error' : '' }}">
                            <label for="section" class="col-md-4 control-label">Section</label>

                            <div class="col-md-6">
                                <input id="section" type="text" class="form-control" name="section" value="{{ old('section') }}" required autofocus>

                                @if ($errors->has('section'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('section') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <hr>
                        <center> <b> Parent/Guardian Information </b><center><br>

                        <div class="form-group{{ $errors->has('parents_name') ? ' has-error' : '' }}">
                            <label for="parents_name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="parents_name" type="text" class="form-control" name="parents_name" value="{{ old('parents_name') }}" required autofocus>

                                @if ($errors->has('parents_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parents_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent_number') ? ' has-error' : '' }}">
                            <label for="parent_number" class="col-md-4 control-label">Mobile Number</label>

                            <div class="col-md-6">
                                <input id="parent_number" type="text" class="form-control" name="parent_number" value="{{ old('parent_number') }}" required autofocus>

                                @if ($errors->has('parent_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('parent_email') ? ' has-error' : '' }}">
                            <label for="parent_email" class="col-md-4 control-label">E-mail Address</label>

                            <div class="col-md-6">
                                <input id="parent_email" type="text" class="form-control" name="parent_email" value="{{ old('parent_email') }}" required autofocus>

                                @if ($errors->has('parent_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('parent_email') }}</strong>
                                    </span>
                                @endif
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

                @elseif ($user_type == 1)
                    <form class="form-horizontal" role="form" method="POST" action="/register/validate/{{$user_type}}">
                        {{ csrf_field() }}

                         <div class="form-group{{ $errors->has('ls_id_number') ? ' has-error' : '' }}">
                            <label for="ls_id_number" class="col-md-4 control-label">Loyola Schools ID</label>

                            <div class="col-md-6">
                                <input id="ls_id_number" type="text" class="form-control" name="ls_id_number" value="{{ old('ls_id_number') }}" required autofocus>

                                @if ($errors->has('ls_id_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ls_id_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('obf_email') ? ' has-error' : '' }}">
                            <label for="obf_email" class="col-md-4 control-label">OBF E-mail Address</label>

                            <div class="col-md-6">
                                <input id="obf_email" type="text" class="form-control" name="obf_email" value="{{ old('obf_email') }}" required autofocus>

                                @if ($errors->has('obf_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('obf_email') }}</strong>
                                    </span>
                                @endif
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

                @elseif ($user_type == 2)

                <form class="form-horizontal" role="form" method="POST" action="/register/validate/{{$user_type}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('staff_id_number') ? ' has-error' : '' }}">
                            <label for="staff_id_number" class="col-md-4 control-label">Employee ID</label>

                            <div class="col-md-6">
                                <input id="staff_id_number" type="text" class="form-control" name="staff_id_number" value="{{ old('staff_id_number') }}" required autofocus>

                                @if ($errors->has('staff_id_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff_id_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('ateneo_email') ? ' has-error' : '' }}">
                            <label for="ateneo_email" class="col-md-4 control-label">Ateneo E-mail Address</label>

                            <div class="col-md-6">
                                <input id="ateneo_email" type="text" class="form-control" name="ateneo_email" value="{{ old('ateneo_email') }}" required autofocus>

                                @if ($errors->has('ateneo_email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('ateneo_email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('staff_unit') ? ' has-error' : '' }}">
                            <label for="staff_unit" class="col-md-4 control-label">Unit</label>

                            <div class="col-md-6 radio">
                                <label><input id="staff_unit" type="radio" value="0" name="staff_unit">AGS</label> <br>
                                <label><input id="staff_unit" type="radio" value="1" name="staff_unit">AJHS</label> <br>
                                <label><input id="staff_unit" type="radio" value="2" name="staff_unit">ASHS</label> <br>
                                <label><input id="staff_unit" type="radio" value="3" name="staff_unit">BEU (Admin)</label> <br>
                                <label><input id="staff_unit" type="radio" value="4" name="staff_unit">LS</label> <br>
                                <label><input id="staff_unit" type="radio" value="5" name="staff_unit">Central Admin</label> <br>
                                <label><input id="staff_unit" type="radio" value="6" name="staff_unit">Affiliate</label> <br>

                                @if ($errors->has('staff_unit'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff_unit') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('staff-department') ? ' has-error' : '' }}">
                            <label for="staff-department" class="col-md-4 control-label">Department</label>

                            <div class="col-md-6">
                                 <input id="staff-department" type="staff-department" class="form-control" name="staff-department" value="{{ old('staff-department') }}" required>
                                @if ($errors->has('staff-department'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('staff-department') }}</strong>
                                    </span>
                                @endif
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

                @endif


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
