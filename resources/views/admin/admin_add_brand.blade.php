<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Brand</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
    .tm-bg-primary-dark {
      background-color: #343a40;
      color: #fff;
    }

    .tm-block {
      padding: 30px;
      border-radius: 10px;
      margin-top: 20px;
    }

    .tm-block-title {
      font-size: 24px;
      margin-bottom: 20px;
    }

    .tm-product-img-dummy {
      width: 100%;
      height: 200px;
      background-color: #f8f9fa;
      border: 2px dashed #ccc;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .tm-upload-icon {
      font-size: 50px;
      color: #ccc;
      cursor: pointer;
    }
  </style>
</head>

<body>
  @include('admin.admin_header');
  @include('admin.admin_nav');
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-9 col-lg-10 col-md-12 col-sm-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Brand</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
              <form action="{{route('add_brand')}}" method="POST" enctype="multipart/form-data" class="tm-edit-product-form" id="brandForm">
                @csrf
                <div class="form-group mb-3">
                  <label for="name">Brand Name</label>
                  <input id="name" name="name" type="text" class="form-control validate" required>
                </div>
                <div class="form-group mb-3">
                  <label for="info">Brand Description</label>
                  <textarea class="form-control validate" id="info" name="info" rows="5" required></textarea>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('img').click();"></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="img" name="img" type="file" style="display:none;" accept=".png, .jpg, .jpeg" onchange="validateLogo(this)">
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD BRAND LOGO" onclick="document.getElementById('img').click();">
                </div>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Brand Now</button>
              </div>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2018</b> All rights reserved. Design: <a rel="nofollow noopener" href="https://templatemo.com"
          class="tm-footer-link">Template Mo</a>
      </p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    function validateLogo(input) {
      const file = input.files[0];
      const fileType = file.type.toLowerCase();
      if (!fileType.includes('image') || (fileType !== 'image/png' && fileType !== 'image/jpeg')) {
        alert('Please upload a valid image file (PNG, JPEG).');
        input.value = ''; // Clear the file input
      }
    }
  </script>
</body>

</html>
