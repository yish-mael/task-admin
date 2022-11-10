
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

        <div class="col-md-3"></div>
        <div class="col-md-6 mt-5">

            <span id="error" class="text-danger"></span>
            <span id="success" class="text-success"></span>

            <form id="createForm" onsubmit="return updateTask(event)">
                @csrf

                <div class="row p-3">
                    <div class="col-md-8">
                        <label >Title: </label> <br/>
                        <input id="title" type="text" class="form-control" name="title" required/>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-6">
                        <label >Status: </label> <br/>
                        <select name="status" class="form-control" id="status" required>
                            <option value="Pending">Pending</option>
                            <option value="Completed">Completed</option>
                        </select>
                    </div>
                </div>
                <div class="row p-3">
                    <div class="col-md-8">
                        <label >Description: </label> <br/>
                        <textarea id="description" class="form-control" name="description" cols="30" rows="4"></textarea>
                    </div>
                </div>

                <div class="p-3">
                    <a href="{{ url('/') }}" class="btn btn-danger btn-sm">Back</a>
                    &nbsp; &nbsp; &nbsp; &nbsp;
                    <button class="btn btn-dark btn-sm" type="submit" >Save</button>
                </div>
            </form>

        </div>
        <div class="col-md-3"></div>

      </div>

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!-- <script src="./assets/js/jquery-3.2.1.slim.min.js"></script> -->
    <script src="{{ asset('/assets/js/jquery-3.6.1.min.js') }}"></script>
    <script src="{{ asset('/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>

    <script>

        // Get editable task
        $(document).ready(function(){
            $.ajax({
                    url: "http://127.0.0.1:8000/api/tasks/"+$(location).attr("href").split('/').pop(),
                    success: function(result){
                        $("#title").val(result.title);
                        $("#status").val(result.status);
                        $("#description").val(result.description);
                        console.log(result);
                    }
                });
        });

        // Update Task
        function updateTask(e){
            e.preventDefault();

            // console.log(e);

            const createObj = {
                title: e.target.elements.title.value,
                status: e.target.elements.status.value,
                description: e.target.elements.description.value,
            }

            // console.log(createObj);

            $.ajax({
                type: "PUT",
                url: "http://127.0.0.1:8000/api/tasks/"+$(location).attr("href").split('/').pop(),
                data: createObj,
                dataType: "json",
                success: function(result){
                    $("#error").text("");
                    $("#success").text("Successfully Updated Task.");
                },
                error: function(error){
                    $("#success").text("");
                    $("#error").text("An Error Occured");
                }
            });
        }

    </script>

  </body>
</html>
