<aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{URL::to('admin/dashboard')}}"><img src="public/admin/images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="public/admin/images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="{{URL::to('admin/dashboard')}}"> <i class="menu-icon fa fa-dashboard"></i>Dashboard</a>
                    </li>

                    <h3 class="menu-title">Category</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Category</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="{{URL::to('admin/category1/add-category')}}">Add category</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="{{URL::to('admin/category1/list-category-1')}}">Category list</a></li>
                        </ul>
                    </li>   

                    <h3 class="menu-title">Brand</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Brand</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{URL::to('admin/category2/add-category-2')}}">Add brand</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{URL::to('admin/category2/list-category-2')}}">Brand list</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Product</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Product</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{URL::to('admin/product/add-product')}}">Add product</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{URL::to('admin/product/list-product')}}">Product list</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Users</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-tasks"></i>Users</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-fort-awesome"></i><a href="{{URL::to('admin/users/add-users')}}">Add Users</a></li>
                            <li><i class="menu-icon ti-themify-logo"></i><a href="{{URL::to('admin/users/list-users')}}">Users list</a></li>
                        </ul>
                    </li>

                    <h3 class="menu-title">Extras</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Pages</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="{{URL::to('logout')}}">logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
</aside><!-- /#left-panel -->