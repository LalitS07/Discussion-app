<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light  head">
  <div class="container">
    <a class="navbar-brand" href="./">  
    <img src="./public/disc.png" alt="">
</a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" href="./">Home</a>
        </li>

        <?php  if(isset($_SESSION["see"]) && $_SESSION["see"]) { ?>
        <li class="nav-item">
          <a class="nav-link" href="./server/request.php?logout=true">Logout ( <?php echo ucfirst($_SESSION['see']['username'])?>)</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?ask=true">Ask A Question</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="?u-id=<?php echo $_SESSION['see']['user_id'] ?>">My Questions</a>
        </li>
        <?php } else{ ?>
               <li class="nav-item">
               <a class="nav-link" href="?login=true">Login</a>
             </li>
             <li class="nav-item">
               <a class="nav-link" href="?signup=true">SignUp</a>
             </li>
       <?php }?>
          
        <li class="nav-item">
        <a class="nav-link" href="?latest=true">Latest Quetions</a>
          
        </li>
      </ul>
    </div>
    <form class="d-flex" action="">
        <input class="form-control me-2" name="search" type="search" placeholder="Search questions">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
  </div>
</nav>