@extends('layout.master')

@section('content')

    <a class="btn btn-danger" title="Crear" href="{{url('posts/add')}}" style="margin-top: 20px;">
        Crear Post
    </a>
    <br><br>

    <table id="myTable" class="table table-striped table-bordered bootstrap-datatable datatable responsive">
    <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->name }}</td>
                <td>{{ $post->description }}</td>
                <td>
                    <div class="row">
                        <div class="col-xs-6">
                            <form method="get" action="{{ route('posts.edit') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <button class="btn btn-info" title="Actualizar" type="submit">Actualizar</button>
                            </form>
                        </div>
                        <div class="col-xs-6">
                            <form method="post" action="{{ route('posts.destroy') }}">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{ $post->id }}">
                                <button class="btn btn-danger" title="Eliminar" type="submit">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    @include('layout.datatablejs')
@endsection