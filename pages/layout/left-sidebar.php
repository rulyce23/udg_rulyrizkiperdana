<?php 

  function isActive($menu, $mode="full"){
    global $active_menu;
    if ($mode == "partial")
      echo ($active_menu == $menu? "active": "");
    else
      echo ($active_menu == $menu? "class='active'": "");
  }
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>
          <?php
  $username = $_SESSION["username"];
  echo $username;
?>

</p>
          <a href="pages/dashboard"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php isActive("dashboard") ?>>
              <a href="../../pages/dashboard"><i class="fa fa-circle-o"></i> Dashboard</a>
            </li>
          </ul>
        </li>

      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i> <span>Manage</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li <?php isActive("users") ?>>
              <a href="../../pages/manage/user.php"><i class="fa fa-circle-o"></i> User </a>
            </li>
            <li <?php isActive("product") ?>>
              <a href="../../pages/manage/product.php"><i class="fa fa-circle-o"></i> Product </a>
            </li>
            <li <?php isActive("jenis") ?>>
              <a href="../../pages/manage/category.php"><i class="fa fa-circle-o"></i> Category </a>
            </li>
        
          </ul>
        </li>

    </section>
    <!-- /.sidebar -->
  </aside>
<script>
  var parent = $("ul.sidebar-menu li.active").closest("ul").closest("li");
  if (parent[0] != undefined)
    $(parent[0]).addClass("active");
</script>