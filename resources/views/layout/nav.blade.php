<div class="ui secondary pointing menu">
    <a href="{{route('home')}}" class="active item">
        Home
    </a>

    <div class="right menu">
        @auth
        <a class="ui item" href="">
          {{auth()->user()->name}}
        </a>
        <form class="ui item" action="{{route('logout')}}" method="POST">
          @csrf
          <button class="mini ui button red basic">Logout</button>
        </form>
        @else
        <a href="{{route('register')}}" class="ui item">
          Register
        </a>
        <a href="{{route('login')}}" class="ui item">
          Login
        </a>
        @endauth
    </div>
</div>
