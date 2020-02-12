@extends("layouts.Frontend.dayz")

@section("content")
    <div style="padding-top: 50px"></div>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Trader</h4>
                    <h6 class="card-subtitle">*Cantidad * significa valor máximo; Cantidad V significa Vehículo; Cantidad VNK significa Vehículo sin Llave; Cantidad M significa revista; La cantidad W significa arma; Cantidad S significa carne Steack; Cantidad K significa duplicación de clave</h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Categoria</th>
                                <th>Compra</th>
                                <th>Venta</th>
                                <th>Cantidad</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Trade as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->subtype}}</td>
                                <td>{{$item->buyprice}}</td>
                                <td>{{$item->sellprice}}</td>
                                <td>{{$item->traderCat}}</td>
                                <td>
                                    <button class="btn-success"><i class="fa fa-edit"></i></button>
                                    <button class="btn-danger"><i class="fa fa-trash"></i></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
