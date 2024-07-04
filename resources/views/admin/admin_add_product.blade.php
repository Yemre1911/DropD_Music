

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="jquery-ui-datepicker/jquery-ui.min.css">
  <style>
    /* Custom CSS */
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

    .tm-edit-product-row {
      margin-top: 30px;
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
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-6 col-lg-6 col-md-12">
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" class="tm-edit-product-form" id="productForm">
                    @csrf
                <div class="form-group mb-3">
                  <label for="model">Model</label>
                  <input id="model" name="model" type="text" class="form-control validate" required>
                </div>
                <div class="form-group mb-3">
                  <label for="price">Price (USD)</label>
                  <input id="price" name="price" type="number" class="form-control validate" required>
                </div>
                <div class="form-group mb-3">
                  <label for="brand">Brand</label>
                  <select class="custom-select" id="brand" name="brand" required>
                    <option value="">Select brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{$brand->name}}">{{$brand->name}}</option>
                        @endforeach
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="type">Type</label>
                  <select class="custom-select" id="type" name="type" required>
                    <option value="">Select type</option>
                    <option value="Electric Guitar">Electric Guitar</option>
                    <option value="Acoustic Guitar">Acoustic Guitar</option>
                    <option value="Amplifier">Amplifier</option>
                    <!-- Add other types -->
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="symmetry">Symmetry</label>
                  <select class="custom-select" id="symmetry" name="symmetry" required>
                    <option value="">Select symmetry</option>
                    <option value="Right-Handed">Right-Handed</option>
                    <option value="Left-Handed">Left-Handed</option>
                    <option value="Doesn't Matter">Doesn't Matter</option>
                  </select>
                </div>
                <div class="form-group mb-3">
                  <label for="features">Features</label>
                  <textarea class="form-control validate" id="features" name="features" rows="3" required></textarea>
                </div>

                <div class="form-group mb-3">
                  <label for="stock">Units In Stock</label>
                  <input id="stock" name="stock" type="number" class="form-control validate" required>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6 col-md-12 mx-auto mb-4">
                <div class="tm-product-img-dummy mx-auto">
                  <i class="fas fa-cloud-upload-alt tm-upload-icon" onclick="document.getElementById('main_image').click();"></i>
                </div>
                <div class="custom-file mt-3 mb-3">
                  <input id="main_image" name="main_image" type="file" style="display:none;" accept=".png, .jpg, .jpeg" onchange="validateMainImage(this)">
                  <input type="button" class="btn btn-primary btn-block mx-auto" value="UPLOAD PRODUCT IMAGE" onclick="document.getElementById('main_image').click();">
                </div>
                <div class="mb-3">
                  <label for="extra_images">Extra Images (Max 4)</label>
                  <input id="extra_images" name="extra_images[]" type="file" class="form-control-file" multiple accept=".png, .jpg, .jpeg" onchange="validateExtraImages(this)">
                </div>
              </div>
              <div class="col-12">
                <div class="form-group mb-3">
                  <label for="color">Color</label>
                  <select class="custom-select" id="color" name="color" required>
                    <option value="">Select color</option>
                    <option value="Black">Black</option>
                    <option value="White">White</option>
                    <option value="Red">Red</option>
                    <option value="Blue">Blue</option>
                    <option value="Gray">Gray</option>
                    <option value="Green">Green</option>
                    <option value="Brown">Brown</option>
                    <option value="Orange">Orange</option>
                    <option value="Yellow">Yellow</option>
                    <!-- Add other colors -->
                  </select>
                </div>
                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </div>
            </form>     <!-- FROM BİTİŞİ -->
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
  <script src="jquery-ui-datepicker/jquery-ui.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(function () {
      $("#expire_date").datepicker();
    });

    function validateMainImage(input) {
      const file = input.files[0];
      const fileType = file.type.toLowerCase();
      if (!fileType.includes('image') || (fileType !== 'image/png' && fileType !== 'image/jpeg')) {
        alert('Please upload a valid image file (PNG, JPEG).');
        input.value = ''; // Clear the file input
      }
    }

    function validateExtraImages(input) {
      const files = input.files;
      const allowedTypes = ['image/png', 'image/jpeg'];
      const maxFiles = 4;

      for (let i = 0; i < files.length; i++) {
        const fileType = files[i].type.toLowerCase();
        if (!allowedTypes.includes(fileType)) {
          alert('Please upload only PNG or JPEG images.');
          input.value = ''; // Clear the file input
          return;
        }
      }

      if (files.length > maxFiles) {
        alert(`You can upload a maximum of ${maxFiles} images.`);
        input.value = ''; // Clear the file input
      }
    }
  </script>
</body>

</html>
