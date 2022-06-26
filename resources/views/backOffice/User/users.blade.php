@extends("backOffice.layout.panel")

@section("style")
    <link rel="stylesheet" href="{{asset("adminPanel")}}/vendors/mdi/css/materialdesignicons.min.css">
    <style>

    </style>
@endsection


@section("content-wrapper")
    @if(\Illuminate\Support\Facades\Session::has('success'))
        <div class="alert alert-success">{{ \Illuminate\Support\Facades\Session::get('success') }}</div>
    @endif
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Users List</h4>
                            <p class="card-description">
                                <a href="{{ route("admin.users.add") }}"  class="btn btn-sm btn-outline-success">
                                    <i class="mdi mdi-plus-box"></i> <strong style="position: relative;top: -2px;font-size: 16px;">Ajouter</strong>
                                </a>
                            </p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <th>
                                            User
                                        </th>
                                        <th>
                                            Full name
                                        </th>
                                        <th>
                                            Email
                                        </th>
                                        <th>
                                            Username
                                        </th>
                                        <th>
                                            Address
                                        </th>
                                        <th>
                                            type
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td class="py-1">
                                                <img src="{{asset("uploads/managers/avatars/" . $user->picture)}}" alt="image"/>
                                            </td>
                                            <td>
                                                {{$user->full_name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td>
                                                {{$user->username}}
                                            </td>
                                            <td>
                                                {{$user->address}}
                                            </td>
                                            <td>
                                                <label for="" class="badge badge-success">$user->type</label>
                                            </td>
                                            <td>
                                                <form style="display: inline; margin-right: 10px" method="POST" action="{{ route('admin.managers.delete')}}">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="submit" class="btn badge badge-danger">delete</button>
                                                </form>
                                                <a href=""></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
                <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
            </div>
        </footer>
        <!-- partial -->
    </div>
@endsection
