<?php
$sub_menu = array();
$sub_menu["emails"] = array("Emails/Inquiry","Emails/Acentives","Emails/Referrals");

?>
<!--sidebar start-->
<aside>
  <div id="sidebar"  class="nav-collapse ">
    <!-- sidebar menu start-->
    <ul class="sidebar-menu" id="nav-accordion">
      <li class="sub-menu">
        <a href="javascript:;">
          <i class="fa fa-envelope"></i>
          <span>Email Management</span>
        </a>
        <ul class="sub" <?php var_dump(uri_string()); ?>>
          <li <?php echo uri_string() == "Emails/Arc" ? "class='active'" : ""; ?>><a href="<?php echo base_url('Emails/Arc'); ?>">Ayala Rewards Circle</a></li>
          <li <?php echo uri_string() == "Emails/Acentives" ? "class='active'" : ""; ?>><a href="<?php echo base_url('Emails/Acentives'); ?>">Acentives Discount Inquiries</a></li>
          <li <?php echo uri_string() == "Emails/Referrals" ? "class='active'" : ""; ?>><a href="<?php echo base_url('Emails/Referrals'); ?>">Refer and Earn Inquiries</a></li>
        </ul>
      </li>
      <li>
        <a <?php echo uri_string() == "Users/Manage" || strpos(uri_string(), "Users/Edit/") !== false ? "class='active'" : ""; ?> href="<?php echo base_url('Users/Manage'); ?>" >
          <i class="fa fa-users"></i>
          <span>Manage Users</span>
        </a>
      </li>
    </ul>
    <!-- sidebar menu end-->
  </div>
</aside>
<!--sidebar end-->
