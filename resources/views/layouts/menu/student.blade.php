<li class="nav-item">
    <a class="nav-link text-dark" href="{{ route('dashboard.student') }}">
        <i class="material-symbols-rounded opacity-5">dashboard</i>
        <span class="nav-link-text ms-1">Dashboard</span>
    </a>
</li>
<!-- Add Menues In between -->



<!-- Add Menues In between -->
<li class="nav-item">
    <a class="nav-link text-dark" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="material-symbols-rounded opacity-5">logout</i>    
        <form action="{{ route('auth.student.logout') }}" method="POST" id="logout-form" class="mt-4 d-none">
            @csrf
        </form>
        <span class="nav-link-text ms-1">Post-Logout</span>
    </a>
</li>
<li class="nav-item">
    <a class="nav-link text-dark" href="{{ route('auth.student.logout') }}">
        <i class="material-symbols-rounded opacity-5">logout</i>
        <span class="nav-link-text ms-1">GET-Logout</span>
    </a>
</li>