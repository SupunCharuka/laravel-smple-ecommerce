<header class="header_section">
    <div class="container">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <form class="form-inline">
                <div class="relative flex items-center">
                    <button class="absolute left-0 ml-2" type="submit">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
                    <input class="form-control ml-10 pl-4 mb-0" type="search" placeholder="Search" aria-label="Search">
                </div>
            </form>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{route('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('products')}}"><span class="sr-only">(current)</span>Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><span class="sr-only">(current)</span>Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}"><span class="sr-only">(current)</span>Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}"><span class="sr-only">(current)</span>Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                         <i class="fa fa-cart-plus" style="font-size: 20px"></i>
                        </a>
                    </li>
                  
                    
                    
                </ul>
            </div>
        </nav>
    </div>
</header>
