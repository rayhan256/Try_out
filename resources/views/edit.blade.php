@php
$bulan = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'];
$array_date = explode('-', $jadwal->tanggal);
@endphp

@extends('layouts/main')
@section('content')
    <h1>Ubah Jadwal</h1>

    <form action="/jadwal/update" method="post">
        @csrf
        <div class="form-group">
            <label for="">ID</label>
            <input type="text" name="id" class="form-control" value="{{ $jadwal->id }}" readonly>
        </div>
        <div class="form-group">
            <label for="">Mata Kuliah</label>
            <select name="mata_kuliah_id" class="form-control">
                <option value="{{ $cur_matkul->id }}">{{ $cur_matkul->nama_matkul }}</option>
                @foreach ($matkul as $i)
                    <option value="{{ $i->id }}">{{ $i->nama_matkul }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="">Dosen</label>
            <select name="dosen_id" id="" class="form-control">
                <option value="{{ $cur_dosen->id }}">{{ $cur_dosen->nama_dosen }}</option>
                @foreach ($dosen as $i)
                    <option value="{{ $i->id }}">{{ $i->nama_dosen }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group row">
            <div class="col-4">
                <div class="form-group">
                    <label for="">Tanggal</label>
                    <select type="text" name="tanggal" class="form-control">
                        <option value="{{ $array_date[2] }}">{{ $array_date[2] }}</option>
                        @for ($i = 1; $i <= 31; $i++)
                            <option value={{ $i }}>{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">Bulan</label>
                    <select type="text" name="bulan" class="form-control">
                        <option value="{{ $array_date[1] }}">{{ $array_date[1] }}</option>
                        @for ($i = 0; $i <= count($bulan) - 1; $i++)
                            <option value="{{ $i }}">{{ $bulan[$i] }}</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    <label for="">Tahun</label>
                    <input type="text" name="tahun" class="form-control" value="{{ $array_date[0] }}">
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-6">
                <div class="form-group">
                    <label for="">Jam Mulai</label>
                    <input type="time" name="jam_mulai" id="" class="form-control" value="{{ $jadwal->jam_mulai }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="">Jam Selesai</label>
                    <input type="time" name="jam_selesai" id="" class="form-control" value="{{ $jadwal->jam_selesai }}">
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="">Ruangan</label>
            <select name="ruangan_id" id="" class="form-control">
                @foreach ($ruangan as $i)
                    <option value="{{ $i->id }}">{{ $i->nama_ruangan }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Update" class="btn btn-outline-primary">
    </form>
@endsection
