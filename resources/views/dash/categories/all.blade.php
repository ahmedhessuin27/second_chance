@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Bordered Table</h5>
                            <p class="mb-40">Add class <code>.table-bordered</code> in table tag for borders on all sides of the table and cells.</p>
                            <a class="btn btn-primary" href="{{ route('dashboard.categories.create') }}">Add category</a>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>sub_title</th>
                                                        <th>image</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                    @foreach ($data as $category)
                                                        
                                                        <tr>
                                                            <td>{{ $loop->index +1 }}</td>
                                                            <td>
                                                                {{ $category->name }}
                                                            </td>
                                                            <td>
                                                                {{ $category->sub_title }}
                                                            </td>
                                                            
                                                            <td>

                                                                <img width="150" height="150" src="{{ asset('uploads/category/'. $category->category_image) }}" alt="">
                                                                
                                                            </td>
                                                            <td>
                                                            <a href="{{ route('dashboard.categories.edit',$category->id)  }}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                            <form action="{{ route('dashboard.categories.destroy', $category->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" > <i class="icon-trash txt-danger"></i> </button>
                                                            </form>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
@endsection
