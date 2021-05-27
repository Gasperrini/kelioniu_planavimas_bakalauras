@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Nakvynės vietos</h1>
            <p>Nakvynės vietų sąrašas</p>
        </div>
        <a href="{{ route('admin.accommodations.fetch') }}" class="btn btn-primary">Importuoti duomenis</a>
        <a href="{{ route('admin.accommodations.create') }}" class="btn btn-primary pull-right">Pridėti</a>
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
                                <th class="text-center"> Adresas </th>
                                <th class="text-center"> Platuma </th>
                                <th class="text-center"> Ilguma </th>
                                <th class="text-center"> Svetainė </th>
                                <th style="width:100px; min-width:100px;" class="text-center text-danger"><i class="fa fa-bolt"> </i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($accommodations as $acc)
                                    <tr>
                                        <td>{{ $acc->name }}</td>
                                        <td>{{ $acc->address }}</td>
                                        <td>{{ $acc->lat }}</td>
                                        <td>{{ $acc->lng }}</td>
                                        <td>{{ $acc->url }}</td>
                                        <td class="text-center">
                                            <div class="btn-group" role="group" aria-label="Second group">
                                                <a href="{{ route('admin.accommodations.edit', $acc->id) }}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                                                <a href="{{ route('admin.accommodations.delete', $acc->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
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