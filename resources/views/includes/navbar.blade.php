<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('dashboard') }}">Liquor Store</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('dashboard') }}">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('drinks.index') }}">Drinks</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('orders.index') }}">Orders</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('flippers.index') }}">Flippers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('images.index') }}">Images</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Category
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Vodka</a></li>
            <li><a class="dropdown-item" href="#">Whiskey</a></li>
            <li><a class="dropdown-item" href="#">Gin</a></li>
            <li><a class="dropdown-item" href="#">Beer</a></li>
            <li><a class="dropdown-item" href="#">Soft Drinks</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.logout') }}">Logout</a>
        </li>
      </ul>
    </div>
  </div>
</nav>