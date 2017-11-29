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
                                    <a class="twPc-bg twPc-block"></a>

                                    <div>
                                        <div class="twPc-button">
                                            <!-- Twitter Button | you can get from: https://about.twitter.com/tr/resources/buttons#follow -->
                                            <a href="https://twitter.com/mertskaplan" class="twitter-follow-button" data-show-count="false" data-size="large" data-show-screen-name="false" data-dnt="true">Follow @mertskaplan</a>
                                            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                            <!-- Twitter Button -->
                                        </div>

                                        <a title="Mert Salih Kaplan" href="https://twitter.com/mertskaplan" class="twPc-avatarLink">
                                            <img alt="Mert Salih Kaplan" src="http://127.0.0.1:8000/profilepics/default.png" class="twPc-avatarImg">
                                        </a>

                                        <div class="twPc-divUser">
                                            <div class="twPc-divName">
                                                <a href="https://twitter.com/mertskaplan">Mert S. Kaplan</a>
                                            </div>
                                            <span>
				<a href="https://twitter.com/mertskaplan">@<span>mertskaplan</span></a>
			</span>
                                        </div>

                                        <div class="twPc-divStats">
                                            <ul class="twPc-Arrange">
                                                <li class="twPc-ArrangeSizeFit">
                                                    <a href="https://twitter.com/mertskaplan" title="9.840 Tweet">
                                                        <span class="twPc-StatLabel twPc-block">Tweets</span>
                                                        <span class="twPc-StatValue">9.840</span>
                                                    </a>
                                                </li>
                                                <li class="twPc-ArrangeSizeFit">
                                                    <a href="https://twitter.com/mertskaplan/following" title="885 Following">
                                                        <span class="twPc-StatLabel twPc-block">Following</span>
                                                        <span class="twPc-StatValue">885</span>
                                                    </a>
                                                </li>
                                                <li class="twPc-ArrangeSizeFit">
                                                    <a href="https://twitter.com/mertskaplan/followers" title="1.810 Followers">
                                                        <span class="twPc-StatLabel twPc-block">Followers</span>
                                                        <span class="twPc-StatValue">1.810</span>
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
