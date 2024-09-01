<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/user-alerts*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_alert_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.userAlert.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('client_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.clients.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/clients") || request()->is("admin/clients/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.client.title') }}
                </a>
            </li>
        @endcan
        @can('page_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.pages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pages") || request()->is("admin/pages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-facebook-f c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.page.title') }}
                </a>
            </li>
        @endcan
        @can('subscription_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.subscriptions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/subscriptions") || request()->is("admin/subscriptions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-hand-holding-usd c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.subscription.title') }}
                </a>
            </li>
        @endcan
        @can('package_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.packages.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/packages") || request()->is("admin/packages/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cubes c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.package.title') }}
                </a>
            </li>
        @endcan
        @can('product_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.products.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/products") || request()->is("admin/products/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-product-hunt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.product.title') }}
                </a>
            </li>
        @endcan
        @can('order_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.orders.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/orders") || request()->is("admin/orders/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-boxes c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.order.title') }}
                </a>
            </li>
        @endcan
        @can('order_detail_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.order-details.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-details") || request()->is("admin/order-details/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-align-left c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.orderDetail.title') }}
                </a>
            </li>
        @endcan
        @can('shift_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.shifts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/shifts") || request()->is("admin/shifts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fab fa-accusoft c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.shift.title') }}
                </a>
            </li>
        @endcan
        @can('operating_stage_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/pendings*") ? "c-show" : "" }} {{ request()->is("admin/overviews*") ? "c-show" : "" }} {{ request()->is("admin/prepare-delvieries*") ? "c-show" : "" }} {{ request()->is("admin/on-deliveries*") ? "c-show" : "" }} {{ request()->is("admin/delivereds*") ? "c-show" : "" }} {{ request()->is("admin/returneds*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw far fa-list-alt c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.operatingStage.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('pending_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.pendings.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/pendings") || request()->is("admin/pendings/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-clock c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.pending.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('overview_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.overviews.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/overviews") || request()->is("admin/overviews/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-edit c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.overview.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('prepare_delviery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.prepare-delvieries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/prepare-delvieries") || request()->is("admin/prepare-delvieries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cube c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.prepareDelviery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('on_delivery_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.on-deliveries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/on-deliveries") || request()->is("admin/on-deliveries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-truck c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.onDelivery.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('delivered_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.delivereds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/delivereds") || request()->is("admin/delivereds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-check-double c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.delivered.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('returned_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.returneds.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/returneds") || request()->is("admin/returneds/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-retweet c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.returned.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('country_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/countries*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-globe-africa c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.countryManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('country_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.countries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/countries") || request()->is("admin/countries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.country.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('city_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
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
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>