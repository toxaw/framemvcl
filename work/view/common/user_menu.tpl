 <nav class="navbar navbar-inverse navbar-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <div class="navbar-brand" style="cursor:default"><?php echo $text_logo; ?> <strong style="color:white"><?php echo $text_login; ?></strong></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li class="<?php echo $link_active==$link_common_statistic?'active':''; ?>" ><a href="<?php echo $link_common_statistic; ?>"><?php echo $button_common_statistic; ?></a></li>
        <li class="<?php echo $link_active==$link_vk_client?'active':''; ?>" ><a href="<?php echo $link_vk_client ?>"><?php echo $button_vk_client; ?></a></li>
        <li class="<?php echo $link_active==$link_purpose?'active':''; ?>" ><a href="<?php echo $link_purpose; ?>"><?php echo $button_purpose; ?></a></li>
        <li class="dropdown">
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <?php if(isset($link_admin_panel)): ?>
          <li class="<?php echo $link_active==$link_admin_panel?'active':''; ?>" ><a href="<?php echo $link_admin_panel; ?>"><?php echo $button_admin_panel; ?></a></li>
        <?php endif; ?>
        <li class="<?php echo $link_active==$link_logout?'active':''; ?>" ><a href="<?php echo $link_logout; ?>"><?php echo $button_logout; ?></a></li>
        </ul>    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>