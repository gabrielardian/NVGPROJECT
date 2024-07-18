@extends('layouts.admin')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Tambah Player</h1>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

@endif

<div class="card shadow">
    <div class="card-body">
        <form action="{{ route('player.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="title">ID Tournament</label>
                    <select name="id_tournament" required class="form-control">
                        <option value="">--Pilih Tournament--</option>
                        @foreach($tournaments as $tr)
                            <option value="{{ $tr->id }}">
                                {{ $tr->name }}
                            </option>
                        @endforeach
                    </select>
            </div>
            
            <div class="form-group">
                <label for="title">Nama</label>
                <input type="text" class="form-control" name="nama" placeholder="Nama" value="{{ old('nama') }}">
            </div>

            <div class="form-group">
                <label for="title">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="title">Discord</label>
                <input type="text" class="form-control" name="discord" placeholder="Discord" value="{{ old('discord') }}">
            </div>

            <div class="form-group">
                <label for="title">No HP</label>
                <input type="text" class="form-control" name="no_hp" placeholder="No HP" value="{{ old('no_hp') }}">
            </div>

            <div class="form-group">
                <label for="title">Player 1</label>
                <input type="text" class="form-control" name="player1" placeholder="Player 1" value="{{ old('player1') }}">
            </div>

            <div class="form-group">
                <label for="title">Level 1</label>
                <input type="text" class="form-control" name="level1" placeholder="Level 1" value="{{ old('level1') }}">
            </div>

            <div class="form-group">
                <label for="title">Player 2</label>
                <input type="text" class="form-control" name="player2" placeholder="Player 2" value="{{ old('player2') }}">
            </div>

            <div class="form-group">
                <label for="title">Level 2</label>
                <input type="text" class="form-control" name="level2" placeholder="Level 2" value="{{ old('level2') }}">
            </div>

            <div class="form-group">
                <label for="title">Player 3</label>
                <input type="text" class="form-control" name="player3" placeholder="Player 3" value="{{ old('player3') }}">
            </div>

            <div class="form-group">
                <label for="title">Level 3</label>
                <input type="text" class="form-control" name="level3" placeholder="Level 3" value="{{ old('level3') }}">
            </div>

            <div class="form-group">
                <label for="title">Player 4</label>
                <input type="text" class="form-control" name="player4" placeholder="Player 4" value="{{ old('player4') }}">
            </div>

            <div class="form-group">
                <label for="title">Level 4</label>
                <input type="text" class="form-control" name="level4" placeholder="Level 4" value="{{ old('level4') }}">
            </div>

            <div class="form-group">
                <label for="title">Player 5</label>
                <input type="text" class="form-control" name="player5" placeholder="Player 5" value="{{ old('player5') }}">
            </div>

            <div class="form-group">
                <label for="title">Level 5</label>
                <input type="text" class="form-control" name="level5" placeholder="Level 5" value="{{ old('level5') }}">
            </div>

            <button type="submit" class="btn btn-primary btn-block">
                Simpan
            </button>
        </form>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection