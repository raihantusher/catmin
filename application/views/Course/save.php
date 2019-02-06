<div class="container-fluid">
  <div class="col">
    <div class="row justify-content-center">

      <div class="card">
          <div class="card-body">
            <form class="form-horizontal" action="" method="post">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="hf-email">Course Title</label>
                    <div class="col-md-9">
                        <?php echo form_input(['name' => 'course_title', 'id' => 'course_title', 'class' => 'input_textbox form-control', 'maxlength' => '100'], set_value('course_title', (isset($row->course_title) ? $row->course_title : ""))); ?>

                        <span class="help-block">Please enter your course title</span>
                    </div>
                </div>
                <div class="form-group row">
                      <label class="col-md-3 col-form-label" >Course Description</label>
                      <div class="col-md-9">
                          <?php echo form_input(['name' => 'course_description', 'id' => 'course_description', 'class' => 'form-control'], set_value('course_description', (isset($row->course_description) ? $row->course_description : ""))); ?>
                          <span class="help-block">Please enter your course description</span>
                      </div>
                </div>
                 <div class="form-group row">
                      <label class="col-md-3 col-form-label" >Course Tag</label>
                      <div class="col-md-9">
                          <?php echo form_input(['name' => 'course_tag', 'id' => 'course_tag', 'class' => 'form-control'], set_value('course_tag', (isset($row->course_tag) ? $row->course_tag : ""))); ?>
                          <span class="help-block">Please enter your course tag</span>
                      </div>
                </div>
                 <div class="form-group row">
                      <label class="col-md-3 col-form-label" >Course Date</label>
                      <div class="col-md-9">

                          <?php echo form_input(['name' => 'date', 'id' => 'date', 'class' => 'form-control','type'=>'date'], set_value('date', (isset($row->date) ? $row->date : ""))); ?>
                          <span class="help-block">Please enter your course date</span>
                      </div>
                </div>
                <div class="card-footer">
                  <button class="btn btn-sm btn-primary" type="submit">
                  <i class="fa fa-dot-circle-o"></i> Submit</button>
                  <button class="btn btn-sm btn-danger" type="reset">
                  <i class="fa fa-ban"></i> Reset</button>
               </div>
              </form>
          </div>

     </div>
 </div>
</div>
</div>
