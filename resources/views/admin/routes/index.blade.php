@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Maršrutai</h1>
            <p>Maršrutų sąrašas</p>
        </div>
        <a href="{{ route('admin.routes.fetch') }}" class="btn btn-primary pull-right">Importuoti duomenis</a>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th> Pavadinimas </th>
                                <th class="text-center"> Pradinė stotelė </th>
                                <th class="text-center"> Galinė stotelė </th>
                                <th class="text-center"> Išvyksta </th>
                                <th class="text-center"> Atvyksta </th>
                                <th class="text-center"> Transporto įmonė </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($routes as $route)
                                    <tr>
                                        <td>{{ $route->name }}</td>
                                        <td>{{ $route->start_point }}</td>
                                        <td>{{ $route->end_point }}</td>
                                        <td>{{ $route->start_time }}</td>
                                        <td>{{ $route->end_time }}</td>
                                        @foreach($transports as $transport)
                                        @if( $route->transport == $transport->id)
                                        <td>{{ $transport->name }}</td>
                                        @endif
                                        @endforeach
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.routes.edit', $route->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.routes.delete', $route->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
@endpush