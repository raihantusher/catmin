<div class="container-fluid">
  <div class="col">
    <div class="row justify-content-center">

      <div class="card">
          <div class="card-body">
            <div class="d-flex docs-highlight mb-3">
                <div class="mr-auto p-2 docs-highlight">Flex item</div>
                <div class=""><a href="<?=site_url("course/add")?>" class="btn btn-success">Add Course</a>

            </div>
            Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip
          ex ea commodo consequat.
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
                                  <!--<?php// echo anchor("Course/edit/".$row->id,"class"=>"btn btn-primary")?>-->
                                  <a href="<?=site_url("course/edit/").$row->id ?>" class="btn btn-primary">edit</a>
                                  <a href="<?=site_url("course/delete/").$row->id ?>" class="btn btn-primary" onclick="return confirm('Are your sure?')">
                                      <i class="fa fa-trash" aria-hidden="true"></i></a>

                                    <button type="button" class="btn btn-primary" >
                                        <i class="fa fa-pencil"></i>
                                      </button>
                                      <button type="button" class="btn btn-danger">
                                          <i class="fa fa-trash" aria-hidden="true"></i>
                                      </button>
                                  </td>

                            </tr>
                          <?php
                        }

                    }else{
                      ?>
                        <tr>
                        <td scope="col">no data found</td>
                       </tr>
                      <?php

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
