@include('back.includes.header')
@include('back.includes.sidenav')
@include('back.includes.topnav')


       

            <div class="row" style="display: inline-block;">
                <div class="tile_count">
                    @php($usercount =App\User::count())
                    @php($verifiedproduct =App\Product::where('verification','1')->count())
                    @php($unverifiedproduct =App\Product::where('verification','0')->count())
                    @php($unseenmessage =App\Message::where('status','0')->count())
                    @php($totalvisitor=App\Counter::count())
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Users</span>
                        <div class="count">{{$usercount}}</div>
                       
                    </div>
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-clock-o"></i>Verified Product</span>
                        <div class="count">{{$verifiedproduct}}</div>
                        
                    </div>
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i>Unverified Product</span>
                        <div class="count green">{{$unverifiedproduct}}</div>
                        
                    </div>
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Visitors</span>
                        <div class="count">{{$totalvisitor}}</div>
                        
                    </div>
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i>Unseen Message</span>
                        <div class="count">{{$unseenmessage}}</div>
                       
                    </div>
                    <div class="col-md-2 col-sm-4  tile_stats_count">
                        <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
                        <div class="count">7,325</div>
                        <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="dashboard_graph">
                        <div class="row x_title">
                            <div class="col-md-6">
                                <h3>Network Activities <small>Graph title sub-title</small></h3>
                            </div>
                            
                        </div>
                        <div class="col-md-9 col-sm-9 ">
                            <div id="chart_plot_01" class="demo-placeholder"></div>
                        </div>
                        
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <br />
           
   



@include('back.includes.footer')