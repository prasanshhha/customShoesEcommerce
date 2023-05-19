<header class="header" id="header">
    <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
</header>
<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div> 
            <a href="{{ route('home') }}" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name"><img src="{{ asset('assets/images/title-dark.png') }}" alt="" width="auto" height="17"></span></a>
            <div class="nav_list"> 
                <a href="{{ route('admin.dashboard') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.dashboard"])> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                <a href="{{ route('admin.user.index') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.user.index"])> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Users</span> </a> 
                <a href="{{ route('admin.category.index') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.category.index"])> <i class='bx bx-collection nav_icon'></i> <span class="nav_name">Categories</span> </a> 
                <a href="{{ route('admin.product.index') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.product.index"])> <i class='bx bx-archive nav_icon'></i> <span class="nav_name">Products</span> </a> 
                <a href="{{ route('admin.order.index') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.order.index"])> <i class='bx bx-receipt nav_icon'></i> <span class="nav_name">Orders</span> </a> 
                {{-- <a href="{{ route('admin.user.index') }}" @class(['nav_link', 'nav_link active' => Route::currentRouteName() == "admin.user.index"])> <i class='bx bx-rupee nav_icon'></i> <span class="nav_name">Payments</span> </a>  --}}
            </div>
        </div>
        <form class="form-inline" action="{{ route('logout') }}" method="POST">
            @csrf
            <button class="btn btn-link text-decoration-none nav_link" type="submit"><i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sign Out</span></button>
        </form>
    </nav>
</div>


<script>
document.addEventListener("DOMContentLoaded", function(event) {
   
    const showNavbar = (toggleId, navId, bodyId, headerId) =>{
        const toggle = document.getElementById(toggleId),
        nav = document.getElementById(navId),
        bodypd = document.getElementById(bodyId),
        headerpd = document.getElementById(headerId)
        
        // Validate that all variables exist
        if(toggle && nav && bodypd && headerpd){
            toggle.addEventListener('click', ()=>{
                // show navbar
                nav.classList.toggle('show')
                // change icon
                toggle.classList.toggle('bx-x')
                // add padding to body
                bodypd.classList.toggle('body-pd')
                // add padding to header
                headerpd.classList.toggle('body-pd')
            })
        }
    }
    
    showNavbar('header-toggle','nav-bar','body-pd','header')
});
</script>
