<header class="l-header">
            <div class="l-header__inner clearfix">
                <div class="c-header-icon js-hamburger">
                    <div class="btn-toggle">
                    <span class="bar-top"></span>
                    <span class="bar-mid"></span>
                    <span class="bar-bot"></span>
                    </div>
                </div>


                <div class="serach-div">
                    <form> <input class="form-control mr-sm-2 search " type="search" id="show-search" placeholder=" ابحث بواسطة اسم السيارة او اسم المستخدم " type="text"/></form>
                    <img src="{{ asset('dashboard_files/img/icons/search.svg')}}" class="search-icon" alt="search icon">
                    <div class="search-result" id="search-res">
                        <ul>
                            <li>
                                <a href="#" class="">
                                    <img src="{{ asset('dashboard_files/img/profile_images/img_03.jpg')}}">
                                    <p> <b> وســام الجمــال </b> هناك حقيقة مثبته منذ زمن..  <span> المستخدمين </span></p>
                                </a>
                            </li>
                            <li>
                                <a href="#" class="">
                                    <img src="{{ asset('dashboard_files/img/profile_images/img_03.jpg')}}">
                                    <p> <b> آدم محمـود </b> هناك حقيقة مثبته منذ زمن..  <span> السيارات </span></p>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>


                <div class="noti-logout-ul ml-auto">
                    <ul >
                        <li class="list-inline-item notifications-dropdown">
                            <button class="btn" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                                <img src="{{ asset('dashboard_files/img/icons/notifications.svg')}}" class="" alt="notifications">
                                <span class="noti-no"> 5 </span>
                            </button>
                            <!-- notifications -->
			                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <!-- 1 -->
                                <div class="notifi-list">
                                    <div class="notification-profile-img">
                                        <img src="{{ asset('dashboard_files/img/profile_images/img_02.jpg')}}" alt="">
                                    </div>
                                    <div class="notification-info-p">
                                        <a href="#">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. 
                                            <br>
                                            <small>10 minutes ago</small>
                                        </a>
                                    </div>
                                </div>
                                <div class="notifi-list">
                                    <div class="notification-profile-img">
                                        <img src="img/profile_images/img_04.jpg" alt="">
                                    </div>
                                    <div class="notification-info-p">
                                        <a href="#">
                                            Lorem ipsum dolor sit amet, consetetur sadipscing elitr. 
                                            <br>
                                            <small>10 minutes ago</small>
                                        </a>
                                    </div>
                                </div>
			                </div>
                        </li>
                        <li class="list-inline-item">
                            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> 
                                <img src="{{ asset('dashboard_files/img/icons/logout.svg')}}" class="" alt="Logout">
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                            </a>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </header>