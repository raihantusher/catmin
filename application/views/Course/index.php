<div class="container-fluid">
  <div class="col">
    <div class="row justify-content-center">
      <div class="card">
          <div class="card-body">
            <div class="d-flex docs-highlight mb-3">
                <div class=""><a href="<?=site_url("course/add")?>" class="btn btn-success">Add Course</a>

                </div>
            </div>


         <div class="card-body">
           <table class="table table-responsive-sm table-bordered">
             <thead>
                <tr>
                    <th>Course title</th>
                    <th>Course Description</th>
                    <th>Course tag</th>
                    <th>date</th>
                    <th>Action</th>
                  </tr>
              </thead>
              <tbody>
                  <?php
                    if(count($courses) > 0){
                        foreach ($courses as $row) {
                          ?>
                            <tr>
                                <td><?php echo $row->course_title ?></td>
                                <td><?php echo $row->course_description ?></td>
                                <td><?php echo $row->course_tag ?> </td>
                                <td><?php echo $row->date ?> </td>
                                <td>
                                  
                                  <a href="<?=site_url("lesson/").$row->id ?>">
                                     <button type="button" class="btn btn-primary" >
                                       Add Lessons
                                      </button>
                                   </a> 
                                   
                                   <a href="<?=site_url("course/edit/").$row->id ?>">
                                     <button type="button" class="btn btn-primary" >
                                        <i class="fa fa-pencil"></i>
                                      </button>
                                   </a> 
                                   <a href="<?=site_url("course/delete/").$row->id ?>">
                                      <button type="button" class="btn btn-danger">
                                          <i class="fa fa-trash" aria-hidden="true"></i>
                                      </button>
                                   </a>
                                     
                                  </td>

                            </tr>
                          <?php
                        }

                    }
                  ?>

              </tbody>
          </table>



        <div align="center" id="paging"><?=$links ?></div>

</div>


      </div>
    </div>
  </div>
</div>


