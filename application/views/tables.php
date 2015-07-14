<?php $this->load->view('head'); ?>

<body>
    <div>
        <!--BEGIN THEME SETTING-->
        <div id="theme-setting">
            <a href="#" data-toggle="dropdown" data-step="1" data-intro="&lt;b&gt;Many styles&lt;/b&gt; and &lt;b&gt;colors&lt;/b&gt; be created for you. Let choose one and enjoy it!" data-position="left" class="btn-theme-setting"><i class="fa fa-cog"></i></a>
            <div class="content-theme-setting">
                <select id="list-style" class="form-control">
                    <option value="style1">Flat Squared style</option>
                    <option value="style2">Flat Rounded style</option>
                    <option value="style3" selected="selected">Flat Border style</option>
                </select>
            </div>
        </div>
        <!--END THEME SETTING-->
        <!--BEGIN BACK TO TOP-->
        <a id="totop" href="#"><i class="fa fa-angle-up"></i></a>
        <!--END BACK TO TOP-->
        <!--BEGIN TOPBAR-->
        <div id="header-topbar-option-demo" class="page-header-topbar">
            <nav id="topbar" role="navigation" style="margin-bottom: 0;" data-step="3" class="navbar navbar-default navbar-static-top">
                <div class="navbar-header">
                    <button type="button" data-toggle="collapse" data-target=".sidebar-collapse" class="navbar-toggle"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
                    </button>
                    <a id="logo" href="index.html" class="navbar-brand"><span class="fa fa-rocket"></span><span class="logo-text">Pixolo</span><span style="display: none" class="logo-text-icon">µ</span></a>
                </div>
                <div class="topbar-main"><a id="menu-toggle" href="#" class="hidden-xs"><i class="fa fa-bars"></i></a>

                    <form id="topbar-search" action="" method="" class="hidden-sm hidden-xs">
                        <div class="input-icon right text-white"><a href="#"><i class="fa fa-search"></i></a>
                            <input type="text" placeholder="Search here..." class="form-control text-white" />
                        </div>
                    </form>
                    <div class="news-update-box hidden-xs"><span class="text-uppercase mrm pull-left text-white">News:</span>
                        <ul id="news-update" class="ticker list-unstyled">
                            <li>Pixol Admin Panel</li>
                            <li>Hey there, here you can update the data on to your web app</li>
                        </ul>
                    </div>
                    <ul class="nav navbar navbar-top-links navbar-right mbn">
                        <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-bell fa-fw"></i><span class="badge badge-green">3</span></a>

                        </li>
                        <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-envelope fa-fw"></i><span class="badge badge-orange">7</span></a>

                        </li>
                        <li class="dropdown"><a data-hover="dropdown" href="#" class="dropdown-toggle"><i class="fa fa-tasks fa-fw"></i><span class="badge badge-yellow">8</span></a>

                        </li>
                        <li class="dropdown topbar-user">
                            <a data-hover="dropdown" href="#" class="dropdown-toggle"><img src="images/avatar/48.jpg" alt="" class="img-responsive img-circle" />&nbsp;<span class="hidden-xs">Abhay Amin</span>&nbsp;<span class="caret"></span>
                            </a>
                            <button class="btn btn-assertive">Logout</button>
                            <ul class="dropdown-menu dropdown-user pull-right">
                                <li><a href="#"><i class="fa fa-user"></i>My Profile</a>
                                </li>
                                <li><a href="#"><i class="fa fa-calendar"></i>My Calendar</a>
                                </li>
                                <li><a href="#"><i class="fa fa-envelope"></i>My Inbox<span class="badge badge-danger">3</span></a>
                                </li>
                                <li><a href="#"><i class="fa fa-tasks"></i>My Tasks<span class="badge badge-success">7</span></a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-lock"></i>Lock Screen</a>
                                </li>
                                <li><a href="Login.html"><i class="fa fa-key"></i>Log Out</a>
                                </li>
                            </ul>
                        </li>
                        <li id="topbar-chat" class="hidden-xs"><a href="javascript:void(0)" data-step="4" data-intro="&lt;b&gt;Form chat&lt;/b&gt; keep you connecting with other coworker" data-position="left" class="btn-chat"><i class="fa fa-comments"></i><span class="badge badge-info">3</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--BEGIN MODAL CONFIG PORTLET-->
            <div id="modal-config" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" data-dismiss="modal" aria-hidden="true" class="close">
                                &times;</button>
                            <h4 class="modal-title">
                                Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed eleifend et nisl eget porta. Curabitur elementum sem molestie nisl varius, eget tempus odio molestie. Nunc vehicula sem arcu, eu pulvinar neque cursus ac. Aliquam ultricies lobortis magna et aliquam. Vestibulum egestas eu urna sed ultricies. Nullam pulvinar dolor vitae quam dictum condimentum. Integer a sodales elit, eu pulvinar leo. Nunc nec aliquam nisi, a mollis neque. Ut vel felis quis tellus hendrerit placerat. Vivamus vel nisl non magna feugiat dignissim sed ut nibh. Nulla elementum, est a pretium hendrerit, arcu risus luctus augue, mattis aliquet orci ligula eget massa. Sed ut ultricies felis.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-default">
                                Close</button>
                            <button type="button" class="btn btn-primary">
                                Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--END MODAL CONFIG PORTLET-->
        </div>
        <!--END TOPBAR-->
        <div id="wrapper">
            <!--BEGIN SIDEBAR MENU-->
            <nav id="sidebar" role="navigation" data-step="2" data-intro="Template has &lt;b&gt;many navigation styles&lt;/b&gt;" data-position="right" class="navbar-default navbar-static-side">
                <div class="sidebar-collapse menu-scroll">
                    <ul id="side-menu" class="nav">

                        <div class="clearfix"></div>
                        <li><a href="dashboard.html"><i class="fa fa-tachometer fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Dashboard</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-desktop fa-fw">
                        <div class="icon-bg bg-pink"></div>
                    </i><span class="menu-title">Table 1</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-send-o fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Table 2</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-edit fa-fw">
                        <div class="icon-bg bg-violet"></div>
                    </i><span class="menu-title">Table 3</span></a>

                        </li>
                        <li class="active"><a href="Tables.html"><i class="fa fa-th-list fa-fw">
                        <div class="icon-bg bg-blue"></div>
                    </i><span class="menu-title">Table 4</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-database fa-fw">
                        <div class="icon-bg bg-red"></div>
                    </i><span class="menu-title">Table 5</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-file-o fa-fw">
                        <div class="icon-bg bg-yellow"></div>
                    </i><span class="menu-title">Table 6</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-gift fa-fw">
                        <div class="icon-bg bg-grey"></div>
                    </i><span class="menu-title">Table 7</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-sitemap fa-fw">
                        <div class="icon-bg bg-dark"></div>
                    </i><span class="menu-title">Table 8</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-envelope-o">
                        <div class="icon-bg bg-primary"></div>
                    </i><span class="menu-title">Table 9</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-bar-chart-o fa-fw">
                        <div class="icon-bg bg-orange"></div>
                    </i><span class="menu-title">Table 10</span></a>

                        </li>
                        <li><a href="#"><i class="fa fa-slack fa-fw">
                        <div class="icon-bg bg-green"></div>
                    </i><span class="menu-title">Table 11</span></a>
                        </li>
                    </ul>
                </div>
            </nav>


            <div id="page-wrapper">
                <!--BEGIN TITLE & BREADCRUMB PAGE-->
                <div id="title-breadcrumb-option-demo" class="page-title-breadcrumb">
                    <div class="page-header pull-left">
                        <div class="page-title">
                            Tables</div>
                    </div>
                    <ol class="breadcrumb page-breadcrumb pull-right">
                        <li><i class="fa fa-home"></i>&nbsp;<a href="dashboard.html">Home</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="hidden"><a href="#">Tables</a>&nbsp;&nbsp;<i class="fa fa-angle-right"></i>&nbsp;&nbsp;</li>
                        <li class="active">Tables</li>
                    </ol>
                    <div class="clearfix">
                    </div>
                </div>
                <!--END TITLE & BREADCRUMB PAGE-->
                <!--BEGIN CONTENT-->
                <div class="page-content">
                    <div id="tab-general">
                        <div class="row mbl">
                            <div class="col-lg-12">

                                <div class="col-md-12">
                                    <div id="area-chart-spline" style="width: 100%; height: 300px; display: none;">
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-12">
                                <div class="panel panel-violet">
                                    <div class="panel-heading">Table Name</div>
                                    <div class="panel-body">
                                        <table class="table table-hover table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Column 1</th>
                                                    <th>Column 2</th>
                                                    <th>Column 2</th>
                                                    <th>Column 4</th>
                                                    <th>Column 4</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Henry</td>
                                                    <td>23</td>
                                                    <td><span class="label label-sm label-success">Approved</span>
                                                    </td>
                                                    <td><?php echo btn_edit('users/edit'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>John</td>
                                                    <td>45</td>
                                                    <td><span class="label label-sm label-info">Pending</span>
                                                    </td>
                                                    <td><?php echo btn_edit('users/edit'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>3</td>
                                                    <td>Larry</td>
                                                    <td>30</td>
                                                    <td><span class="label label-sm label-warning">Suspended</span>
                                                    </td>
                                                    <td><?php echo btn_edit('users/edit'); ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>4</td>
                                                    <td>Lahm</td>
                                                    <td>15</td>
                                                    <td><span class="label label-sm label-danger">Blocked</span>
                                                    </td>
                                                    <td><?php echo btn_edit('users/edit'); ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END CONTENT-->
                    <!--BEGIN FOOTER-->
                    <div id="footer">
                        <div class="copyright">
                            <a href="http://www.pixolo.co.in">Pixolo ADmin Panel</a>
                        </div>
                    </div>
                    <!--END FOOTER-->
                </div>
                <!--END PAGE WRAPPER-->
            </div>
        </div>
        <script src="<?php echo base_url('assets'); ?>/script/jquery-1.10.2.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery-migrate-1.2.1.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery-ui.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/bootstrap-hover-dropdown.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/html5shiv.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/respond.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.metisMenu.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.cookie.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/icheck.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/custom.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.news-ticker.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.menu.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/pace.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/holder.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/responsive-tabs.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.categories.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.pie.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.tooltip.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.resize.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.fillbetween.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.stack.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/jquery.flot.spline.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/zabuto_calendar.min.js"></script>
        <script src="<?php echo base_url('assets'); ?>/script/index.js"></script>
        <!--LOADING SCRIPTS FOR CHARTS--/>
        <script src="<?php echo base_url('assets'); ?>script/highcharts.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/data.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/drilldown.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/exporting.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/highcharts-more.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/charts-highchart-pie.js"></script>
        <script src="<?php echo base_url('assets'); ?>script/charts-highchart-more.js"></script>
        <!--CORE JAVASCRIPT-->
        <script src="<?php echo base_url('assets'); ?>script/main.js"></script>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-145464-12', 'auto');
            ga('send', 'pageview');
        </script>
</body>

</html>