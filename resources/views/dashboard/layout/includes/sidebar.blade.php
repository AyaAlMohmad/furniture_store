<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="mdi mdi-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        {{-- <div class="text-center">
            <a href="index.html" class="logo"><img src="{{ asset('dashboard/assets/images/logo.png') }}" height="20"
                    alt="logo"></a>
        </div> --}}
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li class="{{ Request::route()->getName() == 'dash.index' ? 'active' : '' }}">
                    <a href="{{ route('dash.index') }}" class="waves-effect">

                        <i class="dripicons-home"></i>
                        <span> {{ __('dashboard.Dashboard') }} </span>
                    </a>
                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fas fa-couch "></i> <span>
                            {{ __('dashboard.product') }}
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyl">

                        <li class=" {{ Request::route()->getName() == 'categories.index' ? 'active' : '' }}">

                            <a href="{{ route('categories.index') }}"><i class="typcn typcn-flow-merge "></i>
                                <span> {{ __('dashboard.category') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'sub_categories.index' ? 'active' : '' }}">

                            <a href="{{ route('sub_categories.index') }}"><i class="typcn typcn-th-list-outline "></i>
                                <span> {{ __('dashboard.SubCategory') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'products.index' ? 'active' : '' }}">

                            <a href="{{ route('products.index') }}"><i class="fas fa-couch "></i>
                                <span> {{ __('dashboard.product') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'orders.index' ? 'active' : '' }}">

                            <a href="{{ route('orders.index') }}"><i class="mdi mdi-cart-arrow-right mdi-24px"></i>
                                <span> {{ __('dashboard.order') }} </span>
                            </a>

                        </li>
                       
                        <li class=" {{ Request::route()->getName() == 'colors.index' ? 'active' : '' }}">

                            <a href="{{ route('colors.index') }}"><i class="fas fa-highlighter "></i>
                                <span> {{ __('dashboard.color') }} </span>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class=" {{ Request::route()->getName() == 'socials.index' ? 'active' : '' }}">

                    <a href="{{ route('socials.index') }}"><i class="fas fa-mail-bulk "></i>
                        <span> {{ __('dashboard.SocialMedia') }} </span>
                    </a>

                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-group mdi-24pxt "></i> <span>
                            {{ __('dashboard.user') }}
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyl">
                        <li class=" {{ Request::route()->getName() == 'roles.index' ? 'active' : '' }}">

                            <a href="{{ route('roles.index') }}"><i class="fas fa-user-cog  "></i>
                                <span> {{ __('dashboard.permissions') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'role_users.index' ? 'active' : '' }}">

                            <a href="{{ route('role_users.index') }}"><i class="fas fa-user-edit   "></i>
                                <span> {{ __('dashboard.userpermissions') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'users.index' ? 'active' : '' }}">

                            <a href="{{ route('users.index') }}"><i class=" mdi mdi-account-group mdi-24px    "></i>
                                <span> {{ __('dashboard.user') }} </span>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class=" {{ Request::route()->getName() == 'catalogs.index' ? 'active' : '' }}">

                    <a href="{{ route('catalogs.index') }}"><i class="dripicons-archive "></i>
                        <span> {{ __('dashboard.catalogs') }} </span>
                    </a>

                </li>
                <li class=" {{ Request::route()->getName() == 'image_videos.index' ? 'active' : '' }}">

                    <a href="{{ route('image_videos.index') }}"><i class=" mdi mdi-view-carousel  mdi-24px    "></i>
                        <span> {{ __('dashboard.slider') }} </span>
                    </a>

                </li>

                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-copy  "></i> <span> Pages
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li class=" {{ Request::route()->getName() == 'projects.index' ? 'active' : '' }}">

                            <a href="{{ route('projects.index') }}"><i class="dripicons-archive "></i>
                                <span> {{ __('dashboard.projects') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'abouts.index' ? 'active' : '' }}">

                            <a href="{{ route('abouts.index') }}"><i class="ion ion-ios-people"></i>
                                <span> {{ __('dashboard.about') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'contacts.index' ? 'active' : '' }}">

                            <a href="{{ route('contacts.index') }}"><i class="mdi mdi-cellphone-message   "></i>
                                <span> {{ __('dashboard.contact') }} </span>
                            </a>

                        </li>
                        <li class="{{ Request::route()->getName() == 'villas.index' ? 'active' : '' }}">
                            <a href="{{ route('villas.index') }}" >
        
                                <i class="mdi mdi-city-variant"></i>
                                <span> {{ __('dashboard.villas') }} </span>
                            </a>
                        </li>
                        <li class=" {{ Request::route()->getName() == 'faqes.index' ? 'active' : '' }}">

                            <a href="{{ route('faqes.index') }}"><i class="mdi mdi-comment-question-outline  "></i>
                                <span> {{ __('dashboard.faqes') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'trades.index' ? 'active' : '' }}">

                            <a href="{{ route('trades.index') }}"><i class="dripicons-anchor  "></i>
                                <span> {{ __('dashboard.trade') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'data_policies.index' ? 'active' : '' }}">

                            <a href="{{ route('data_policies.index') }}"><i
                                    class="dripicons-lock   "></i>
                                <span> {{ __('dashboard.data_policies') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'privacies.index' ? 'active' : '' }}">

                            <a href="{{ route('privacies.index') }}"><i class="dripicons-lock-open   "></i>
                                <span> {{ __('dashboard.privacies') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'investors.index' ? 'active' : '' }}">
                            
                            <a href="{{ route('investors.index') }}"><i class="  dripicons-user-group"></i>
                                <span> {{ __('dashboard.investors') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'design_services.index' ? 'active' : '' }}">

                            <a href="{{ route('design_services.index') }}"><i
                                    class="dripicons-brush  "></i>
                                <span> {{ __('dashboard.design_services') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'values.index' ? 'active' : '' }}">

                            <a href="{{ route('values.index') }}"><i class="dripicons-web   "></i>
                                <span> {{ __('dashboard.values') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'histories.index' ? 'active' : '' }}">

                            <a href="{{ route('histories.index') }}"><i
                                    class="dripicons-document  "></i>
                                <span> {{ __('dashboard.histories') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'solutions.index' ? 'active' : '' }}">

                            <a href="{{ route('solutions.index') }}"><i
                                    class="dripicons-document  "></i>
                                <span> {{ __('dashboard.solutions') }} </span>
                            </a>

                        </li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="dripicons-folder-open  "></i> <span>
                            Career
                        </span> <span class="menu-arrow float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li class=" {{ Request::route()->getName() == 'careers.index' ? 'active' : '' }}">

                            <a href="{{ route('careers.index') }}"><i class="dripicons-broadcast   "></i>
                                <span> {{ __('dashboard.careers') }} </span>
                            </a>

                        </li>
                        <li class=" {{ Request::route()->getName() == 'order_jobs.index' ? 'active' : '' }}">

                            <a href="{{ route('order_jobs.index') }}"><i
                                    class="dripicons-archive  "></i>
                                <span> {{ __('dashboard.orderjobs') }} </span>
                            </a>

                        </li>
                    </ul>
                </li>
     
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
