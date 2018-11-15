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
   <button type="button" class="btn btn-primary">Добавить цель</button>
    </div>  
    <div class="row">
      <h3>Список целей:</h3>
      <div class="well well-sm">
          <p><strong>ID: </strong><small>5244786</small></p>
          <p><strong>ФИ: </strong><small>Александр Алисов</small></p>
          <button type="button" class="btn btn-default btn-xs">Перейти на страницу</button>
          <button type="button" class="btn btn-default btn-xs">Посмотреть статистику</button>
          <button type="button" class="btn btn-default btn-xs">Выключить</button>
          <button type="button" class="btn btn-default btn-xs">Сменить VK Клиентов</button>
          <button type="button" class="btn btn-default btn-xs" onclick="confirm('Удалить цель: Александр Алисов (5244786)?') ? $('#form-delete5244786').submit() : false;">Удалить цель</button>
          <form class="form-horizontal" id="form-delete5244786" role="form" style="display:none">
          <input type="hidden" name="vk_client_id" value ="5244786"/>
       </form>
      </div>
      <div class="well well-sm">
          <p><strong>ID: </strong><small>3664563</small></p>
          <p><strong>ФИ: </strong><small>Игорь Редко</small></p>
          <button type="button" class="btn btn-default btn-xs">Перейти на страницу</button>
          <button type="button" class="btn btn-default btn-xs">Посмотреть статистику</button>
          <button type="button" class="btn btn-primary btn-xs">Включить</button>
          <button type="button" class="btn btn-default btn-xs">Сменить VK Клиентов</button>
          <button type="button" class="btn btn-default btn-xs" onclick="confirm('Удалить цель: Игорь Редко (3664563)?') ? $('#form-delete3664563').submit() : false;">Удалить цель</button>
          <form class="form-horizontal" id="form-delete3664563" role="form" style="display:none">
          <input type="hidden" name="vk_client_id" value ="3664563"/>
       </form>
      </div>
    </div> 
</div>

</body>
<?php echo $footer; ?>