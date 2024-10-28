<meta http-equiv="Content-Security-Policy" content="script-src 'self' 'wasm-unsafe-eval' 'inline-speculation-rules' chrome-extension://c396d347-023a-4f99-a045-d63d8f281cbb;">




<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">

    <a class="navbar-brand" href="#">
      <img src="https://cdn.pixabay.com/photo/2022/09/08/13/59/youtube-7441044_1280.png" alt="Brand Logo">
    </a>

    <!-- Button for toggling the navbar in mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
             
        <li class="nav-item">
          <a class="nav-link active anchorColor" aria-current="page" href="./">Home</a>
        </li>

        <?php if (isset($_SESSION['user']) && isset($_SESSION['user']['username'])): ?>    
         
          <li class="nav-item">
            <a class="nav-link" href="?login=true">Logout</a>
          </li>
       
        <?php else: ?>

          <li class="nav-item">
            <a class="nav-link" href="?login=true">Login</a>
          </li>
  
          <li class="nav-item">
            <a class="nav-link" href="?signup=true">Sign Up</a>
          </li>
        
        <?php endif; ?>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Latest Questions</a>
        </li>

        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Categories</a>
        </li>  
      
      </ul>
    </div>
  </div>
</nav>
