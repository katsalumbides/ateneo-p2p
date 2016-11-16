@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2>Contact Us</h2>
            <div class="panel panel-default">
                 <div class="panel-body">
                    <h4>For AJHS/ASHS</h4>

                    @foreach( $contacts as $contact)
                        @if( $contact -> contact_faculty == 'AJHS/ASHS' )
                            <br> {{ $contact -> contact_number }}
                        @endif
                    @endforeach

                    <hr>

                    <h4>For LS/Employees/University Affiliates</h4>

                    @foreach( $contacts as $contact)
                        @if( $contact -> contact_faculty == 'LS/Employees/University Affiliates' )
                            <br>{{ $contact -> contact_number }}
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
