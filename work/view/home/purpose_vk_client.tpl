<?php echo $header; ?>
<!--h1>Default Page!</h1-->
<style>
.tab15
{
  padding-left: 15px;
}
</style>
<body>
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
      <div class="navbar-brand" style="cursor:default">VK Friends <strong style="color:white">toxaw</strong></div>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      	<li><a href="#">Общая статистика</a></li>
        <li><a href="#">VK Клиенты</a></li>
        <li class="active"><a href="#">Цели</a></li>
        <li class="dropdown">
      </ul> 
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Админ панель</a></li>
        <li><a href="#">Выйти</a></li>
        </ul>    
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>


<div class="container">
    <div class="row">
       <div class="page-header">
        <h1><small>Изменение VK Клиентов:</small></h1>
      </div>
    </div> 
    <div class="row">
       <form class="form-horizontal" role="form">
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
           <h3 style="color:#7474d2">Алина Усманова <small>(ID:62457231)</small></h3>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <h4>Выберите VK Клиентов:</h4>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check-63462">
                <label class="form-check-label" for="check-63462"><h4><small>(331709) Алиар Микогу</small></h4></label>
              </div>
              <div class="form-check">
                <input type="checkbox" class="form-check-input" id="check-63462">
                <label class="form-check-label" for="check-63462"><h4><small>(873461) Адександр Лименко</small></h4></label>
              </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Изменить VK Клиентов</button>
          </div>
        </div>
       </form>      
    </div> 
</div>

</body>
<?php echo $footer; ?>