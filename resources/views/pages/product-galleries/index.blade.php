@extends('layouts.default')

@section('content')

@if($alert = Session::get('alert'))
<div class="alert alert-success">
   <p>{{$alert}}</p>
</div>
@endif

<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Daftar Gambar Produk</h4>
                </div>
                <div class="card-body--">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Produk</th>
                                    <th>Gambar</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @forelse ($items as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            {{-- manggil relasi --}}
                                            <td>{{$item->product->name}}</td>
                                            <td>
                                                <img src="{{url($item->photo)}}" alt="" />
                                            </td>
                                            <td>{{$item->is_default ? 'Ya' : 'Tidak'}}</td>

                                            <td>
                                                <form action="{{route('product-galleries.destroy',$item->id)}}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data Tidak Tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
