@extends('site.app')
@section('title', 'Homepage')

@section('content')

    <div style="text-align:center">
        <h1>Mano kelionės</h1>
      </div>

            <div>
            
                <table class="table" id="bus_table" >
                    <thead>
                        <tr>
                        <th scope="col">Kelionės pavadinimas</th>
                        <th scope="col">Veiksmai</th>
                        </tr>
                    </thead>
                    @foreach($journeys as $journey)
                    <tbody>
                      <tr>    
                              <td>{{$journey->name}}</th>
                              <td>
                                @csrf
                                <button type="submit" id="choose"><a href="{{ route('journey.show', $journey->slug) }}">Plačiau</a></button>
                                <button>Atsisiųsti kelionę</button></th>
                      </tr>
                    </tbody>    
                    @endforeach
                </table>
            </div>


@stop