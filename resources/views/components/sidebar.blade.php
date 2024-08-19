@props(['menus'])

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ url('/') }}">{{ config('app.name', 'App Name') }}</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ url('/') }}">jp</a>
        </div>
        <ul class="sidebar-menu">

            <li class="menu-header">{{ Auth::user()->role->role_name }}</li>

            @foreach ($menus as $firstmenu)
                @php
                    $firstMenuActive = false;
                @endphp

                @if (Request::is($firstmenu['link']) || Request::is($firstmenu['link'] . '/*'))
                    @php
                        $firstMenuActive = true;
                    @endphp
                @endif

                @foreach ($firstmenu['children'] as $secondmenu)
                    @if (Request::is($secondmenu['link']) || Request::is($secondmenu['link'] . '/*'))
                        @php
                            $firstMenuActive = true;
                        @endphp
                    @endif
                @endforeach

                <li class="@if (!empty($firstmenu['children'])) dropdown @endif @if ($firstMenuActive) active @endif">
                    <a href="{{ url($firstmenu['link']) }}" class="nav-link @if (!empty($firstmenu['children'])) has-dropdown @endif">
                        <i class="{{ $firstmenu['icon'] }}"></i>
                        <span>{{ __($firstmenu['name']) }}</span>
                    </a>

                    @if (!empty($firstmenu['children']))
                        <ul class="dropdown-menu">
                            @foreach ($firstmenu['children'] as $secondmenu)
                                <li class="@if (Request::is($secondmenu['link']) || Request::is($secondmenu['link'] . '/*')) active @endif">
                                    <a href="{{ url($secondmenu['link']) }}" class="nav-link">{{ __($secondmenu['name']) }}</a>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                </li>
            @endforeach

        </ul>
    </aside>
</div>
