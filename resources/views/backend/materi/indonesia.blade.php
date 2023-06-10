@extends('layouts.app')

@section('content')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <a href="{{ route('indonesia.uploadForm') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-dark table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama File</th>
                <th scope="col">Jenis File</th>
                <th scope="col">File</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $newId = 1;
            @endphp
            @foreach ($data as $row)
                <tr>
                    <th scope="row">{{ $newId }}</th>
                    <td>{{ $row->nama_file }}</td>
                    <td>{{ $row->jenis_file }}</td>
                    <td>
                        <a href="{{ Storage::url($row->file_path) }}" target="_blank" download>{{ $row->file_path }}</a>
                    </td>
                    <td>
                        <a href="{{ route('indonesia.edit', ['id' => $row->id]) }}" class="btn btn-success">Edit</a>

                        <form action="{{ route('indonesia.destroy', $row->id) }}" method="POST"
                            style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @php
                    $newId++;
                @endphp
            @endforeach
        </tbody>
    </table>
@endsection
