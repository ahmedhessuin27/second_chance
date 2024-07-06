@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Default Layout</h5>
                            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('dashboard.categories.store') }}" method="POST" enctype="multipart/form-data">
                                       @csrf

                                        <div class="form-group">
                                            <label for="categoryname">categoryname</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name" value="{{ old('name') }}" class="form-control" id="categoryname" placeholder="categoryname" type="text">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Sub_title</label>
                                            <input name="sub_title" value="{{ old('sub_title') }}" class="form-control" id="email"  type="text">
                                        </div>
                                            @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="form-group">
                                            <label for="email">Image</label>
                                            <input name="category_image" class="form-control" id="image" placeholder="image" type="file">
                                        </div>
                                            @error('category_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror


                                        <hr> 
                                        <button class="btn btn-primary" type="submit">Add</button>
                                    </form>
                                </div>
                            </div>
                        </section>

@endsection