<div class="menubar col-md-12" id="menubar">
    <div class="row">
        <div class="menu-header col-md-12">
            <div class="row">
                <div id="info-header" class="container">
                    {{ Html::image('images/header/header.png','') }}
                </div>
                <div class="menu-info">
                    <div class="nav on-desktop visible-md-block visible-lg-block">
                        <div id="nav" class="menu-bar">
                            <div class="container">
                                <div class="brand">
                                    <a href="#">
                                        {{ Html::image('images/logo/smartlinks-logo.png','',array('class'=>'logo')) }}
                                    </a>
                                </div>
                                <div class="menu-right">
                                    <ul>
                                        <li><a href="{{URL::to('/')}}">Trang Chủ</a></li>
                                        <li><a href="#">Giới Thiệu</a></li>
                                        <li><a href="#">Liên Hệ</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="gift" class="col-md-12">
                            <div class="container">
                                <div class="col-md-4">
                                    <div class="one-item border1">
                                        <div class="icon-item bg-item1"></div>
                                        <div class="content-item">
                                            <header>
                                                <h5 class="entry-title">Google Partner</h5>
                                            </header>
                                            <div class="description-item">
                                                Smartlinks là đối tác trực tiếp từ Google Partner
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="one-item border1">
                                        <div class="icon-item bg-item1"></div>
                                        <div class="content-item">
                                            <header>
                                                <h5 class="entry-title">Google Partner</h5>
                                            </header>
                                            <div class="description-item">
                                                Smartlinks là đối tác trực tiếp từ Google Partner
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="one-item border1">
                                        <div class="icon-item bg-item1"></div>
                                        <div class="content-item">
                                            <header>
                                                <h5 class="entry-title">Google Partner</h5>
                                            </header>
                                            <div class="description-item">
                                                Smartlinks là đối tác trực tiếp từ Google Partner
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav on-mobile navbar-fixed-top visible-xs-block visible-sm-block">
                        <ul>
                            <li><a href="#menu" class="fa fa-2x fa-bars"></a></li>
                            <li><a href="#" class="fa fa-2x fa-home"></a></li>
                            <li><a href="#" class="fa fa-2x fa-home">Liên Hệ</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<nav id="menu">
    <ul>
        <li>{{ Html::image('images/logo/smartlinks-logo.png','',array('class'=>'logo')) }}</li>
        <li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nam</a></li>
        <li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nữ</a></li>
        <li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nam</a></li>
        <li><a href="{{URL::to('/danh-muc/quan-ao-nam')}}">Quần áo nam</a></li>
    </ul>
</nav>