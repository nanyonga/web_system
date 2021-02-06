<style>
    .fixed_top{
        position:sticky !important;
        top:0 !important;
        z-index: 100 !important;

    }
    nav.navbar.navbar-expand-lg.navbar-absolute.navbar-transparent{
        background:gray !important;
        color:#000;
        


    }
</style>
<div class="fixed_top">
    <nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
        <div class="container-fluid">
            <div class="navbar-wrapper d-none">
                <div class="navbar-toggle d-inline">
                    <button type="button" class="navbar-toggler">
                        <span class="navbar-toggler-bar bar1"></span>
                        <span class="navbar-toggler-bar bar2"></span>
                        <span class="navbar-toggler-bar bar3"></span>
                    </button>
                </div>
                <a class="navbar-brand" href="#">{{ $page ?? __('Dashboard') }}</a>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
                <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse" id="navigation">
                <div class="mr-auto">
                    <h4>COVID 19 MANAGEMENT SYSTEM</h4>
                </div>
                <ul class="navbar-nav ml-auto">
    
                    <li class="dropdown nav-item">
                        <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                            
                            <b class="caret d-none d-lg-block d-xl-block"></b>
                            <p class="d-lg-none">{{ __('Log out') }}</p>
                        </a>
                        <ul class="dropdown-menu dropdown-navbar">
                            
                            <li class="nav-link">
                                <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                            </li>
                        </ul>
                    </li>
                    <li class="separator d-lg-none"></li>
                </ul>
            </div>
        </div>
    </nav>
    
    </div>
