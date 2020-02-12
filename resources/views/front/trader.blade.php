@extends("layouts.Frontend.dayz")

@section("content")
    <div style="padding-top: 50px"></div>
    <div class="row">
        <!-- column -->
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Trader</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Compra</th>
                                <th>Venta</th>
                                <th>Cantidad</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($Trade as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->buyprice}}</td>
                                <td>{{$item->sellprice}}</td>
                                <td>{{$item->traderCat}}</td>
{{--                                <td><span class="label label-danger">admin</span></td>--}}
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
