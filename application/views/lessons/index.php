



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
  <option value="announce">Announce</option>
  <option value="video">Video</option>
  <option value="link">Link</option>
  <option value="quiz">Quiz</option>
  <option value="article">article</option>
</select>
<div></div>







<div class="container-fluid" style="display:none" id="article">

    <form " action="" method="post">
      <div class="form-group">
        <label for="content">Lesson name </label>
        <input type="text" class="form-control" name="lesson name" id="contetinput" placeholder="lesson name">
        <input type="hidden" id="custId" name="course_id" value="<?=$course_id?>" >
        <label for="content">Title name </label>
        <input type="text" class="form-control" name="title name" id="editor" placeholder="title name">
        <label for="content">Description</label>
        <input type="text" class="form-control" name="description" id="desinput" placeholder="content input">
      </div>
     <input type="submit" value="Add New Lesson">
    </form>
  </div>

  <div class="container-fluid" style="display:none" id="video">


      <form   method="post">

        <div class="input-group">
        <div class="custom-file">
          <input type="text" name="lesson_name">
          <input type="hidden" name="type" value="video">
          <input type="url" name="video_url" >
          <input type="hidden" id="custId" name="course_id" value="<?=$course_id?>" >

        </div>
       </div>
       <input type="submit" value="Add New Lesson">
      </form>

  </div>

  <div class="container-fluid" style="display:none" id="announce">
    <form  action="" method="post">
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
