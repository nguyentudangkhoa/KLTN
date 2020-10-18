<div class="ban-top">
    <div class="container">

        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active">
                                <a class="nav-stylehead" href="{{ route('index') }}">Trang chủ
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            @foreach ($option_kitchen as $type_group)
                                <li class="dropdown">
                                <a href="#" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button"
                                    aria-haspopup="true" aria-expanded="false">{{ $type_group->name }}
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        @foreach($type_group->Product_Type->chunk(8) as $kitchen_items)
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                @foreach ($kitchen_items as $kitchen)
                                                <li>
                                                    <a
                                                        href="{{ route('product','product_type='.$kitchen->name) }}">{{ $kitchen->name }}</a>
                                                </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            @endforeach


                            <li class="">
                                <a class="nav-stylehead" href="{{ route('about') }}">Về chúng tôi</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="{{ route('faqs') }}">Câu hỏi thường gặp</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="{{ route('privacy') }}">Chính sách</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href="{{ route('contact') }}">Liên hệ</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
