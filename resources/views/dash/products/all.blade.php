@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Bordered Table</h5>
                            <p class="mb-40">Add class <code>.table-bordered</code> in table tag for borders on all sides of the table and cells.</p>
                            <a class="btn btn-primary" href="{{ route('dashboard.products.create') }}">Add product</a>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Name_es</th>
                                                        <th>Name_en</th>
                                                        <th>price</th>
                                                        <th>image</th>
                                                        <th>description_es</th>
                                                        <th>description_en</th>
                                                        <th>Category related</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                    @foreach ($data as $product)
                                                        
                                                        <tr>
                                                            <td>{{ $loop->index +1 }}</td>
                                                            <td>
                                                                {{ $product->name_es }}
                                                            </td>
                                                            <td>
                                                                {{ $product->name_en }}
                                                            </td>
                                                            <td>
                                                                {{ $product->price }}
                                                            </td>
                                                            
                                                            
                                                            <td>

                                                                <img width="150" height="150" src="{{ asset('uploads/product/'. $product->image) }}" alt="">
                                                                
                                                            </td>
                                                            <td>
                                                                {{ $product->description_es }}
                                                            </td>
                                                            <td>
                                                                {{ $product->description_en }}
                                                            </td>
                                                             <td>
                                                                 {{ $product->category->name }}
                                                            </td>
                                                            <td>
                                                            <a href="{{ route('dashboard.products.edit',$product->id)  }}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                            <form action="{{ route('dashboard.products.destroy', $product->id) }}" method="POST">
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
