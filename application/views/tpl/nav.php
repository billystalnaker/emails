<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo site_url('home') ?>">Company Name</a>
    </div>
    <!-- /.navbar-header -->

    <?php if ($is_logged)
    { ?>
        <ul class="nav navbar-top-links navbar-right">
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li>
                        <?php
                        $url = site_url("/module/users/edit/" . USER_ID);
                        if (USER_GROUP_ID == 2)
                        {
                            $url = site_url("/module/extras/edit/" . USER_ID);
                        }
                        ?>
                        <a href="<?php echo $url ?>"><i class="fa fa-user fa-fw"></i> User Profile</a>
                    </li>
                    <!--    		<li>
                                <a href="javascript:void(0);"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>-->
                    <li class="divider"></li>
                    <li>
                        <a class="sign-out" href="javascript:void(0);" data-alt="<?php echo site_url('account/logout'); ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="navbar-user-info">
                        <span><?php echo $user_info; ?></span>
                    </li>
                    <li class="sidebar-search">
                        <!--    		    <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                    </span>
                                </div>-->
                        <div class="input-group" style="display:none">
                            <div class="input-group-btn">
                                <button id="search_submit" type="button" class="btn btn-default" tabindex="-1">
                                    <i class="fa fa-search"></i></button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" tabindex="-1">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul id="search_choices" class="dropdown-menu" role="menu">
                                    <?php if ($this->flexi_auth->is_privileged('Users'))
                                    { ?>
                                        <li data-choice="user_accounts"><a href="javascript:void(0);">Users</a></li>
                                    <?php } ?>
                                    <?php if ($this->flexi_auth->is_privileged('Privileges'))
                                    { ?>
                                        <li data-choice="user_privileges"><a href="javascript:void(0);">Privileges</a>
                                        </li>
                                    <?php } ?>
                                    <?php if ($this->flexi_auth->is_privileged('Groups'))
                                    { ?>
                                        <li data-choice="user_groups"><a href="javascript:void(0);">Groups</a></li>
                                    <?php } ?>
                                    <?php if ($this->flexi_auth->is_privileged('Manifests'))
                                    { ?>
                                        <li data-choice="manifests"><a href="javascript:void(0);">Manifests</a></li>
                                    <?php } ?>
                                </ul>
                            </div>
                            <input id="search_params" type="text" class="form-control">
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="<?php echo site_url('home/dashboard'); ?>"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>

                    <?php if ($this->flexi_auth->is_privileged('Users'))
                    { ?>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->flexi_auth->is_privileged('Add Users'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/users/add'); ?>">Add Admin</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->flexi_auth->is_privileged('Add Extras'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/extras/add'); ?>">Add Extra</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->flexi_auth->is_privileged('View Users'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/users/view'); ?>">View</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php } ?>
                    <?php if ($this->flexi_auth->is_privileged('Groups'))
                    { ?>
                        <li>
                            <a href="#"><i class="fa fa-group fa-fw"></i> Groups<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->flexi_auth->is_privileged('Add Groups'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/groups/add'); ?>">Add</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->flexi_auth->is_privileged('View Groups'))
                                {
                                    ?>
                                    <li>
                                        <a href="<?php echo site_url('module/groups/view'); ?>">View</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php } ?>
                    <?php if ($this->flexi_auth->is_privileged('Privileges'))
                    { ?>
                        <li>
                            <a href="#"><i class="fa fa-key fa-fw"></i> Privileges<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->flexi_auth->is_privileged('Add Privileges'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/privileges/add'); ?>">Add</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->flexi_auth->is_privileged('View Privileges'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/privileges/view'); ?>">View</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php }
                    if ($this->flexi_auth->is_privileged('Manifests'))
                    { ?>
                        <li>
                            <a href="#"><i class="fa fa-envelope-o"></i> Manifests<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->flexi_auth->is_privileged('Add Manifests'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/manifests/add'); ?>">Add</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->flexi_auth->is_privileged('View Manifests'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/manifests/view'); ?>">View</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php }
                    if ($this->flexi_auth->is_privileged('States'))
                    { ?>
                        <li>
                            <a href="#"><i class="fa fa-map-marker"></i> States<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if ($this->flexi_auth->is_privileged('Add States'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/states/add'); ?>">Add</a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->flexi_auth->is_privileged('View States'))
                                { ?>
                                    <li>
                                        <a href="<?php echo site_url('module/states/view'); ?>">View</a>
                                    </li>
                                <?php } ?>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    <?php } ?>
                </ul>
                <!-- /#side-menu -->
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    <?php } ?>
</nav>