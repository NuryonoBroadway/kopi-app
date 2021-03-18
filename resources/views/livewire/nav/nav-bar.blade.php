<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-white shadow p-2">
    <div class="logo">
        <a href="{{ route('home') }}" class="text-dark">Kembali Lagi</a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
      @auth
      @if (Auth::user()->roles[0]->name === 'admin')
        @include('livewire.nav.admin.nav-include')
      @else 
      @include('livewire.nav.user.nav-include') 
      @endif
      <a href={{ route('profile', Auth::user()) }}>
        <button class="btn btn-primary align-middle">
          {{ Auth::user()->name }}
        </button>
      </a>
      @endauth
      @guest
      @include('livewire.nav.user.nav-include')    
        <a href={{ route('login') }}>
          <button class="btn btn-primary">
            Login
          </button>
        </a>        
      @endguest
    </div>
    @auth
    @if (Auth::user()->roles[0]->name === 'user')
    <a href={{ route('new-order')}} class="position-absolute idk">
      <button type="button" class="btn btn-primary mt-0">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-fill" viewBox="0 0 16 16">
            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg> 
          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-secondary">{{ Auth::user()->orders->count()}} <span class="visually-hidden">unread messages</span></span>
        </button> 
    </a> 
    @endif        
    @endauth
  </nav>