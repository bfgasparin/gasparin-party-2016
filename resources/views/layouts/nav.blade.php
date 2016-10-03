<nav class="nav">
  <div class="nav-left">
    <a class="nav-item is-brand" href="{{ url('/') }}">
      <h1 class="title">{{ config('app.name', 'Festa Gasparin') }}</h1>
    </a>
  </div>

  <div class="nav-center" >
    <span class="nav-item is-hidden-mobile">
       <figure class="image">
         <img src="images/logo.jpg">
      </figure>
    </span>
  </div>

  <div class="nav-right nav-menu">
    @if (Auth::guest())
    <span class="nav-item">
        <a class="button is-primary is-outlined" href="{{ url('/login') }}">Logar</a>
    </span>
    <span class="nav-item">
        <a class="button is-primary is-outlined" href="{{ url('/register') }}">Cadastrar</a>
    </span>
    @else

    <span class="nav-item">
        <a  class="button is-info is-outlined" href="{{ url('/logout') }}"
            onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
            Logout
        </a>

        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </span>
    @endif
  </div>
</nav>