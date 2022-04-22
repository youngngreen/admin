 <!-- Sidebar -->
 <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Pages Collapse Menu -->
<?php 
if($this->menus)
{
  foreach($this->menus as $mn)
  {
    $subs = $this->pq->_listforuser($_SESSION['uid'],$mn->ma);
    if($subs)
    {
?>
<li class="nav-item">
  <a class="nav-link collapsed" href="<?=$mn->lienket?>" data-toggle="collapse" data-target="#collapse<?=$mn->ma?>" aria-expanded="true" aria-controls="collapse<?=$mn->ma?>">
    <i class="fas fa-fw fa-cog"></i>
    <span><?=$mn->ten?></span>
  </a>
  <div id="collapse<?=$mn->ma?>" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <?php foreach($subs as $sb){ ?>
      <a class="collapse-item" href="<?=$sb->lienket?>"><?=$sb->ten?></a>
      <?php } ?>
    </div>
  </div>
</li>
<?php 
    }else{
      ?>
      <li class="nav-item active">
          <a class="nav-link" href="<?=$mn->lienket?>" > <i class="fas fa-fw fa-tachometer-alt"></i>
        <span><?=$mn->ten?></span></a>
    </li>
      <?php
    }
  }
}else{
?>
<li class="nav-item active">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>Bạn chưa được cấp quyền</span>
</li>
<?php } ?>

<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>

</ul>
<!-- End of Sidebar -->
