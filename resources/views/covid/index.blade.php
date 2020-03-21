@extends('layouts.app')

@section('content')

  <div class="container">
      <div class="col-lg-12 col-lg-offset-1">
          <h2> Covid Data of Bangladesh
              <a href="{{ route('bdcovids.create') }}" class="btn btn-success pull-right">Add Data</a></h2>
          <hr>
          <div class="table-responsive">
              <table class="table table-bordered table-striped" id="datatable">

                  <thead>
                  <tr>
                      <th>SL</th>
                      <th>Batch</th>
                      <th>Confirmed</th>
                      <th>Deaths</th>
                      <th>Recovered</th>
                      <th>updated_at</th>
                      <th>Edit</th>
                      <th>Delete</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach ($data as $item)
                      <tr>

                          <td>{{ $loop->index+1 }}</td>
                          <td>{{ $item->batch }}</td>
                          <td>{{ $item->confirmed }}</td>
                          <td>{{ $item->deaths }}</td>
                          <td>{{ $item->recovered }}</td>
                          <td>{{ $item->updated_at }}</td>

                          <td>
                              <a href="{{ route('bdcovids.edit', $item->id) }}" class="btn-sm btn-info pull-left" style="margin-right: 3px;">Edit</a>
                          </td>
                          <td>
                              {!! Form::open(['method' => 'DELETE', 'route' => ['bdcovids.destroy', $item->id] ]) !!}
                              {!! Form::submit('Delete', ['class' => 'btn-sm btn-danger pull-left']) !!}
                              {!! Form::close() !!}
                          </td>

                      </tr>
                  @endforeach
                  </tbody>

              </table>
          </div>




      </div>
  </div>

@endsection
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#datatable').DataTable( {
                dom: 'Bfrtip',
                buttons: [
                    {
                        extend: 'pdfHtml5',
                        orientation: 'landscape',
                        pageSize: 'LEGAL'
                    }
                ]
            } );
        } );

    </script>


@endsection
