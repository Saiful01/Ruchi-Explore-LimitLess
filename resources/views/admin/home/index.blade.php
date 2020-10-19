@extends('layouts.app')

@section('title', 'Admin Home')


@section('content')

    <div class="wrapper wrapper-content">
{{--        <div class="row">--}}
{{--            <div class="col-lg-3">--}}
{{--                <div class="ibox ">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-success float-right">Monthly</span>--}}
{{--                        <h5>Income</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">40 886,200</h1>--}}
{{--                        <div class="stat-percent font-bold text-success">98% <i class="fa fa-bolt"></i></div>--}}
{{--                        <small>Total income</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3">--}}
{{--                <div class="ibox ">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-info float-right">Annual</span>--}}
{{--                        <h5>Orders</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">275,800</h1>--}}
{{--                        <div class="stat-percent font-bold text-info">20% <i class="fa fa-level-up"></i></div>--}}
{{--                        <small>New orders</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3">--}}
{{--                <div class="ibox ">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-primary float-right">Today</span>--}}
{{--                        <h5>visits</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">106,120</h1>--}}
{{--                        <div class="stat-percent font-bold text-navy">44% <i class="fa fa-level-up"></i></div>--}}
{{--                        <small>New visits</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-lg-3">--}}
{{--                <div class="ibox ">--}}
{{--                    <div class="ibox-title">--}}
{{--                        <span class="label label-danger float-right">Low value</span>--}}
{{--                        <h5>User activity</h5>--}}
{{--                    </div>--}}
{{--                    <div class="ibox-content">--}}
{{--                        <h1 class="no-margins">80,600</h1>--}}
{{--                        <div class="stat-percent font-bold text-danger">38% <i class="fa fa-level-down"></i></div>--}}
{{--                        <small>In first month</small>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="row">
            <div class="col-lg-3">
                <div class="widget style1 blue-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-plane fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> Total Places </span>
                            <h2 class="font-bold">{{count($place)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 navy-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-newspaper-o fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> Total Blogs </span>
                            <h2 class="font-bold">{{count($blogs)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 lazur-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-book fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> Total Forum Posts </span>
                            <h2 class="font-bold">{{count($forum)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="widget style1 yellow-bg">
                    <div class="row">
                        <div class="col-4">
                            <i class="fa fa-file-video-o fa-5x"></i>
                        </div>
                        <div class="col-8 text-right">
                            <span> Videos </span>
                            <h2 class="font-bold">{{count($video)}}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">

            <div class="col-lg-8" type="hidden">

{{--                <div class="row">--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="ibox ">--}}
{{--                            <div class="ibox-title">--}}
{{--                                <h5>User project list</h5>--}}
{{--                                <div class="ibox-tools">--}}
{{--                                    <a class="collapse-link">--}}
{{--                                        <i class="fa fa-chevron-up"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="close-link">--}}
{{--                                        <i class="fa fa-times"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ibox-content table-responsive">--}}
{{--                                <table class="table table-hover no-margins">--}}
{{--                                    <thead>--}}
{{--                                    <tr>--}}
{{--                                        <th>Status</th>--}}
{{--                                        <th>Date</th>--}}
{{--                                        <th>User</th>--}}
{{--                                        <th>Value</th>--}}
{{--                                    </tr>--}}
{{--                                    </thead>--}}
{{--                                    <tbody>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <small>Pending...</small>--}}
{{--                                        </td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 11:20pm</td>--}}
{{--                                        <td>Samantha</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 24%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><span class="label label-warning">Canceled</span></td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 10:40am</td>--}}
{{--                                        <td>Monica</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 66%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <small>Pending...</small>--}}
{{--                                        </td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 01:30pm</td>--}}
{{--                                        <td>John</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 54%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <small>Pending...</small>--}}
{{--                                        </td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 02:20pm</td>--}}
{{--                                        <td>Agnes</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 12%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <small>Pending...</small>--}}
{{--                                        </td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 09:40pm</td>--}}
{{--                                        <td>Janet</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 22%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td><span class="label label-primary">Completed</span></td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 04:10am</td>--}}
{{--                                        <td>Amelia</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 66%</td>--}}
{{--                                    </tr>--}}
{{--                                    <tr>--}}
{{--                                        <td>--}}
{{--                                            <small>Pending...</small>--}}
{{--                                        </td>--}}
{{--                                        <td><i class="fa fa-clock-o"></i> 12:08am</td>--}}
{{--                                        <td>Damian</td>--}}
{{--                                        <td class="text-navy"><i class="fa fa-level-up"></i> 23%</td>--}}
{{--                                    </tr>--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-lg-6">--}}
{{--                        <div class="ibox ">--}}
{{--                            <div class="ibox-title">--}}
{{--                                <h5>Small todo list</h5>--}}
{{--                                <div class="ibox-tools">--}}
{{--                                    <a class="collapse-link">--}}
{{--                                        <i class="fa fa-chevron-up"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="close-link">--}}
{{--                                        <i class="fa fa-times"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ibox-content">--}}
{{--                                <ul class="todo-list m-t small-list">--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>--}}
{{--                                        <span class="m-l-xs todo-completed">Buy a milk</span>--}}

{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
{{--                                        <span class="m-l-xs">Go to shop and find some products.</span>--}}

{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
{{--                                        <span class="m-l-xs">Send documents to Mike</span>--}}
{{--                                        <small class="label label-primary"><i class="fa fa-clock-o"></i> 1 mins--}}
{{--                                        </small>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
{{--                                        <span class="m-l-xs">Go to the doctor dr Smith</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-check-square"></i> </a>--}}
{{--                                        <span class="m-l-xs todo-completed">Plan vacation</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
{{--                                        <span class="m-l-xs">Create new stuff</span>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#" class="check-link"><i class="fa fa-square-o"></i> </a>--}}
{{--                                        <span class="m-l-xs">Call to Anna for dinner</span>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-lg-12">--}}
{{--                        <div class="ibox ">--}}
{{--                            <div class="ibox-title">--}}
{{--                                <h5>Transactions worldwide</h5>--}}
{{--                                <div class="ibox-tools">--}}
{{--                                    <a class="collapse-link">--}}
{{--                                        <i class="fa fa-chevron-up"></i>--}}
{{--                                    </a>--}}
{{--                                    <a class="close-link">--}}
{{--                                        <i class="fa fa-times"></i>--}}
{{--                                    </a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="ibox-content">--}}

{{--                                <div class="row">--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <table class="table table-hover margin bottom">--}}
{{--                                            <thead>--}}
{{--                                            <tr>--}}
{{--                                                <th style="width: 1%" class="text-center">No.</th>--}}
{{--                                                <th>Transaction</th>--}}
{{--                                                <th class="text-center">Date</th>--}}
{{--                                                <th class="text-center">Amount</th>--}}
{{--                                            </tr>--}}
{{--                                            </thead>--}}
{{--                                            <tbody>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">1</td>--}}
{{--                                                <td> Security doors--}}
{{--                                                </td>--}}
{{--                                                <td class="text-center small">16 Jun 2014</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-primary">$483.00</span></td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">2</td>--}}
{{--                                                <td> Wardrobes--}}
{{--                                                </td>--}}
{{--                                                <td class="text-center small">10 Jun 2014</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-primary">$327.00</span></td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">3</td>--}}
{{--                                                <td> Set of tools--}}
{{--                                                </td>--}}
{{--                                                <td class="text-center small">12 Jun 2014</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-warning">$125.00</span></td>--}}

{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">4</td>--}}
{{--                                                <td> Panoramic pictures</td>--}}
{{--                                                <td class="text-center small">22 Jun 2013</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-primary">$344.00</span></td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">5</td>--}}
{{--                                                <td>Phones</td>--}}
{{--                                                <td class="text-center small">24 Jun 2013</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-primary">$235.00</span></td>--}}
{{--                                            </tr>--}}
{{--                                            <tr>--}}
{{--                                                <td class="text-center">6</td>--}}
{{--                                                <td>Monitors</td>--}}
{{--                                                <td class="text-center small">26 Jun 2013</td>--}}
{{--                                                <td class="text-center"><span--}}
{{--                                                            class="label label-primary">$100.00</span></td>--}}
{{--                                            </tr>--}}
{{--                                            </tbody>--}}
{{--                                        </table>--}}
{{--                                    </div>--}}
{{--                                    <div class="col-lg-6">--}}
{{--                                        <div id="world-map" style="height: 300px;"></div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}

            </div>

            <div class="col-lg-4">
                <div class="ibox ">
                    <div class="ibox-content">
                        <div class="feed-activity-list">
                            @foreach($histories as $history)
                                <div class="feed-element">
                                    <div>
                                        <small class="float-right"></small>
                                        <strong>{{$history->full_name}}</strong>
                                        <div>IP Address: {{$history->ip_address}}</div>
                                        <small class="text-muted">Logged in at {{$history->created_at}}</small>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


@endsection
