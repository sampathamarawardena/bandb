<!DOCTYPE html>
<html>
<head>
    <?php include ('importFiles.php');?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include ('menuitems.php') ?>
    <aside class="main-sidebar">
        <section class="sidebar">
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>
                <li class="active treeview">
                    <a href="index.php"> <i class="fa fa-dashboard"></i> <span>Home</span></a>
                </li>
                <li class="treeview">
                    <a href="addNew.php"> <i class="fa fa-download"></i><span>Add New</span></a>
                </li>
<!--                <li>
                    <a href="accountSummery.php"><i class="fa fa-bank"></i> <span>Account Summery</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-aqua">17</small>
                        </span>
                    </a>
                </li>-->
                <li>
                    <a href="rentItems.php"><i class="fa fa-trophy"></i> <span>Rent items</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                        </span>
                    </a>
                </li>
                <li>
                    <a href="bookings.php"><i class="fa fa-flag-checkered"></i> <span>Bookings</span>
                        <span class="pull-right-container">
                                <small class="label pull-right bg-red">3</small>
                        </span>
                    </a>
                </li>
<!--                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-unlock"></i> <span> Admin Options </span><span class="pull-right-container"><i class="fa fa-angle-down pull-right"></i></span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href=""><i class="fa fa-circle-o"></i> User Management</a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i> All Bookings </a></li>
                        <li><a href=""><i class="fa fa-circle-o"></i> Reports </a></li>
                    </ul>
                </li>-->
            </ul>
        </section>
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    </div>
    <?php include ('scriptimports.php');?>
</div>
</body>
</html>