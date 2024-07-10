@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Default Layout</h5>
                            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('dashboard.products.store') }}" method="POST" enctype="multipart/form-data">
                                       @csrf

                                        <div class="form-group">
                                            <label for="productname">productname</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name_es" value="{{ old('name_es') }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('name_es')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="productname">productname</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name_en" value="{{ old('name_en') }}" class="form-control" id="productname" placeholder="productname" type="text">
                                            </div>
                                            @error('name_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">price</label>
                                            <input name="price" value="{{ old('price') }}" class="form-control" id="email"  type="text">
                                        </div>
                                            @error('price')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="form-group">
                                            <label for="email">Image</label>
                                            <input name="image" class="form-control" id="image" placeholder="image" type="file">
                                        </div>
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="form-group">
                                            <label for="productname">description_es</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <textarea name="description_es" class="form-control mt-15" rows="3" placeholder="Readonly Texterea"> </textarea>
                        
                                            </div>
                                            @error('description_es')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="productname">description_en</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                               <textarea name="description_en" class="form-control mt-15" rows="3" placeholder="Readonly Texterea"> </textarea>
                                            </div>
                                            @error('description_en')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="input_tags">Category choosen</label>
                                            <select name="category_id" id="input_tags" class="form-control select2-hidden-accessible"  data-select2-id="input_tags" tabindex="-1" aria-hidden="true">
                                                <option selected>No category</option>
                                                @foreach ($allcategories as $cat )
                                                <option  value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>


                                        <hr> 
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </section>

                

@endsection