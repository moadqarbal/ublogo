<nav class="navbar py-5 navbar-expand-lg u-top-nav">
    <div class="container">
      <a class="navbar-brand" href="/">
        <img src="{{ asset('images/logo-ublogo.png') }} " style="height: 45px;" alt="Logo Alt">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">

          <li class="nav-item">
            <a class="nav-link fs-5" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fs-5" href="#">About</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link fs-5" href="#">Category 1</a>
          </li>
          
          <li class="nav-item">
            <a class="nav-link fs-5" href="#">Category 2</a>
          </li>

          <li class="nav-item">
            <a class="nav-link fs-5" href="#">Category 3</a>
          </li>

          
          <li class="nav-item d-block d-lg-none">
            <form class="d-flex" role="search">
                <input class="form-control me-2 border rounded-1 p-2" type="search" placeholder="Search" aria-label="Search">
            </form>
        </li>
          
        </ul>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          @auth
            <li class="nav-item">
              <a class="nav-link fs-5" href="{{ url('users/' . auth()->user()->id . '/edit') }}"><i class="bi bi-person-fill"></i> {{ auth()->user()->username }}</a>
            </li>
            <li class="nav-item">
              <a class="btn fs-5 border border-0 rounded-1 p-2" style="background-color: #272727; color: rgb(255, 255, 255);" href="{{ url('logout') }}">
                Sign Out
              </a>
            </li>
          @else
            <li class="nav-item">
              <a class="nav-link fs-5" href="/signin">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="btn fs-5 border border-0 rounded-1 p-2" style="background-color: #FF7C00; color: white;" href="/signup">
                Sign Up
              </a>
            </li>
          @endauth
            
        </ul>
      </div>
    </div>
  </nav>