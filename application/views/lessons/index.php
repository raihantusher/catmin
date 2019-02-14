



<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>change demo</title>
  <style>
  div {
    color: red;
  }
  </style>
  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
</head>
<body>

<select name="sweets">
  <option value="announcement">Announcement</option>
  <option value="video">Video</option>
  <option value="link">Link</option>
  <option value="quiz">Quiz</option>
</select>
<div></div>

<div id="announcement" style="display:none">Announcement will be here</div>
<div id="video" style="display:none">Video link</div>
<div id="link" style="display:none">Links</div>
<div id="quiz" style="display:none">Quiz ":p"</div>



<script>

$( "select" )
  .change(function () {

    $( "select option:selected" ).each(function() {
      var str ="#"+$( this ).val();

      $("#announcement").hide();
      $("#video").hide();
      $("#link").hide();
      $("#quiz").hide();
      $(str).show();


    });
    //$( "div" ).text( str );
  })
  .change();
</script>



<div class="container-fluid">
 
    <form action="" method="post">
      <div class="form-group">
        <label for="content">Lesson name </label>
        <input type="text" class="form-control" name="lesson name" id="contetinput" placeholder="lesson name">
        <input type="hidden" id="custId" name="course_id" value="<?=$course_id?>" >
        <label for="content">Title name </label>
        <input type="text" class="form-control" name="title name" id="contetinput" placeholder="title name">
        <label for="content">Description</label>
        <input type="text" class="form-control" name="description" id="desinput" placeholder="content input">
      </div>
     <input type="submit" value="Add New Lesson">
    </form>
  </div>

  <div class="container-fluid">
  
      
      <form action="" method="post">

        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
          </div>
        <div class="custom-file">
          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
          <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
       </div>
      </form>
    
  </div>

  <div class="container-fluid">
    <form action="" method="post">
      <div class="form-group">
        <label for="content">Announcedment </label>
        <input type="text" class="form-control" name="announce" id="announceinput" placeholder="Title Announce">
        <label for="content">date of announce </label>
        <input type="data-toggle" class="form-control" name="date" id="dateinput" placeholder="date">
        <label for="content">Description</label>
        <input type="text" class="form-control" name="description" id="descriptioninput" placeholder="description announce">

        <input type="hidden" id="custId" name="course_id" value="<?=$course_id?>" >
      </div>
     <input type="submit" value="Submit">

    </form>
  </div>
</body>
</html>