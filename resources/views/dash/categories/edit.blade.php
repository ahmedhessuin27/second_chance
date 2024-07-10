@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Default Layout</h5>
                            <p class="mb-25">More complex forms can be built using the grid classes. Use these for form layouts that require multiple columns, varied widths, and additional alignment options.</p>
                            <div class="row">
                                <div class="col-sm">
                                    <form action="{{ route('dashboard.categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                                       @csrf
                                       @method('PUT')
                                       <img width="150" height="150" src="{{ asset('uploads/category/'. $category->category_image) }}" alt="">
                                        <div class="form-group">
                                            <label for="categoryname">categoryname</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">@</span>
                                                </div>
                                                <input name="name" value="{{ $category->name }}" class="form-control" id="categoryname" placeholder="categoryname" type="text">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label for="email">sub_title</label>
                                            <input name="sub_title" value="{{ $category->sub_title }}" class="form-control" id="email"  type="text">
                                        </div>
                                            @error('sub_title')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                        <div class="form-group">
                                            <label for="email">category_image</label>
                                            <input name="category_image"  class="form-control" id="password"  type="file">
                                        </div>
                                            @error('category_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror

                                       

                                        

                                        <hr> 
                                        <button class="btn btn-primary" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>
                        </section>

@endsection