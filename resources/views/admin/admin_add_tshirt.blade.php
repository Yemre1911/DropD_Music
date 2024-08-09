<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
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

    .variation-row {
      margin-bottom: 15px;
    }

    .variation-table td, .variation-table th {
      vertical-align: middle;
    }
  </style>
</head>

<body>
  @include('admin.admin_header')
  @include('admin.admin_nav')
  <div class="container tm-mt-big tm-mb-big">
    <div class="row">
      <div class="col-xl-12 mx-auto">
        <div class="tm-bg-primary-dark tm-block tm-block-h-auto">
          <div class="row">
            <div class="col-12">
              <h2 class="tm-block-title d-inline-block">Add Product</h2>
            </div>
          </div>
          <div class="row tm-edit-product-row">
            <div class="col-xl-12 col-lg-12 col-md-12">
              <form action="{{ route('tshirt.store') }}" method="POST" enctype="multipart/form-data" class="tm-edit-product-form" id="productForm">
                @csrf
                <div class="form-group mb-3">
                  <label for="name">Product Name</label>
                  <input id="name" name="name" type="text" class="form-control validate" required>
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
                  <label for="description">Product Description</label>
                  <textarea class="form-control validate" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="form-group mb-3">
                  <label for="base_price">Base Price (USD)</label>
                  <input id="base_price" name="base_price" type="number" class="form-control validate" required>
                </div>
                <!-- Variations Section -->
                <div class="form-group mb-3">
                  <label for="variations">Product Variations</label>
                  <table class="table table-bordered variation-table" id="variationsTable">
                    <thead>
                      <tr>
                        <th>Size</th>
                        <th>Color</th>
                        <th>Stock</th>
                        <th>Additional Price</th>
                        <th>Photo</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- Initial empty row for variations -->
                    </tbody>
                  </table>
                  <button type="button" class="btn btn-secondary" onclick="addVariation()">Add Variation</button>
                </div>

                <button type="submit" class="btn btn-primary btn-block text-uppercase">Add Product Now</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="tm-footer row tm-mt-small">
    <div class="col-12 font-weight-light">
      <p class="text-center text-white mb-0 px-4 small">
        Copyright &copy; <b>2024</b> All rights reserved.
      </p>
    </div>
  </footer>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    const sizes = ["XS", "S", "M", "L", "XL"];
    const colors = ["White", "Black", "Red", "Blue", "Grey"];

    function addVariation() {
      const tableBody = document.getElementById('variationsTable').getElementsByTagName('tbody')[0];
      const row = document.createElement('tr');
      row.className = 'variation-row';

      row.innerHTML = `
        <td>
          <select name="size[]" class="form-control">
            ${sizes.map(size => `<option value="${size}">${size}</option>`).join('')}
          </select>
        </td>
        <td>
          <select name="color[]" class="form-control">
            ${colors.map(color => `<option value="${color}">${color}</option>`).join('')}
          </select>
        </td>
        <td>
          <input name="stock[]" type="number" class="form-control" max="100" min="0">
        </td>
        <td>
          <input name="additional_price[]" type="number" class="form-control" step="0.01" min="0">
        </td>
        <td>
          <input name="photo[]" type="file" class="form-control-file" accept=".png, .jpg, .jpeg">
        </td>
        <td>
          <button type="button" class="btn btn-danger btn-sm" onclick="removeVariation(this)">Remove</button>
        </td>
      `;

      tableBody.appendChild(row);
    }

    function removeVariation(button) {
      const row = button.closest('tr');
      row.remove();
    }

    function validateMainImage(input) {
      if (input.files && input.files[0]) {
        const file = input.files[0];
        const fileType = file.type;
        const validImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!validImageTypes.includes(fileType)) {
          alert('Please select a valid image file (jpeg, jpg, png).');
          input.value = ''; // Clear the input
        }
      }
    }
  </script>
</body>

</html>
