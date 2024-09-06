<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show" style="background: #0d1e2d;">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("frontend.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("permissions*") ? "c-show" : "" }} {{ request()->is("roles*") ? "c-show" : "" }} {{ request()->is("users*") ? "c-show" : "" }} {{ request()->is("user-alerts*") ? "c-show" : "" }} {{ request()->is("audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items"> 
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("roles") || request()->is("roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.users.index") }}" class="c-sidebar-nav-link {{ request()->is("users") || request()->is("users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("user-alerts") || request()->is("user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("audit-logs") || request()->is("audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan 
        @can('page_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("pages") || request()->is("pages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-facebook-f c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.page.title') }}
                </a>
            </li>
        @endcan 
        @can('product_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.products.index") }}" class="c-sidebar-nav-link {{ request()->is("products") || request()->is("products/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-product-hunt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.product.title') }}
                </a>
            </li>
        @endcan
        @can('order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("orders") || request()->is("orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.order.title') }}
                </a>
            </li>
        @endcan  
        @can('message_generation_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.message-generations.index") }}" class="c-sidebar-nav-link {{ request()->is("message-generations") || request()->is("message-generations/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-accusoft c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.messageGeneration.title') }}
                </a>
            </li>
        @endcan
        @can('shift_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.shifts.index") }}" class="c-sidebar-nav-link {{ request()->is("shifts") || request()->is("shifts/*") ? "c-active" : "" }}">
                    <i class="fa-fw far fa-address-card c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.shift.title') }}
                </a>
            </li>
        @endcan
        @can('operating_stage_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("pendings*") ? "c-show" : "" }} {{ request()->is("overviews*") ? "c-show" : "" }} {{ request()->is("prepare-delvieries*") ? "c-show" : "" }} {{ request()->is("on-deliveries*") ? "c-show" : "" }} {{ request()->is("delivereds*") ? "c-show" : "" }} {{ request()->is("returneds*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.operatingStage.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pending_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.pendings.index") }}" class="c-sidebar-nav-link {{ request()->is("pendings") || request()->is("pendings/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pending.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('overview_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.overviews.index") }}" class="c-sidebar-nav-link {{ request()->is("overviews") || request()->is("overviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.overview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('prepare_delviery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.prepare-delvieries.index") }}" class="c-sidebar-nav-link {{ request()->is("prepare-delvieries") || request()->is("prepare-delvieries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cube c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.prepareDelviery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('on_delivery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.on-deliveries.index") }}" class="c-sidebar-nav-link {{ request()->is("on-deliveries") || request()->is("on-deliveries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.onDelivery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('delivered_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.delivereds.index") }}" class="c-sidebar-nav-link {{ request()->is("delivereds") || request()->is("delivereds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.delivered.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('returned_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.returneds.index") }}" class="c-sidebar-nav-link {{ request()->is("returneds") || request()->is("returneds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-retweet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.returned.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('canceled_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.canceleds.index") }}" class="c-sidebar-nav-link {{ request()->is("canceleds") || request()->is("canceleds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-ban c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.canceled.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('country_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("countries*") ? "c-show" : "" }} {{ request()->is("cities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.countryManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("countries") || request()->is("countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("frontend.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("cities") || request()->is("cities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-globe-americas c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.city.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("frontend.messenger.index") }}" class="{{ request()->is("messenger") || request()->is("messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li> 
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('frontend.profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan 
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>