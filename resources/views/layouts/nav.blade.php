<nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="/">{{env('APP_NAME')}}</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            產品類別
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('Category.index','1')}}">生活用品</a>
                <a class="dropdown-item" href="{{route('Category.index','2')}}">玩具</a>
                <a class="dropdown-item" href="{{route('Category.index','3')}}">五金百貨</a>
                <a class="dropdown-item" href="{{route('Category.index','4')}}">書籍</a>
          </div>
        </li>

        </ul>

        <span class="navbar-text">
              <div class="links">
                @guest
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endguest
                @auth
                  <ul class="navbar-nav ml-auto">
                    <a class="nav-link " href="{{route('cart.index')}}" >
                      My Cart <span class="caret"></span>
                    </a>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ auth()->user()->name }} 你好<span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </li>
                </ul>
                @endauth
              </div>
        </span>
      </div>
</nav>
