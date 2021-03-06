@extends('layouts.plantilla')

@section('content')
    <div class="wrapper-proyect carrito">
        <h1>Tu carrito</h1>
        <div class="container">
            <div class="row">
                @include('layouts.mensaje-error')
                <div class="col-md-12">
                    @if (count(Cart::getContent()))
    
                        <table class="reportes-table">
    
                            <thead class="reportes-table-head">
                                <tr>
                                    <th>No</th>
    
                                    <th>Nombre</th>
                                    <th>Precio</th>
                                    <th>Cantidad</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody class="reportes-table-body">
                                @foreach (Cart::getContent() as $productoCarro)
                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $productoCarro->name }}</td>
                                        <td>{{ $productoCarro->price }}</td>
                                        <td>{{ $productoCarro->quantity }}</td>
                                        <td>
                                            <form action="{{ route('removeitem.carrito') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="i" value="{{ $productoCarro->id }}">
                                                <button class="btn btn-danger eliminar" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach                            
                            </tbody>
                        </table>
                        <form action="{{ route('crear.venta') }}" method="post" id="form-crearventa">
                            @csrf
                            <button class="btn btn-primary btn-block crear-venta carrito__pagar" type="submit">Pagar</button>
                            <a href="{{ route('clear.carrito') }}" class="carrito__limpiar">Limpiar carrito de compras</a>
                            
                        </form>      
                    @else
                        <p style="text-align: center">No hay productos en el carrito</p>
                    @endif
                </div>
            
            </div>    
        </div>
    </div>
@endsection

{{-- @section('js')
    <script src="{{ asset('js/views/venta.js') }}"></script>
@endsection --}}