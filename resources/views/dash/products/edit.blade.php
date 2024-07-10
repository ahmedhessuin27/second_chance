@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Default Layout</h5>
                            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('dashboard.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       @method('PUT')
                                       <img width="150" height="150" src="{{ asset('uploads/product/'. $product->product_image) }}" alt="">
                                        <div class="form-group">
                                            <label for="productname">name_es</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name_es" value="{{ $product->name_es }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('name_es')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="productname">name_en</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name_en" value="{{ $product->name_en }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">sub_title</label>
                                            <input name="price" value="{{ $product->price }}" class="form-control" id="email"  type="text">
                                        </div>
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="form-group">
                                            <label for="email">product_image</label>
                                            <input name="image"  class="form-control" id="password"  type="file">
                                        </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        <div class="form-group">
                                            <label for="productname">description_en</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="description_en" value="{{ $product->description_en }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div> 
                                        <div class="form-group">
                                            <label for="productname">description_es</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="description_es" value="{{ $product->description_es }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('description_es')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>    
                                        <div class="form-group">
                                            <label for="input_tags">Category choosen</label>
                                            <select name="category_id" id="input_tags" class="form-control select2-hidden-accessible"  data-select2-id="input_tags" tabindex="-1" aria-hidden="true">
                                                <option @selected($product->category_id==null)>No category</option>
                                                @foreach ($allcategories as $cat )
                                                <option  value="{{ $cat->id }}" @selected($product->category_id==$cat->id)>{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                       

                                        

                                        <hr> 
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>

@endsection