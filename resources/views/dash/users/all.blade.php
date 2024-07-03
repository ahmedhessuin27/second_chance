@extends('custom_layout.dash.app')

@section('content')

<section class="hk-sec-wrapper">
                            <h5 class="hk-sec-title">Bordered Table</h5>
                            <p class="mb-40">Add class <code>.table-bordered</code> in table tag for borders on all sides of the table and cells.</p>
                            <a class="btn btn-primary" href="{{ route('dashboard.users.create') }}">Add User</a>
                            <div class="row">
                                <div class="col-sm">
                                    <div class="table-wrap">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-bordered mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>id</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Role</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                        
                                                    @foreach ($data as $user)
                                                        
                                                        <tr>
                                                            <td>{{ $loop->index +1 }}</td>
                                                            <td>
                                                                {{ $user->name }}
                                                            </td>
                                                            <td>
                                                                {{ $user->email }}
                                                            </td>
                                                            
                                                            <td>

                                                               @if ($user->hasRole(['user','admin','super_admin']))

                                                                    @foreach ($user->roles as $role)
                                                                        {{ $role->display_name }}
                                                                    @endforeach
                                                                @else
                                                                {{ $user->role }}
                                                                @endif
                                                            </td>
                                                            <td>
                                                            <a href="{{ route('dashboard.users.edit',$user->id)  }}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                                            <form action="{{ route('dashboard.users.destroy', $user->id) }}" method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="btn btn-danger" > <i class="icon-trash txt-danger"></i> </button>
                                                            </form>
                                                        </td>
                                                        </tr>
                                                    @endforeach
                                                   
                                                </tbody>
                                            </table>
                                            {{ $data->links('pagination::bootstrap-4') }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
@endsection
