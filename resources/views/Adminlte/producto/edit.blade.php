@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Actualizar producto</span>
                        <div class="float-right">
                            <a href="{{ route('AdminLte.productos.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">Atrás</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('AdminLte.productos.update', $producto->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('AdminLte.producto.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
