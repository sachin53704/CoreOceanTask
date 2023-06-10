<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <body>

      <div class="container mt-2">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex justify-content-between">
                  <h5>Employee Add</h5>
                  <a href="{{url('employee/list')}}" class="btn btn-primary btn-sm">Back</a>
                </div>
              </div>
              <div class="card-body">
                  <div class="container">
                    <form action="{{url('employee/store')}}" method="post">
                      @csrf
                      <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" required>
                      </div>
                      <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" required>
                      </div>

                      <div class="form-group">
                        <label for="department">Department:</label>
                        <input type="text" class="form-control" id="department" placeholder="Enter department" name="department" required>
                      </div>

                      <table class="table">
                          <thead>
                            <tr>
                              <th>Net Salary</th>
                              <th>Deduction Salary</th>
                              <th>Action</th>
                            </tr>
                          </thead>
                          <tbody id="addMoreNetRow">
                            <tr id="row1">
                              <td><input type="text" name="net_salary[]" class="form-control" required /></td>
                              <td><input type="text" name="deduct_salary[]" class="form-control" required /></td>
                              <td><button type="button" id="addMoreRow" class="btn btn-primary btn-sm">+</td>
                            </tr>
                          </tbody>
                      </table>

                      <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
          
      </div>
      

      <script type="text/javascript">
        $(document).ready(function(){
          let count = 1;
          $('#addMoreRow').click(function(){
            count = count + 1;
            let html = `<tr id="row${count}">
                  <td><input type="text" name="net_salary[]" class="form-control" required /></td>
                  <td><input type="text" name="deduct_salary[]" class="form-control" required /></td>
                  <td><button type="button" class="btn btn-danger btn-sm removeRow" data-id="${count}">-</td>
                </tr>`;

            $('#addMoreNetRow').append(html)

          });

          $('body').on('click', '.removeRow', function(){
            let btnvalue = $(this).data('id');
            $('#row'+btnvalue).remove();
          })
        })
      </script>

  </body>
</html>
