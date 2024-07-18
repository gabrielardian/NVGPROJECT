@extends('layouts.admin')

@section('content')
 <!-- Begin Page Content -->
 <div class="container-fluid">

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Player</h1>
  <a href="{{ route('player.create') }}" class="btn btn-sm btn-primary shadow-sm">
    <i class="fas fa-plus fa-sm text-white-50"></i>Tambah Player
  </a>
</div>

<div class="row">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>ID Team</th>
                        <th>Player1</th>
                        <th>Level1</th>
                        <th>Nama</th>
                        <th>Discord</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                 
                   @forelse ($items as $item)
                   <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->id_team }}</td>
                        <td>{{$item->player1 }}</td>
                        <td>{{$item->level1 }}</td>
                        <td>{{$item->teams->nama }}</td>
                        <td>{{$item->teams->discord }}</td>
                        <td>
                            <a href="{{ route('player.edit', $item->id) }}" class="btn btn-info">
                                <i class="fa fa-pencil-alt"></i>
                            </a>
                            <form action="{{ route('player.destroy', $item->id) }}}" method="post" class="d-inline" id="delete-pack">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" onclick="confirmDelete(this)" type="button"><i class="fa fa-trash"></i></button>
                            </form>  
                        </td>
                    </tr>
                   @empty
                    <tr>
                        <td colspan="7" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                   @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>


</div>
<!-- /.container-fluid -->
@endsection