@extends('admin.backend')

@section('content')
    <div class="container-fluid">
        <h4>User overview</h4>
        <div class="row gap-10 masonry pos-r">
            <div class="masonry-sizer col-md-6"></div>
            <div class="masonry-item col-12">
                <!-- #Project Detail ==================== -->
                <div class="bd bgc-white">
                    <div class="peers fxw-nw@lg+ ai-s">
                        <div class="peer peer-greed w-20p@lg+ w-100@lg- p-20">
                            <div class="layers">
                                <div class="layer w-100">
                                    <h6 class="lh-1"><strong>User:</strong> {{ $user->name }}</h6>
                                </div>
                                <div class="layer w-100 mB-10">
                                    <img src="/uploads/profile_pics/{{ $user->profile_pic }}" class="w-100p" alt="">
                                </div>
                                <div class="layer w-100">
                                    <p>
                                        user was created on <br> {{ $user->created_at }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="peer bdL p-20 w-40p@lg+ w-100p@lg-">
                            <div class="layers">
                                <div class="layer w-100">
                                    <h6 class="lh-1">Details</h6>
                                </div>
                                <div class="layer w-100">
                                    <ul>
                                        <li><strong>First name:</strong> {{ $user->first_name }}</li>
                                        <li><strong>Last name:</strong> {{ $user->last_name }}</li>
                                        <li><strong>E-mail:</strong> {{ $user->email }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @if(Auth::user()->hasRole('administrator'))
                        <div class="peer bdL p-20 w-40p@lg+ w-100p@lg-">
                            <div class="layers">
                                <div class="layer w-100">
                                    <h6 class="lh-1">Administrator actions</h6>
                                </div>
                                <form id="updateUser" name="updateUser" action="{{ route('users.update', $user->id) }}" method="POST">
                                    @method('PUT')
                                    @csrf
                                <div class="layer w-100">
                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <div class="col-sm-12">User Roles</div>
                                        </div>
                                            @foreach($roles as $role)
                                                @if($user->hasRole($role->name))
                                                        <div class="col-sm-10">
                                                            <div class="form-check">
                                                                <label class="form-check-label">
                                                                    <input id="role" name="role[]" type="checkbox" value="{{$role->id}}" checked /> {{$role->name}}
                                                                </label>
                                                            </div>
                                                        </div>
                                                @else
                                                            <div class="col-sm-10">
                                                                <div class="form-check">
                                                                    <label class="form-check-label">
                                                                        <input id="role" name="role[]" type="checkbox" value="{{$role->id}}" /> {{$role->name}}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                @endif
                                            @endforeach
                                    </div>
                                </div>
                                </form>
                                <form id="deleteUser" name="deleteUser" action="{{ route('users.destroy', $user->id) }}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                </form>
                                <div class="col-md-12">
                                    <button type="submit" form="updateUser" class="btn btn-primary">Save</button>
                                    <button type="submit" form="deleteUser" class="btn btn-danger">Delete User</button>
                                </div>
                            </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="tab-content layer w-100 mB-10" style="height:350px;">
                <div class="bd bgc-white">
                    @include(
                    'projects.assets.datatable',
                        ['tablename' => 'UsersTasks',
                            'heads' => [
                            'id',
                            'title',
                            'status',
                            'actions'
                            ],
                    'element_id' => $user->id,
                        ]
                    )
                </div>
            </div>
        </div>
    </div>
@endsection

