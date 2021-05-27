@extends('admin.app')
@section('title') {{ $pageTitle }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-tags"></i> Transporto įmonės</h1>
        </div>
    </div>
    @include('admin.partials.flash')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="tile">
                <h3 class="tile-title">Redaguoti transporto įmonę</h3>
                <form action="{{ route('admin.transports.update') }}" method="POST" role="form" enctype="multipart/form-data">
                    @csrf
                    <div class="tile-body">
                        <div class="form-group">
                            <label class="control-label" for="name">Pavadinimas </label>
                            <input required class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{ old('name', $transport->name) }}"/>
                            <input type="hidden" name="id" value="{{ $transport->id }}">
                            @error('name') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="address">Adresas</label>
                            <input required class="form-control @error('address') is-invalid @enderror" type="text" name="address" id="address" value="{{ old('address', $transport->address) }}"/>
                            @error('address') {{ $message }} @enderror
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="email">El. paštas</label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="email" id="email" value="{{ old('email', $transport->email) }}"/>
                            @error('email') {{ $message }} @enderror
                        </div>
                        </div>
                    </div>
                    <div class="tile-footer">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Atnaujinti</button>
                        &nbsp;&nbsp;&nbsp;
                        <a class="btn btn-secondary" href="{{ route('admin.transports.index') }}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Atšaukti</a>
                    </div>
                </form>
            </div>
        </div>
@endsection