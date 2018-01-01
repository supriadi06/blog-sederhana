<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">Stars</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      
      <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          <?php if(Auth::guest()): ?>
              <li><a href="<?php echo e(route('login')); ?>">Login</a></li>
              <li><a href="<?php echo e(route('register')); ?>">Register</a></li>
          <?php else: ?>
              <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                      <?php echo e(ucwords(Auth::user()->name)); ?> <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu" role="menu">
                      <li>
                          <a href="<?php echo e(route('logout')); ?>"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                              <?php echo e(csrf_field()); ?>

                          </form>
                      </li>
                  </ul>
              </li>
          <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>