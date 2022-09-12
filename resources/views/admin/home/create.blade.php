@extends('layouts.admin.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Paginas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Paginas</a></li>
                        @isset($pagina)
                        <li class="breadcrumb-item active">Editar</li>
                        @else
                        <li class="breadcrumb-item active">Cadastrar</li>
                        @endisset
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Formulario de paginas</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <form id="form-grupo" action="{{ isset($pagina) ? route('admin.update', $pagina->id) : route('admin.store') }}" method="POST" enctype="multipart/form-data">
                                @include('admin.home.fields')

                                <button type="button" onclick="Form.salvarForm(
                                    'form-grupo',
                                    '{{ isset($pagina) ? route('admin.update', $pagina->id) : route('admin.store') }}',
                                    '{{route('admin.index')}}'
                                )" class="btn btn-primary">Salvar</button>
                        </div>

                        <input type="hidden" name="id" value="{{ isset($pagina) ? $pagina->id : '' }}" id="id">
                        </form>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
</div>
<!-- /.container-fluid -->
</section>
<!-- /.content -->
</div>
@endsection