<div class="l-sidebar">
            <div class="logo">
                <a href="{{ route('dashboard.welcome') }}">
                شبكة Nour.Net
                </a>
            </div>
            <div class="l-sidebar__content">
                <nav class="c-menu js-menu">
                    <ul class="u-list">
                        <li class="c-menu__item active" >
                            <a href="{{ route('dashboard.welcome') }}">
                                <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/dashboard.svg') }}" alt="Dashboard">
                                <div class="c-menu-item__title"><span> لوحة التحكم </span></div>
                            </a>
                        </li>

                        @if (auth()->user()->hasPermission('read_categories'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.categories.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/backend.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span> الاقسام الرئسية   </span></div>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if (auth()->user()->hasPermission('read_categories'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.categories.index') }}?sub_categories">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/backend.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span> الاقسام الفرعية   </span></div>
                                </a>
                            </div>
                        </li>
                        @endif


                        @if (auth()->user()->hasPermission('read_subscriptions'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.subscriptions.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/subscription.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span>  الاشتركات    </span></div>
                                </a>
                            </div>
                        </li>
                        @endif

                        @if (auth()->user()->hasPermission('read_cards'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.pos.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/pay.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span> نقاط البيع     </span></div>
                                </a>
                            </div>
                        </li>
                        @endif
                        

                        <!-- @if (auth()->user()->hasPermission('read_orders'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.orders.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/i_support_center.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span>  الطلبات   </span></div>
                                </a>
                            </div>
                        </li>
                        @endif -->

                         @if (auth()->user()->hasPermission('read_roles'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.roles.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/security.svg') }}" alt="Financial System">
                                    <div class="c-menu-item__title"><span> الصلاحيات  </span></div>
                                </a>
                            </div>
                        </li>
                        @endif


                   @if (auth()->user()->hasPermission('read_users'))
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="{{ route('dashboard.users.index') }}">
                                    <img src="{{ asset('dashboard_files/img/icons/sidbar_icons/customer.svg') }}" alt="Map">
                                    <div class="c-menu-item__title"><span> المستخدمين </span></div>
                                </a>
                            </div>
                        </li>
                @endif

    
                        <li class="c-menu__item has-submenu">
                            <div class="c-menu__item__inner">
                                <a href="auction.php">
                                    <img src="{{ asset('dashboard_files/img/icons/logout.svg') }}" alt="Auction">
                                    <div class="c-menu-item__title"><span> تسجيل الخروج </span></div>
                                </a>
                            </div>
                        </li>

                       
                    </ul>
                </nav>
            </div>
            
        </div>