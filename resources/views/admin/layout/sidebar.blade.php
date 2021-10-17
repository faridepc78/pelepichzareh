<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <a href="{{route('dashboard')}}" class="brand-link">
        <img src="https://s4.uupload.ir/files/laravel_9t8l.png" alt="Logo"
             class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"
              style="font-size: 16px;font-weight: bold">پنل مدیریت پله پیچ زارع</span>
    </a>

    <div class="sidebar">
        <div>

            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{auth()->user()->getProfileAttribute()}}"
                         class="img-circle elevation-2" alt="Profile">
                </div>
                <div class="info">
                    <a href="{{route('profile')}}" class="d-block">{{auth()->user()->getFullNameAttribute()}}</a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item">
                        <a target="_blank" href="{{ route('home') }}"
                           class="nav-link">
                            <i class="nav-icon fa fa-home"></i>
                            <p>
                                خانه
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}"
                           class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-dashboard"></i>
                            <p>
                                داشبورد
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('profile') }}"
                           class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}">
                            <i class="nav-icon fa fa-user"></i>
                            <p>
                                پروفایل
                            </p>
                        </a>
                    </li>

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['sliders.index',--}}
{{--'sliders.create',--}}
{{--'sliders.edit']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['sliders.index',--}}
{{--'sliders.create',--}}
{{--'sliders.edit']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-sliders"></i>--}}
{{--                            <p>--}}
{{--                                اسلایدر ها--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('sliders.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['sliders.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت اسلایدر ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('sliders.create') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('sliders.create') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد اسلایدر ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['projects.index',--}}
{{--'projects.create',--}}
{{--'projects.edit',--}}
{{--'projects.gallery.index']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['projects.index',--}}
{{--'projects.create',--}}
{{--'projects.edit',--}}
{{--'projects.gallery.index']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-tasks"></i>--}}
{{--                            <p>--}}
{{--                                پروژه ها--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('projects.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['projects.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت پروژه ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('projects.create') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('projects.create') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد پروژه ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['posts.index',--}}
{{--'posts.create',--}}
{{--'posts.edit',--}}
{{--'posts_categories.index',--}}
{{--'posts_categories.create',--}}
{{--'posts_categories.edit',--}}
{{--'posts.media.index',--}}
{{--'posts.comments.pending',--}}
{{--'posts.comments.index',--}}
{{--'posts.comments.single']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['posts.index',--}}
{{--'posts.create',--}}
{{--'posts.edit',--}}
{{--'posts_categories.index',--}}
{{--'posts_categories.create',--}}
{{--'posts_categories.edit',--}}
{{--'posts.media.index',--}}
{{--'posts.comments.pending',--}}
{{--'posts.comments.index',--}}
{{--'posts.comments.single']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-paper-plane"></i>--}}
{{--                            <p>--}}
{{--                                پست ها--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('posts_categories.index')}}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['posts_categories.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت دسته بندی ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{route('posts_categories.create')}}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['posts_categories.create']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد دسته بندی ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('posts.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['posts.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت پست ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('posts.create') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('posts.create') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد پست ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('posts.comments.pending') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['posts.comments.pending']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p style="font-size: 14px">مدیریت نظرات در حال برسی</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('posts.comments.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('posts.comments.index') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت نظرات</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['products.index',--}}
{{--'products.create',--}}
{{--'products.edit',--}}
{{--'products.comments.pending',--}}
{{--'products.comments.index',--}}
{{--'products.comments.single',--}}
{{--'product.attributes',--}}
{{--'products.gallery.index']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['products.index',--}}
{{--'products.create',--}}
{{--'products.edit',--}}
{{--'products.comments.pending',--}}
{{--'products.comments.index',--}}
{{--'products.comments.single',--}}
{{--'product.attributes',--}}
{{--'products.gallery.index']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-product-hunt"></i>--}}
{{--                            <p>--}}
{{--                                محصولات--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('products.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['products.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت محصولات</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('products.create') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('products.create') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد محصولات</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('products.comments.pending') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['products.comments.pending']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p style="font-size: 14px">مدیریت نظرات در حال برسی</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('products.comments.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('products.comments.index') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت نظرات</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['brands.index',--}}
{{--'brands.create',--}}
{{--'brands.edit']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['brands.index',--}}
{{--'brands.create',--}}
{{--'brands.edit']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-apple"></i>--}}
{{--                            <p>--}}
{{--                                برند ها--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('brands.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['brands.index']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت برند ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('brands.create') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs('brands.create') ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>ایجاد برند ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

{{--                    <li class="nav-item has-treeview {{ request()->routeIs(['contacts.index',--}}
{{--'contacts.single']) ? 'menu-open' : '' }}">--}}

{{--                        <a href="#"--}}
{{--                           class="nav-link {{ request()->routeIs(['contacts.index',--}}
{{--'contacts.single']) ? 'active' : '' }}">--}}
{{--                            <i class="nav-icon fa fa-phone"></i>--}}
{{--                            <p>--}}
{{--                                تماس ها--}}
{{--                                <i class="fa fa-angle-left right"></i>--}}
{{--                            </p>--}}
{{--                        </a>--}}

{{--                        <ul class="nav nav-treeview">--}}

{{--                            <li class="nav-item">--}}
{{--                                <a href="{{ route('contacts.index') }}"--}}
{{--                                   class="nav-link {{ request()->routeIs(['contacts.index','contacts.single']) ? 'active' : '' }}">--}}
{{--                                    <i class="fa fa-circle-o nav-icon"></i>--}}
{{--                                    <p>مدیریت تماس ها</p>--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}
{{--                    </li>--}}

                    <li class="nav-item">

                        <a href="{{route('logout')}}"
                           class="nav-link">
                            <i class="nav-icon fa fa-close"></i>
                            <p>
                                خروج
                                <i class="fa right"></i>
                            </p>
                        </a>

                    </li>

                </ul>
            </nav>

        </div>
    </div>

</aside>
