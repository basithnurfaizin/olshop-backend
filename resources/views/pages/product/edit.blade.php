@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Edit Barang</strong>
            <small>{{$product->name}}</small>
        </div>

        <div class="card-body card-block">
            <form action="{{route('product.update', $product->id)}}" method="post">
                @method('put')
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <input type="text" name="name" value="{{old('name') ? old('name') : $product->name}}"
                           class="form-control @error('name') is-invalid @endError" />
                    @error('name') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="text" class="form-control-label">Tipe Barang</label>
                    <input type="text" name="type" value="{{old('type') ? old('type') : $product->type}}"
                           class="form-control @error('type') is-invalid @endError" />
                    @error('type') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="descriptiom" class="form-control-label">Deskripsi Barang</label>
                    <textarea name="description"  class="form-control  @error('description') is-invalid @endError ckeditor">
                        {{old('description') ? old('description') : $product->description}}
                    </textarea>
                    @error('description') <div class="text-muted">{{$message}}</div> @enderror
                </div>


                <div class="form-group">
                    <label for="price" class="form-control-label">Harga Barang</label>
                    <input type="number" name="price" value="{{old('price') ? old('price') : $product->price}}"
                           class="form-control @error('price') is-invalid @endError" />
                    @error('price') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="quantity" class="form-control-label">Stock Barang</label>
                    <input type="number" name="quantity" value="{{old('quantity') ? old('quantity') : $product->quantity}}"
                           class="form-control @error('quantity') is-invalid @endError" />
                    @error('quantity') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Update Barang</button>
                </div>

            </form>
        </div>
    </div>
@endsection
