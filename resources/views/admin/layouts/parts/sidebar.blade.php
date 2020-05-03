<!--
  Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

  Tip 2: you can also add an image using data-image tag
-->
<div class="logo"><a href="{{route('home')}}" class="simple-text logo-normal">
        WorkGram
    </a></div>
<div class="sidebar-wrapper">
    <ul class="nav">
        <li class="nav-item {{{ (Request::is('home') ? 'active' : '') }}} ">
            <a class="nav-link" href="{{route('home')}}">
                <i class="material-icons">dashboard</i>
                <p>Главное</p>
            </a>
        </li>
        <li class="nav-item {{{ (Request::is('users') ? 'active' : '') }}} ">
            <a class="nav-link" href="{{route('user.index')}}">
                <i class="material-icons">face</i>
                <p>Пользователи</p>
            </a>
        </li>
        <li class="nav-item {{{ (Request::is('categories') ? 'active' : '') }}}">
            <a class="nav-link" href="{{route('category.index')}}">
                <i class="material-icons">bubble_chart</i>
                <p>Категории</p>
            </a>
        </li>
        <li class="nav-item {{{ (Request::is('cities') ? 'active' : '') }}}">
            <a class="nav-link" href="{{route('city.index')}}">
                <i class="material-icons">map</i>
                <p>Города</p>
            </a>
        </li>
        <li class="nav-item {{{ (Request::is('projects') ? 'active' : '') }}}">
            <a class="nav-link" href="{{route('project.index')}}">
                <i class="material-icons">gift</i>
                <p>Проекты</p>
            </a>
        </li>
    </ul>
</div>
