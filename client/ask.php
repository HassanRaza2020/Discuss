

<div class="container text-align-center">
  <h1 class="heading"> Ask Question</h1>

  <form style="margin-top: 80px;" action="../server/requests.php" method="POST">
    <div class="col-10 offset-sm margin-bottom-15">
      <label for="title">Enter the Question</label>
      <input
        type="text"
        class="form-control"
        id="title"
        name="title"
        aria-describedby="emailHelp"
        placeholder="Enter Question"
      />
    </div>

    
    <div class="col-10 offset-sm margin-bottom-15">
      <label for="description">Description</label>
    <textarea  
        type="text"
        class="form-control"
        id="description"
        name="description"
        aria-describedby="emailHelp"
        placeholder="Enter Question" >

    </textarea>

    </div>

   

    <div class="col-10 offset-sm margin-bottom-15">
      <label for="category">Category</label>
     
    <?php
    include("../client/category.php")
    ?>


      </div>

    
    <button type="submit" class="btn-primary" name="ask" >Ask </button>

  </form>

</div>