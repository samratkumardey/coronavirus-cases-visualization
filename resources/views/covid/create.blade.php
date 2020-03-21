@extends('layouts.app')

@section('content')
    <div class="container">
        <div class='col-lg-8 col-lg-offset-4'>

            <h2>Add Data
                <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
            <hr>

            {!! Form::open(array('route'=> 'bdcovids.store', 'class'=>'form-horizontal', 'files'=>true)) !!}

            <div class="row form-group">
                <div class="col-md-4">{{ Form::label('country', 'Country') }}</div>
                <div class="col-md-8"> {{ Form::text('country', 'Bangladesh', array('class' => 'form-control', 'required')) }}</div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">{{ Form::label('confirmed', 'Confirmed') }}</div>
                <div class="col-md-8"> {{ Form::number('confirmed', '', array('class' => 'form-control', 'required')) }}</div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">{{ Form::label('deaths', 'Deaths') }}</div>
                <div class="col-md-8"> {{ Form::number('deaths', '', array('class' => 'form-control', 'required')) }}</div>
            </div>

            <div class="row form-group">
                <div class="col-md-4">{{ Form::label('recovered', 'Recovered') }}</div>
                <div class="col-md-8"> {{ Form::number('recovered', '', array('class' => 'form-control', 'required')) }}</div>
            </div>
            <div class="row form-group">
                <div class="col-md-4">{{ Form::label('batch', 'Batch') }}</div>
                <div class="col-md-8"> {{ Form::text('batch', \Carbon\Carbon::today()->format('m-d-Y'), array('class' => 'form-control', 'required')) }}</div>
            </div>


            <div class="row form-group">
                <div class="col-md-4">
                    {{ Form::hidden('last_update', \Carbon\Carbon::now()) }}
                </div>
                <div class="col-md-8">
                    {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                    {{ Form::submit('Save Data', array('class' => 'btn btn-primary')) }}</div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>


@endsection
