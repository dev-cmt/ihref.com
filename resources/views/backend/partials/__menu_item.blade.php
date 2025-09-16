<!--Partial:__menu_item (Note: Level-3 Not Work Perfect) -->
@php
    $submenuId = $submenu['identity'] ?? '';
    $isActive = request()->routeIs($submenu['link'] ?? '') || collect($submenu['submenus'] ?? [])->contains(fn($sub) => request()->routeIs($sub['link'] ?? ''));
@endphp
<li class="nav-item {{ $isActive}} {{ $isActive ? 'active' : '' }}">

    @if (!empty($submenu['submenus']))
        <a href="#{{ $submenuId }}" class="nav-link {{ $isActive ? 'active' : '' }}" 
           data-bs-toggle="collapse" role="button" 
           aria-expanded="{{ $isActive ? 'true' : 'false' }}" 
           aria-controls="{{ $submenuId }}">
            {{ $submenu['title'] }}
        </a>
        <div class="collapse menu-dropdown {{ $isActive ? 'show' : '' }}" id="{{ $submenuId }}">
            <ul class="nav nav-sm flex-column">
                @foreach ($submenu['submenus'] as $subsubmenu)
                    @include('backend.partials.__menu_item', ['submenu' => $subsubmenu, 'isActive' => request()->routeIs($subsubmenu['link'] ?? '')])
                @endforeach
            </ul>
        </div>
    @else
        <!-- Single Sub Menu -->
        <a href="{{ isset($submenu['link']) ? route($submenu['link']) : '#' }}" 
           class="nav-link {{ $isActive ? 'active' : '' }}">
            {{ $submenu['title'] }}
        </a>
    @endif
</li>

