

<div class="container text-align-center">
  <h1 class="heading"> Ask Question</h1>

  <form style="margin-top: 80px;" action="../server/requests.php" method="POST">
    <div class="col-10 offset-sm margin-bottom-15">
      <label for="title">User Email</label>
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
        name="title"
        aria-describedby="emailHelp"
        placeholder="Enter Question" >

    </textarea>

    </div>

   

    <div class="col-10 offset-sm margin-bottom-15">
      <label for="category">Category</label>
      <select
        type="text"
        class="form-control"
        id="category"
        name="category"
        aria-describedby="emailHelp"
        placeholder="Enter Question"
        class="form-control"
      >

      <option value="">Mobiles</option>
      <option value="">General</option>
      <option value="">Coding</option>
    
    </select>
    </div>




  </form>

    
    <button type="submit" class="btn-primary" name="ask">Ask</button>
  </form>
</div>