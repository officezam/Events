@extends('backend.layouts.app')
<!--page level css -->
@section('pagecss')
    <!-- daterange picker -->
    <link href="{{ asset('css/membershipcard.css') }}" rel="stylesheet" />

    <!--end of page level css-->
@endsection
<!--end of page level css-->

@section('content')
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="right-side">
        <section class="content-header">
            <h1>Member ship Card</h1>
            <ol class="breadcrumb">
                <li>
                    <a href="/">
                        <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                        Dashboard
                    </a>
                </li>
                <li>Members</li>
                <li class="active">Membership card</li>
            </ol>
        </section>
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Member Form</h3>
                            <span class="pull-right">
                                <i class="fa fa-fw fa-chevron-up clickable"></i>
                                <i class="fa fa-fw fa-times removepanel clickable"></i>
                            </span>
                        </div>
                        <div class="panel-body">
                            <div class="row">

                                <div class="twPc-div">
                                    <a class="twPc-bg twPc-block">
                                        <img alt="{{ $member->first_name.' '.$member->last_name }}" src="{{ asset('img/membercard_logo.PNG') }}" class="twPc-avatarlogo" >
                                    </a>

                                    <div>
                                        <a title="Mert Salih Kaplan" href="#" class="twPc-avatarLink">
                                            <img alt="{{ $member->first_name.' '.$member->last_name }}" src="{{ asset('profilepics/'.$member->profile_image) }}" class="twPc-avatarImg">
                                        </a>
                                        <div class="twPc-divUser">
                                            <div class="twPc-divName">
                                                <a href="#">{{ $member->first_name.' '.$member->last_name }}</a>
                                            </div>
                                            {{--<span>--}}
                                                    {{--<a href="#">@<span>mertskaplan</span></a>--}}
                                                {{--</span>--}}
                                        </div>

                                        <div class="twPc-divStats">
                                            <ul class="twPc-Arrange">
                                                <li class="twPc-ArrangeSizeFit">
                                                    <a href="#" title="Bar Code">
                                                        <span class="twPc-StatLabel twPc-block">
                                                            Membership #
                                                                {{ $member->membership_number }}
                                                        </span>

                                                        <span class="twPc-StatValue">
                                                        <?php 		echo '<img src="data:image/png;base64,'.$barCode.'" alt="barcode"   />'; ?>
                                                        </span>
                                                    </a>
                                                </li>
                                                <li class="twPc-ArrangeSizeFit">
                                                    {{--<a href="#" title="Membership Number">--}}
                                                        {{--<span class="twPc-StatLabel twPc-block">Valid From</span>--}}
                                                        {{--<span class="twPc-StatValue">{{ $member->created_at }}</span>--}}
                                                    {{--</a>--}}
                                                    <a href="#" title="Membership Number">
                                                        <span class="twPc-StatLabel twPc-block">Valid To</span>
                                                        <span class="twPc-StatValue">{{ $member->expiration_date }}</span>
                                                    </a>
                                                </li>
                                                <li class="twPc-ArrangeSizeFit">
                                                    <a href="#" title="1.810 Followers">
                                                        <span class="twPc-StatLabel twPc-block">Date of birth</span>
                                                        <span class="twPc-StatValue">{{ $member->date_of_birth }}</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- code end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--row end-->
        </section>
    </aside>
@endsection
<!-- begining of page level js -->
@section('pagejs')



@endsection
<!-- end of page level js -->
