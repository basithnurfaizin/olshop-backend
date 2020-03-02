@extends('layouts.default')

@section('content')
    <div class="card">
        <div class="card-header">
            <strong>Tambah Photo Barang</strong>
        </div>

        <div class="card-body card-block">
            <form action="{{route('product-gallery.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="form-control-label">Nama Barang</label>
                    <select name="product_id" class="form-control @error('product_id') is-invalid @endError">
                        @foreach($products as $product)
                            <option value="{{$product->id}}">{{$product->name}}</option>
                        @endforeach
                    </select>
                    @error('product_id') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="photo" class="form-control-label">Photo</label>
                    <input type="file" name="photos" value="{{old('photos')}}"
                           class="form-control @error('photos') is-invalid @endError" accept="image/*" />
                    @error('photos') <div class="text-muted">{{$message}}</div> @enderror
                </div>

                <div class="form-group">
                    <label for="is_default" class="form-control-label">Jadikan Default</label>
                    <br/>
                    <label>
                        <input type="radio" name="is_default" value="1" class="form-control @error('is_default') is-invalid @endError" />
                        Ya
                    </label>
                    &nbsp;
                    <label>
                        <input type="radio" name="is_default" value="0" class="form-control @error('is_default') is-invalid @endError" />
                        Tidak
                    </label>

                </div>

                <div class="form-group">
                    <button class="btn btn-primary btn-block" type="submit">Tambah Photo Barang</button>
                </div>

            </form>
        </div>
    </div>
@endsection
