@extends('layouts/main')
@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">{{ Session::get('success') }}</div>
    @endif
    <h2>Jadwal kegiatan</h2>
    <a href="/jadwal/create" class="btn btn-primary my-3">Tambah Jadwal</a>

    <table class="table">
        <thead>
            <tr>
                <th>ID Jadwal</th>
                <th>Hari</th>
                <th>Jam Mulai</th>
                <th>Jam Selesai</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>SKS</th>
                <th>Ruangan</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
                <tr>
                    <td>{{ $i->id }}</td>
                    <td>{{ date_format(date_create($i->tanggal), 'l') }}</td>
                    <td>{{ $i->jam_mulai }}</td>
                    <td>{{ $i->jam_selesai }}</td>
                    <td>{{ $i->matkul->nama_matkul }}</td>
                    <td>{{ $i->dosen->nama_dosen }}</td>
                    <td>{{ $i->matkul->sks }} SKS</td>
                    <td>{{ $i->ruangan->nama_ruangan }}</td>
                    <td>
                        <a href="/jadwal/{{ $i->id }}" class="btn btn-primary">Edit</a>
                        <a href="/jadwal/delete/{{ $i->id }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
