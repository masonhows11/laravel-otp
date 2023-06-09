<div id="mySidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

    <ul class="navbar-nav  nav-side  mb-2 mt-3">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">خانه</a>
        </li>
        @if(\Illuminate\Support\Facades\Auth::check())
            <li class="nav-item">
                <a href="#" class="nav-link">پروفایل</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link">خروج</a>
            </li>
        @else
            <li class="nav-item">
                <a href="{{ route('login.form') }}" class="nav-link">ورود</a>
            </li>
            <li class="nav-item">
                <a href="{{ route('register.form') }}" class="nav-link">ثبت نام</a>
            </li>
        @endif
        <li class="nav-item">
            <a class="nav-link" href="#" >درباره ما</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#" >ارتباط با ما</a>
        </li>
    </ul>

</div>

