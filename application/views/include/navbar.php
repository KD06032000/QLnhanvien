<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
        <i class="fas fa-laugh-wink"></i>
    </div>
    <div class="sidebar-brand-text mx-3">QUẢN LÝ NHÂN VIÊN</div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="<?php echo base_url('default_controller')?>">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Nhân Viên</span></a>
</li>


<li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('index.php/timekeeping')?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Chấm Công</span></a>
</li>
<li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('index.php/salary')?>">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Lương</span></a>
</li>

</ul>