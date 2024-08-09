<!DOCTYPE html>
<html lang="en">
  @include('admin.admin_header');

  <body id="reportsPage">
   @include('admin.admin_nav');
    <div class="container mt-5">
      <div class="row tm-content-row">
        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-products">
            <div class="tm-product-table-container">
              <table class="table table-hover tm-table-small tm-product-table">
                <thead>
                  <tr>
                    <th scope="col">&nbsp;</th>
                    <th scope="col">PRODUCT NAME</th>
                    <th scope="col">PRODUCT CODE</th>
                    <th scope="col">IN STOCK</th>
                    <th scope="col">  TYPE</th>
                    <th scope="col">&nbsp;</th>
                  </tr>
                </thead>

                <form method="GET" action="{{route('product.search')}}">
                    <div class="input-group mb-3">
                      <input type="text" class="form-control" name="product_code" placeholder="Ürün Kodu Girin" aria-label="Product Code" aria-describedby="button-addon2" required>
                      <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ara</button>
                      </div>
                    </div>
                  </form>


                <tbody>
                    @foreach ($products as $product)
                    <tr data-id="{{ $product->id }}">
                      <th scope="row"><input type="checkbox" /></th>
                      <td class="tm-product-name">{{ $product->model }}</td>
                      <td>{{ $product->product_code }}</td>
                      <td>{{ $product->stock }}</td>
                      <td>{{ $product->type }}</td>
                      <td>
                        <a href="{{ route('edit_product', ['id' => $product->id]) }}" class="tm-product-delete-link">
                          <img src="{{ asset('images/search.png') }}" class="tm-product-delete-icon" alt="Search Icon" />
                        </a>
                      </td>
                    </tr>
                    @endforeach
                    @foreach ($tshirts as $tshirt)
                    <tr data-id="">
                        <th scope="row"><input type="checkbox" /></th>
                        <td class="tm-product-name">{{ $tshirt->name }}</td>
                        <td> No Product Code</td>
                        <td>{{ $tshirt->stock }}</td>
                        <td>T-Shirt</td>
                        <td>
                          <a href="{{ route('edit_tshirt', ['id' => $tshirt->id]) }}" class="tm-product-delete-link">
                            <img src="{{ asset('images/search.png') }}" class="tm-product-delete-icon" alt="Search Icon" />
                          </a>
                        </td>
                      </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
              href="{{route('add_product')}}"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new product</a>
              <a
              href="{{route('add_tshirt')}}"
              class="btn btn-primary btn-block text-uppercase mb-3">Add new tshirt</a>
            <button class="btn btn-primary btn-block text-uppercase">
              Delete selected products
            </button>
          </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 tm-block-col">
          <div class="tm-bg-primary-dark tm-block tm-block-product-categories">
            <h2 class="tm-block-title">All Brands</h2>
            <div class="tm-product-table-container">
              <table class="table tm-table-small tm-product-table">
                <tbody>
                    @foreach($brands as $brand)
                    <tr>
                        <td class="tm-product-name">{{ $brand->name }}</td>
                       <!-- <td class="text-center">
                            <a href="#" class="tm-product-delete-link">
                                <i class="far fa-trash-alt tm-product-delete-icon"></i>     Marka yanlarına buton
                            </a>
                        </td> -->
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
            <!-- table container -->
            <a
            href="{{route('show_brand')}}"
            class="btn btn-primary btn-block text-uppercase mb-3">Add new Brand</a>
          </div>
        </div>
      </div>
    </div>
    <footer class="tm-footer row tm-mt-small">
      <div class="col-12 font-weight-light">
        <p class="text-center text-white mb-0 px-4 small">
          Copyright &copy; <b>2018</b> All rights reserved.

          Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
        </p>
      </div>
    </footer>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script>
        $(function() {
          $(".tm-product-name").on("click", function() {
            var productId = $(this).closest('tr').data('id');
            var url = "{{ route('edit_product', ['id' => '__ID__']) }}";
            url = url.replace('__ID__', productId);
            window.location.href = url;
          });
        });
      </script>
  </body>
</html>
