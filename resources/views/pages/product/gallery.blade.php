@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Photo Barang <small>{{$product->name}}</small></div>
                    </div>

                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Photo</th>
                                    <th>Default</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($productGallery as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item->product->name}}</td>
                                        <td>
                                            <img src="#" />
                                        </td>
                                        <td>{{$item->is_default ? 'ya' : 'tidak'}}</td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm">
                                                <i class="fa fa-picture-o"></i>
                                            </a>

                                            <form action="{{route('product-gallery.destroy', $item->id)}}" method="post" class="d-inline">
                                                @method("delete")
                                                @csrf
                                                <button class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>

                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5"> Data tidak tersedia </td>
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
