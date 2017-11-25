@extends('backend.layouts.app')

<!--page level css -->
@section('pagecss')
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.colReorder.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.scroller.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />
    <link href="{{ asset('css/pages/tables.css')}}" rel="stylesheet" type="text/css">
@endsection
<!--end of page level css-->

@section('content')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <section class="content-header">
            <h1>All Members</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/backend">
                        <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                        Dashboard
                    </a>
                </li>
                <li class="active">All Members</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <div class="caption">
                                    <i class="livicon"  data-size="16" data-loop="true" data-c="#fff" data-hc="white"></i>
                                    Members
                                </div>

                            </div>


                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-responsive" id="table1">
                                <thead>
                                <tr>

                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>User Name</th>
                                    <th>E-mail</th>
                                    <th>Type</th>
                                    <th>Birthday</th>
                                    <th>phone</th>
                                    {{--<th>address</th>--}}
                                    <th>postalcode</th>
                                    <th>Total Members</th>
                                    <th>Membership Number</th>
                                    <th>Expiration Date</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allMember as $member)
                                <tr>
                                    <td>{{ $member->first_name }}</td>
                                    <td>{{ $member->last_name }}</td>
                                    <td>{{ $member->username }}</td>
                                    <td>{{ $member->email }}</td>
                                    <td>{{ $member->type }}</td>
                                    <td>{{ $member->date_of_birth }}</td>
                                    <td>{{ $member->phone }}</td>
                                    {{--<td>{{ $member->address }}</td>--}}
                                    <td>{{ $member->postalcode }}</td>
                                    <td>{{ $member->total_members }}</td>
                                    <td>{{ $member->id }}</td>
                                    <td>{{ $member->expiration_date }}</td>
                                    <td>
                                        {{--<a href="{{ route('edit-user-data', $emp->id) }}" ><button type="button" class="btn btn-primary">Edit</button></a>--}}
                                        <a href="{{ route('delete-member-data', $member->id) }}" ><button type="button" class="btn btn-danger">Delete</button></a>
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
        <!-- content -->
    </aside>
@endsection
<!-- begining of page level js -->
@section('pagejs')
    <script type="text/javascript" src="{{ asset('vendors/datatables/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.tableTools.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.colReorder.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.scroller.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/table-advanced.js')}}"></script>
@endsection
<!-- end of page level js -->
