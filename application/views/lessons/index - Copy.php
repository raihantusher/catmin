




<form action="" method="post">
  <div class="form-group">
    <label for="content">content </label>
    <input type="text" class="form-control" name="content" id="contetinput" placeholder="content input">
    <input type="hidden" id="custId" name="course_id" value="<?=$course_id?>" >
  </div>
 <input type="submit" value="Add New Lesson">

</form>


<div class="row">
	<?php foreach ($lessons as $row) : ?>
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row->content ?></h5>
        <p class="card-text">It's a broader card with text below as a natural lead-in to extra content. This content is a little longer.</p>
        <a href="<?=site_url("lesson/viewpage")?>" class="btn btn-primary">Add</a>
        <a href="#" class="btn btn-primary">Edit</a>
        <a href="#" class="btn btn-primary">Delete</a>
      </div>
    </div>
  </div>
   <?php endforeach; ?>
</div>