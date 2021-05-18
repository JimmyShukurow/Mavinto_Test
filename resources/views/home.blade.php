<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

    <title>Mivento Assessment</title>

    <style>
      .row {
        margin-top: 2rem !important;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-5">
          <div class="alert alert-danger"></div>
          <div class="alert alert-success"></div>
          <form id="importForm" class="needs-validation" action="{{route("import-data-toDb")}}" method="POST" novalidate enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="campaign-name" class="form-label">Kampanya Adı</label>
              <input type="text" class="form-control" id="campaign-name" required />
            </div>
            <div class="mb-3">
              <select class="form-select" required>
                <option selected disabled value="">Tarih Seçin</option>
                <option value="2020-06">Haziran 2020</option>
                <option value="2020-07">Temmuz 2020</option>
                <option value="2020-08">Ağustos 2020</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="campaignFile" class="form-label">Dosya Yükleyin</label>
              <input class="form-control" type="file" id="campaignFile" name="campaignFile" required />
            </div>
            <div class="d-grid">
              <button class="btn btn-primary btn-block" type="submit">Yükle</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <!-- Option 2: Separate Popper and Bootstrap JS and Jquery :)-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    <!-- Example starter JavaScript for disabling form submissions if there are invalid fields -->
    <script>
      (function () {
        'use strict';

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation');

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }

              form.classList.add('was-validated');
            }, false);
          });
    
      })();
    </script>
    {{-- <script>

       $.ajaxSetup({
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
      $("#importForm").on('submit',function (e) { 
          e.preventDefault();
          

          var formData = { filename: $("#campaignFile").val()};

          $.ajax({
            type: "POST",
            url: "{{route('import-data-toDb')}}",
            data: $("#importForm").serialize(),
            dataType: "json",
            success: function (response) {
              $(".alert-success").html(response.success);
            }
          });
      });
</script> --}}
  </body>
</html>