@extends('backend.layouts.app')

<!--page level css -->
@section('pagecss')
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.colReorder.min.css')}}" />--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.scroller.min.css')}}" />--}}
{{--    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/dataTables.bootstrap.css')}}" />--}}

    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/jquery.dataTables.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('vendors/datatables/css/buttons.dataTables.min.css')}}" />
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

                            <div class="panel-title pull-right">
                                <div class="caption">
                                    <a href="{{route('add-member-form')}}">
                                        <button class="btn btn-success pull-right">Add Member</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="panel-body">

                            @if (Session::has('success'))
                                <div class="col-xs-12">
                                    <div class="alert alert-success alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        {!! Session::get('success') !!}</div>
                                </div>
                            @endif



                            <table class="table table-striped table-responsive" id="table1">
                                <thead>
                                <tr>

                                    <th> Name</th>
                                    {{--<th>User Name</th>--}}
                                    <th>E-mail</th>
                                    {{--<th>Type</th>--}}
                                    <th>Birthday</th>
                                    <th>phone</th>
                                    {{--<th>address</th>--}}
                                    <th>postalcode</th>
                                    <th>Total Members</th>
                                    <th>Membership Number</th>
                                    <th>Expiration Date</th>
                                    <th>Verify</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($allMember as $member)
                                    <tr>
                                        <td>{{ $member->first_name }} {{ $member->last_name }}</td>
                                        {{--<td>{{ $member->username }}</td>--}}
                                        <td>{{ $member->email }}</td>
                                        {{--                                    <td>{{ $member->type }}</td>--}}
                                        <td>{{ $member->date_of_birth }}</td>
                                        <td>{{ $member->phone }}</td>
                                        {{--<td>{{ $member->address }}</td>--}}
                                        <td>{{ $member->postalcode }}</td>
                                        <td>{{ $member->total_members }}</td>
                                        <td>{{ $member->membership_number }}</td>
                                        <td>{{ $member->expiration_date }}</td>
                                        <td>
                                            @if($member->verify == 1)

                                                <button type="button" class="btn btn-success">Verified</button>
                                            @else
                                                <a href="{{ route('send-verification', $member->id) }}" >
                                                    <button type="button" class="btn btn-info">Send Verification</button>
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            {{--<a href="{{ route('edit-user-data', $emp->id) }}" ><button type="button" class="btn btn-primary">Edit</button></a>--}}
                                            <a href="{{ route('delete-member-data', $member->id) }}" ><button type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach
                                <tfoot>
                                <tr>

                                    <th> Name</th>
                                    {{--<th>User Name</th>--}}
                                    <th>E-mail</th>
                                    {{--<th>Type</th>--}}
                                    <th>Birthday</th>
                                    <th>phone</th>
                                    {{--<th>address</th>--}}
                                    <th>postalcode</th>
                                    <th>Total Members</th>
                                    <th>Membership Number</th>
                                    <th>Expiration Date</th>
                                    <th>Verify</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
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
    {{--<script type="text/javascript" src="{{ asset('vendors/datatables/jquery.dataTables.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.tableTools.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.colReorder.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.scroller.min.js')}}"></script>--}}
    {{--<script type="text/javascript" src="{{ asset('vendors/datatables/dataTables.bootstrap.js')}}"></script>--}}

{{--    <script type="text/javascript" src="{{ asset('js/pages/jquery-1.12.4.js')}}"></script>--}}
    <script type="text/javascript" src="{{ asset('js/pages/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/dataTables.buttons.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/buttons.flash.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/jszip.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/pdfmake.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/vfs_fonts.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/buttons.html5.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/buttons.print.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('js/pages/table-advanced.js')}}"></script>
@endsection
<!-- end of page level js -->
