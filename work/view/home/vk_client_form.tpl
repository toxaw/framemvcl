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
        <li class="active"><a href="#">VK Клиенты</a></li>
        <li><a href="#">Цели</a></li>
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
        <h1><small>Добавление VK Клиента</small></h1>
      </div>
    </div> 
    <div class="row">
       <form class="form-horizontal" role="form">
        <div class="form-group">
          <label for="input-id" class="col-sm-2 control-label">ID (6 цифр)</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="input-id" placeholder="ID" pattern="[0-9]{6}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="input-version" class="col-sm-2 control-label">Version</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="input-version" placeholder="Version" pattern="[0-9]{1,2}(\.[0-9]{1,4})?" required>
          </div>
        </div>
        <div class="form-group">
          <label for="input-access-token" class="col-sm-2 control-label">Access token</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="input-access-token" placeholder="Access token" pattern=".{16,}" required>
          </div>
        </div>
        <div class="form-group">
          <label for="input-expires-in" class="col-sm-2 control-label">Expires in</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="input-expires-in" placeholder="Expires in" pattern=".{1,}" required>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="alert alert-danger" role="alert">Ошибка: ID Занят!</div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Изменить VK Клиента</button>
            <button type="button" class="btn btn-default" onclick="confirm('Удалить VK Клиента?') ? $('#form-delete').submit() : false;">Удалить VK Клиента</button> 
          </div>
        </div>
       </form>
       <form class="form-horizontal" id="form-delete" role="form">
          <input type="hidden" name="vk_client_id" value ="547653"/>
       </form>
    </div> 
</div>

</body>
<?php echo $footer; ?>