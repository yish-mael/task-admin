
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Tasks Admin System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/assets/css/bootstrap.min.css') }}" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0 font-weight-light" href="#">Tasks Admin</a>
    </nav>

    <div class="container">
      <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8 mt-5">

            <a href="{{ url('/create') }}" class="btn btn-dark btn-sm">Create Task</a>
            <br>
            <br>

            <table class="table table-bordered table-sm">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="result">

                </tbody>
            </table>
        </div>
        <div class="col-md-2"></div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="/assets/js/jquery-3.2.1.slim.min.js"></script> -->
    <script src="{{ asset('/assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script>

        // Get all tasks
        $(document).ready(function(){
            $.ajax({
                url: "http://127.0.0.1:8000/api/tasks",
                success: function(result){
                for (let i = 0;  i < result.length;  i++){
                    $("#result").append("<tr> <td>"+result[i].id+"</td> <td>"+result[i].title+"</td> <td>"+result[i].status+"</td> <td>"+result[i].description+"</td> <td><a class='btn btn-sm btn-warning' href='/edit/"+result[i].id+"'>Edit</a> - <button class='btn btn-sm btn-danger' onclick='return deleteTask("+result[i].id+")' >Delete</button></td> </tr>");
                }
                //console.log(result);
            }});
        });


        // Delete Task
        function deleteTask(taskId){

            // console.log(createObj);

            $.ajax({
                type: "DELETE",
                url: "http://127.0.0.1:8000/api/tasks/"+taskId,
                success: function(result){
                    location.reload();
                    console.log(result);
                }
            });
        }



    </script>

  </body>
</html>
