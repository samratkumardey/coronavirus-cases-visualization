@extends('layouts.app')


@section('content')

   <div class="container">
       <div class='col-lg-8 col-lg-offset-4'>

           <h2><i class='fa fa-book'></i> Edit Data
               <a href="{{ url()->previous() }}" class="btn btn-light pull-right">Back</a></h2>
           <hr>

           {!! Form::open(array('route'=> ['bddata.update', $data->id],'method'=>'PUT', 'class'=>'form-horizontal')) !!}
           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('date', 'Date') }}</div>
               <div class="col-md-8"> {{ Form::date('date', $data->date, array('class' => 'form-control', 'required')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('covid_test', 'covid_test') }}</div>
               <div class="col-md-8"> {{ Form::number('covid_test', $data->covid_test, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('positive', 'positive') }}</div>
               <div class="col-md-8"> {{ Form::number('positive', $data->positive, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('home_quarantine', 'home_quarantine') }}</div>
               <div class="col-md-8"> {{ Form::number('home_quarantine', $data->home_quarantine, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('home_quarantine_release', 'home_quarantine_release') }}</div>
               <div class="col-md-8"> {{ Form::number('home_quarantine_release', $data->home_quarantine_release, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('govt_quarantine', 'govt_quarantine') }}</div>
               <div class="col-md-8"> {{ Form::number('govt_quarantine', $data->govt_quarantine, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('govt_quarantine_release', 'govt_quarantine_release') }}</div>
               <div class="col-md-8"> {{ Form::number('govt_quarantine_release', $data->govt_quarantine_release, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('isolation', 'isolation') }}</div>
               <div class="col-md-8"> {{ Form::number('isolation', $data->isolation, array('class' => 'form-control')) }}</div>
           </div>

           <div class="row form-group">
               <div class="col-md-4">{{ Form::label('isolation_release', 'isolation_release') }}</div>
               <div class="col-md-8"> {{ Form::number('isolation_release', $data->isolation_release, array('class' => 'form-control')) }}</div>
           </div>



           <div class="row form-group">
               <div class="col-md-4">

               </div>
               <div class="col-md-8">
                   {{ Form::reset('Clear', array('class'=> 'btn btn-warning')) }}
                   {{ Form::submit('Save Data', array('class' => 'btn btn-primary')) }}</div>
           </div>

           {!! Form::close() !!}

       </div>
   </div>

@endsection
