@extends('layouts.default')

@section('content')
    <div class="orders">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="box-title">Daftar Transaksi</div>
                    </div>

                    <div class="card-body">
                        <div class="table-stats order-table ov-h">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor</th>
                                    <th>Total Transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($transaction as $index => $item)
                                    <tr>
                                        <td>{{$index+1}}</td>
                                        <td>{{$item->name}}</td>
                                        <td>{{$item->email}}</td>
                                        <td>{{$item->number}}</td>
                                        <td>{{$item->transaction_total}}</td>
                                        <td>{{$item->status}}</td>
                                        <td>
                                            {{--@if($item->status == 'PENDING')
                                            <a href="{{route('product.gallery', $item->id)}}?status=SUCCESS" class="btn btn-info btn-sm">
                                                <i class="fa fa-picture-o"></i>
                                            </a>
                                            @endif--}}

                                            <a href="{{route('transaction.edit', $item->id)}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-pencil"></i>
                                            </a>

                                            <form action="{{route('transaction.destroy', $item->id)}}" method="post" class="d-inline">
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
