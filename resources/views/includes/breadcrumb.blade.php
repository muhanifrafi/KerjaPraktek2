<div class="breadcrumb">
      <div class="container d-flex align-items-center justify-content-between">

        <ol class="breadcrumb m-0 p-0">
           <li class="breadcrumb-item active" aria-current="page"><a href="/">Home</a></li>
           @foreach($titles as $title)
		   <li class="breadcrumb-item"><strong>{{$title}}</strong></li>
           @endforeach	  
        </ol>
        @if(Auth::check())
        <nav class="navbar navbar-expand-lg p-0">
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                                <a class="nav-link " href="form_order_list">
		            <i class="fa fa-shopping-cart chart"> <span class="label label-warning" id="jmlorder"></span></i>
				      </a></li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                {{ Auth::user()->tmcrmcust->n_cust ?? 'NULL'}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <!--a class="dropdown-item" href="#">Profil</a-->
                  <a class="dropdown-item" href="#" data-toggle="modal" data-target="">Change Password</a>
                  <a  class = "dropdown-item" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                  </form>
                </div>
              </li>
            </ul>
          </div>
        </nav>
        @endif
      </div>
</div>