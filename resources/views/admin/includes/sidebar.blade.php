@php $routeName = request()->route()->getName(); @endphp
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">

        <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{route('admin')}}" class="nav-link @if(request()->url() == route('admin')) active @endif">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Головна
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.menu.menuwidget.index')}}" class="nav-link @if(($routeName == 'admin.menu.menuwidget.index')
                          or($routeName == 'admin.menu.menuwidget.create')
                          or($routeName == 'admin.menu.menuwidget.store')
                          or($routeName == 'admin.menu.menuwidget.show')
                          or($routeName == 'admin.menu.menuwidget.edit')
                          or($routeName == 'admin.menu.menuwidget.update')
                          or($routeName == 'admin.menu.menuwidget.delete')
                          or($routeName == 'admin.menu.menuitem.index')
                          or($routeName == 'admin.menu.menuitem.create')
                          or($routeName == 'admin.menu.menuitem.binding')
                          or($routeName == 'admin.menu.menuitem.store')
                          or($routeName == 'admin.menu.menuitem.show')
                          or($routeName == 'admin.menu.menuitem.edit')
                          or($routeName == 'admin.menu.menuitem.update')
                          or($routeName == 'admin.menu.menuitem.delete')
                          or($routeName == 'admin.menu.submenuitem.index')
                          or($routeName == 'admin.menu.submenuitem.create')
                          or($routeName == 'admin.menu.submenuitem.binding')
                          or($routeName == 'admin.menu.submenuitem.store')
                          or($routeName == 'admin.menu.submenuitem.show')
                          or($routeName == 'admin.menu.submenuitem.edit')
                          or($routeName == 'admin.menu.submenuitem.visible')
                          )
                    active @endif">
                    <i class="nav-icon fa-solid fa-bars"></i>
                    <p>
                        Меню
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.page.index')}}" class="nav-link
                   @if(($routeName == 'admin.page.index')
                    or($routeName == 'admin.page.create')
                    or($routeName == 'admin.page.edit')
                    or($routeName == 'admin.page.update')
                    or($routeName == 'admin.page.show'))
                    active @endif">
                    <i class="nav-icon fa-regular fa-file-lines"></i>
                      <p>
                          Сторінки
                      </p>
                </a>
             </li>

            <li class="nav-item">
                <a href="#" class="nav-link
                 @if(($routeName == 'admin.blog.post.index')
                  or ($routeName == 'admin.blog.post.create')
                  or ($routeName == 'admin.blog.post.edit')
                  or ($routeName == 'admin.blog.post.show')
                  or ($routeName == 'admin.blog.post.update')
                  or ($routeName == 'admin.blog.category.index')
                  or ($routeName == 'admin.blog.category.create')
                  or ($routeName == 'admin.blog.category.edit')
                  or ($routeName == 'admin.blog.category.show')
                  or ($routeName == 'admin.blog.tag.index')
                  or ($routeName == 'admin.blog.tag.create')
                  or ($routeName == 'admin.blog.tag.edit')
                  or ($routeName == 'admin.blog.tag.show'))
                   active @endif">
                    <i class="nav-icon fa-brands fa-blogger"></i>
                    <p>
                        Блог
                        <i class="fas fa-angle-left right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                    <li class="nav-item">
                        <a href="{{route('admin.blog.post.index')}}" class="nav-link
                         @if(($routeName == 'admin.blog.post.index')
                          or($routeName == 'admin.blog.post.create')
                          or($routeName == 'admin.blog.post.edit')
                          or($routeName == 'admin.blog.post.update')
                          or($routeName == 'admin.blog.post.show'))
                          active @endif">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Пости
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.blog.category.index')}}" class="nav-link
                         @if(($routeName == 'admin.blog.category.index')
                          or($routeName == 'admin.blog.category.create')
                          or($routeName == 'admin.blog.category.edit')
                          or($routeName == 'admin.blog.category.update')
                          or($routeName == 'admin.blog.category.show'))
                          active @endif">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Категорії
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.blog.tag.index')}}" class="nav-link
                         @if(($routeName == 'admin.blog.tag.index')
                          or($routeName == 'admin.blog.tag.create')
                          or($routeName == 'admin.blog.tag.edit')
                          or($routeName == 'admin.blog.tag.update')
                          or($routeName == 'admin.blog.tag.show'))
                          active @endif">
                            <i class="nav-icon far fa-circle"></i>
                            <p>
                                Теги
                            </p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.user.index')}}" class="nav-link @if(request()->url() == route('admin.user.index')) active @endif">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Юзери
                    </p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{route('admin.contacts.index')}}" class="nav-link
                         @if(($routeName == 'admin.contacts.index')
                          or($routeName == 'admin.contacts.show'))
                    active @endif">
                    <i class="nav-icon far fa-envelope"></i>
                    <p>
                        Контакти
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.snippets.index')}}" class="nav-link
                 @if(($routeName == 'admin.snippets.index')
                  or ($routeName == 'admin.snippets.create')
                  or ($routeName == 'admin.snippets.edit')
                  or ($routeName == 'admin.snippets.show'))
                   active @endif">
                    <i class="nav-icon fa-solid fa-code"></i>
                    <p>
                        Сніппети
                    </p>
                </a>
            </li>

        </ul>

    </div>
    <!-- /.sidebar -->
</aside>
