</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-teal elevation-4 sidebar-no-expand bg-dark-teal">
    <!-- Brand Logo -->
    <a href="<?php echo base_url ?>login" class="brand-link bg-transparent text-sm border-info shadow-sm bg-teal">
        <img src="<?php echo validate_image($_settings->info('logo'))?>" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black" style="width: 1.8rem;height: 1.8rem;max-height: unset;object-fit:scale-down;object-position:center center">
        <span class="brand-text font-weight-light"><?php echo $_settings->info('short_name') ?></span>
    </a>
    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
        <div class="os-padding">
            <div class="os-content">
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                    <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=home"  class="nav-link nav-home">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=patients" class="nav-link nav-patients">
                                <i class="nav-icon fas fa-user-injured"></i>
                                <p>Patient List</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=doctors" class="nav-link nav-doctors">
                                <i class="nav-icon fas fa-user-nurse"></i>
                                <p>Doctor List</p>
                            </a>
                        </li>

                        <!-- Link to Medical History Search -->
                        <li class="nav-item">
                            <a href="<?php echo base_url ?>login/?page=medical_history" class="nav-link nav-medical_history">
                                <i class="nav-icon fas fa-search"></i>
                        
                                <p>Search Medical History</p>
                            </a>
                             </li>
                        <li class="nav-item dropdown">
    <a href="<?php echo base_url ?>login/?page=patients" class="nav-link nav-patients">
        <i class="nav-icon fas fa-user-injured"></i>
        <p>
            Patient List
        </p>
    </a>
</li>
<li class="nav-item dropdown">
    <a href="<?php echo base_url ?>login/?page=equipment_status" class="nav-link nav-equipment-status">
        <i class="nav-icon fas fa-tools"></i> <!-- You can change the icon as needed -->
        <p>
            Equipment Status
        </p>
    </a>
</li>

<?php 
$userId = null; // Initialize the user ID variable

if(isset($_GET['id']) && $_GET['id'] > 0){
    $user = $conn->query("SELECT * FROM users WHERE id ='{$_GET['id']}'");
    if ($user && $user->num_rows > 0) {
        $meta = $user->fetch_assoc(); // Fetch associative array
        $userId = $meta['id']; // Get the user ID
    }
}
?>

<li class="nav-item dropdown">
    <a href="<?php echo base_url ?>login/?page=user/manage_user&id=<?php echo $userId; ?>" class="nav-link nav-equipment-status">
        <i class="nav-icon fas fa-tools"></i> <!-- You can change the icon as needed -->
        <p>
            User Profile
        </p>
    </a>
</li>
                        <?php if ($_settings->userdata('type') == 1): ?>
                        <li class="nav-header">Maintenance</li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=room_types" class="nav-link nav-room_types">
                                <i class="nav-icon fas fa-th-list"></i>
                                <p>Room Types List</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=rooms" class="nav-link nav-rooms">
                                <i class="nav-icon fas fa-door-open"></i>
                                <p>Room List</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=user/list" class="nav-link nav-user_list">
                                <i class="nav-icon fas fa-users-cog"></i>
                                <p>User List</p>
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a href="<?php echo base_url ?>login/?page=system_info" class="nav-link nav-system_info">
                                <i class="nav-icon fas fa-cogs"></i>
                                <p>Settings</p>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
        </div>
    </div>
    <!-- /.sidebar -->
</aside>

      </aside>
      <script>
        var page;
    $(document).ready(function(){
      page = '<?php echo isset($_GET['page']) ? $_GET['page'] : 'home' ?>';
      page = page.replace(/\//gi,'_');

      if($('.nav-link.nav-'+page).length > 0){
             $('.nav-link.nav-'+page).addClass('active')
        if($('.nav-link.nav-'+page).hasClass('tree-item') == true){
            $('.nav-link.nav-'+page).closest('.nav-treeview').siblings('a').addClass('active')
          $('.nav-link.nav-'+page).closest('.nav-treeview').parent().addClass('menu-open')
        }
        if($('.nav-link.nav-'+page).hasClass('nav-is-tree') == true){
          $('.nav-link.nav-'+page).parent().addClass('menu-open')
        }

      }
      
		$('#receive-nav').click(function(){
      $('#uni_modal').on('shown.bs.modal',function(){
        $('#find-transaction [name="tracking_code"]').focus();
      })
			uni_modal("Enter Tracking Number","transaction/find_transaction.php");
		})
    })
  </script>
