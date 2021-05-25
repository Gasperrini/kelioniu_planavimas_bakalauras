<style> 
 * { font-family: DejaVu Sans, sans-serif; }
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<section class="section-content bg padding-y">
    <div class="container">
        <div id="code_prod_complex">
            <div class="row">
                    <div class="col-md-4">
                        <figure class="card card-product">
                            <figcaption class="info-wrap">
                                <h4 class="title">{{ $data->name }}</h4>
                            </figcaption>
                        </figure>
                    </div>
            </div>
        </div>
    </div>
</section>
<table class="table" id="land_table">
                    <thead>
                        <tr>
                        <th scope="col">Išvykimo laikas</th>
                        <th scope="col">Grįžimo laikas</th>
                        <th scope="col">Kelionės pradžia</th>
                        <th scope="col">Kelionės pabaiga</th>
                        </tr>
                    </thead>
                    <tbody>
                      <tr>    
                              <td>{{ $data->start_time }}</th>
                              <td>{{ $data->end_time }}</th>
                              <td>{{ $data->start_point }}</th>
                              <td>{{ $data->end_point }}</th>
                      </tr>
                    </tbody>    
                </table>