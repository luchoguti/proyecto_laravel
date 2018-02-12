@extends('app')

@section('content_vue')

<div id="crud" class="row">
    <div class="col-xs-12 col-md-12">
        <h1 class="page-header">CRUD laravel y Vue</h1>
    </div>
    <div class="col-ms-7 col-md-7">
        <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#create">Nuevo Tareas</a>
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tarea</th>
                    <th colspan="2">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr  v-for="tareas in keeps">
                    <td width="10px">@{{ tareas.id }}</td>
                    <td>@{{ tareas.keep }}</td>
                    <td width="10px">
                        <a href="#" class="btn btn-warning btn-sm" v-on:click.prevent="editKeep(tareas)">Editar</a>
                    </td>
                    <td width="10px"><a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="deleteKeep(tareas)">Eliminar</a></td>
                </tr>
            </tbody>
        </table>
        <nav>
            <ul class="pagination">
                <li class="page-item" v-if="pagination.current_page > 1" @click.prevent="changePage(pagination.current_page - 1)">
                    <a  class="page-link" href="" title="">
                        <span>Atras</span>
                    </a>
                </li>

                <li class="page-item" v-for="page in pagesNumber" v-bind:class="[ page == isActived ? 'active' : '' ]">
                    <a class="page-link" href="#" @click.prevent="changePage(page)">
                        @{{ page }}
                    </a>
                </li>
                
                <li class="page-item" v-if="pagination.current_page < pagination.last_page">
                    <a class="page-link" href="#" @click.prevent="changePage(pagination.current_page + 1)">
                        <span>Siguiente</span>
                    </a>
                </li>
            </ul>
        </nav>
        @include('create')
        @include('edit')
    </div>
    <div class="col-ms-5 col-md-5">
        <!--el @direferecia a blade de vue, lo que se utiliza es vue en este momento-->
        <pre> @{{  $data }} </pre>
    </div>
</div>
@endsection