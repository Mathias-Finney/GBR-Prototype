<nav class="sidebar">
    <div class="sidebar-header">
        <a href="#" class="sidebar-brand">
        G<span>BRaS</span>
        </a>
        <div class="sidebar-toggler not-active">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div class="sidebar-body">
        <ul class="nav">
        <li class="nav-item nav-category">ADMINISTRATION</li>
        <li class="nav-item">
            <a href="{{ route('admin.dashboard' )}}" class="nav-link">
            <i class="link-icon" data-feather="box"></i>
            <span class="link-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item nav-category">BUSES</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="life-buoy"></i>
           
            <span class="link-title">BUS</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('all.bus') }}" class="nav-link">All Buses</a> 
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('add.bus') }}" class="nav-link">Add Buses</a>
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('all.busHiring') }}" class="nav-link">All Buses Hirings</a> 
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('add.busHiring') }}" class="nav-link">Add Buses Hiring</a>
                    </li>
                    {{-- we can add more if needed --}}
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">REGIONS</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="life-buoy"></i>
           
            <span class="link-title">REGIONS</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="{{ route('all.reg') }}" class="nav-link">All Regions</a> 
                    </li>
                    <li class="nav-item">
                    <a href="{{ route('add.reg') }}" class="nav-link">Add Region</a>
                    </li>
                    {{-- we can add more if needed --}}
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">TERMINALS</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="life-buoy"></i>
           
            <span class="link-title">TERMINALS</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    {{-- terminal links --}}
                    <li class="nav-item">
                    <a href="{{ route('all.tem') }}" class="nav-link">Terminals</a> 
                    </li>
                    
                    {{-- Route links --}}
                    <li class="nav-item">
                    <a href="{{ route('all.route') }}" class="nav-link">Routes</a> 
                    </li>
                    
                    {{-- driver link --}}
                    <li class="nav-item">
                    <a href="{{ route('all.driver') }}" class="nav-link">Driver</a> 
                    </li>
                    
                    {{-- payment --}}
                    <li class="nav-item">
                        <a href="{{ route('all.payment') }}" class="nav-link">Payments</a> 
                    </li>

                    {{-- Trip --}}
                    <li class="nav-item">
                        <a href="{{ route('all.trip') }}" class="nav-link">Trips</a> 
                    </li>
                    
                </ul>
            </div>
        </li>
        <li class="nav-item nav-category">TICKETS</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#emails" role="button" aria-expanded="false" aria-controls="emails">
            <i class="link-icon" data-feather="life-buoy"></i>
           
            <span class="link-title">TICKETS</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="emails">
                <ul class="nav sub-menu">
                    {{-- tICKETS links --}}
                    <li class="nav-item">
                    <a href="{{ route('all.ticket') }}" class="nav-link">Tickets</a> 
                    </li>
                    
                    
                    
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a href="pages/apps/calendar.html" class="nav-link">
            <i class="link-icon" data-feather="calendar"></i>
            <span class="link-title">Calendar</span>
            </a>
        </li>

        <li class="nav-item nav-category">Components</li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#uiComponents" role="button" aria-expanded="false" aria-controls="uiComponents">
            <i class="link-icon" data-feather="feather"></i>
            <span class="link-title">UI Kit</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="uiComponents">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/ui-components/accordion.html" class="nav-link">Accordion</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/ui-components/alerts.html" class="nav-link">Alerts</a>
                    </li>
                    
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#advancedUI" role="button" aria-expanded="false" aria-controls="advancedUI">
            <i class="link-icon" data-feather="anchor"></i>
            <span class="link-title">Advanced UI</span>
            <i class="link-arrow" data-feather="chevron-down"></i>
            </a>
            <div class="collapse" id="advancedUI">
                <ul class="nav sub-menu">
                    <li class="nav-item">
                    <a href="pages/advanced-ui/cropper.html" class="nav-link">Cropper</a>
                    </li>
                    <li class="nav-item">
                    <a href="pages/advanced-ui/owl-carousel.html" class="nav-link">Owl carousel</a>
                    </li>
                </ul>
            </div>
        </li>
        
        
        <li class="nav-item nav-category">Docs</li>
        <li class="nav-item">
            <a href="#" target="_blank" class="nav-link">
            <i class="link-icon" data-feather="hash"></i>
            <span class="link-title">Documentation</span>
            </a>
        </li>
        </ul>
    </div>
</nav>