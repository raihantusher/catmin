<div class="container-fluid">
  <div class="col">
    <div class="row justify-content-center">

      <div class="card">
          <div class="card-body">
            <div class="d-flex docs-highlight mb-3">
                <div class="mr-auto p-2 docs-highlight">Flex item</div>
                
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
                    if(count($course) > 0){
                        foreach ($course as $row) {
                          ?>
                            <tr>
                                <td><?php echo $row->course_title ?></td>
                                <td><?php echo $row->course_description ?></td>
                                <td><?php echo $row->course_tag ?> </td>
                                <td><?php echo $row->date ?> </td>
                                <td>
                                    <button type="button" class="btn btn-primary">
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
<ul class="pagination">
<li class="page-item">
<a class="page-link" href="#">Prev</a>
</li>
<li class="page-item active">
<a class="page-link" href="#">1</a>
</li>
<li class="page-item">
<a class="page-link" href="#">2</a>
</li>
<li class="page-item">
<a class="page-link" href="#">3</a>
</li>
<li class="page-item">
<a class="page-link" href="#">4</a>
</li>
<li class="page-item">
<a class="page-link" href="#">Next</a>
</li>
</ul>
</div>


      </div>
    </div>
  </div>
</div>
