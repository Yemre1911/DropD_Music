<!DOCTYPE html>
<html lang="en">

@include('admin.admin_header');

<style>
    .brand-img {
        width: 90%;  /* %100 genişlikte olmasını sağlar */
        max-width: 75px;  /* Maksimum genişliği belirler */
        height: auto;  /* Orantılı olarak yüksekliği ayarlar */
        object-fit: cover;  /* Görselin kutuya sığmasını sağlar, keserek */
        display: block;  /* Görselin bir blok eleman olmasını sağlar */
        margin: 0 auto;  /* Ortalar */
    }
    </style>

<body id="reportsPage">
    <div class="" id="home">
        @include('admin.admin_nav');
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-white mt-5 mb-5">Welcome back, <b>Admin</b></p>
                </div>
            </div>
            <!-- row -->
            <div class="row tm-content-row">
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Total Reports</h2>
                        <div class="tm-notification-items">

                        <div class="media tm-notification-item">
                            <div class="media-body">
                                <p class="mb-2"><b>Total User: {{$users->count()}}</b></p>
                                <span class="tm-small tm-text-color-secondary">There are {{$users->count()}} accounts in Drop-D</span>
                            </div>
                        </div>

                        <div class="media tm-notification-item">
                            <div class="media-body">
                                <p class="mb-2"><b>Total Products: {{$products->count()}}</b></p>
                                <span class="tm-small tm-text-color-secondary">There are {{$products->count()}} products in Drop-D</span>
                            </div>
                        </div>

                        <div class="media tm-notification-item">
                            <div class="media-body">
                                <p class="mb-2"><b>Total Brands: {{$brands->count()}}</b></p>
                                <span class="tm-small tm-text-color-secondary">There are {{$brands->count()}} brands in Drop-D</span>
                            </div>
                        </div>

                        <div class="media tm-notification-item">
                            <div class="media-body">
                                @php
                                    $totalIncome = 0;
                                    foreach ($orders as $order) {
                                        $totalIncome += $order->total_amount;
                                    }
                                @endphp
                                <p class="mb-2"><b>Total Orders And Income: {{$orders->count()}} = ${{$totalIncome}} </b></p>
                                <span class="tm-small tm-text-color-secondary">We have made ${{$totalIncome}} dollars total with Drop-D</span>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block">
                        <h2 class="tm-block-title">Out Of Stock</h2>
                        <div class="tm-notification-items">

                        @foreach ($products as $product)

                        @if ($product->stock ==0)

                        <div class="media tm-notification-item">
                            <div class="brand-img"><img src=" {{ asset('storage/' . $product->main_image) }} " alt="Avatar Image" class="brand-img"></div>
                            <div class="media-body">
                                <p class="mb-2"><b>{{$product->model}}</b></p>
                                <span class="color" style="color: red; font-weight: bold;">Out of Sotck</span>
                                <span class="tm-small tm-text-color-secondary">{{$product->updated_at}}</span>
                            </div>
                        </div>

                        @endif


                        @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Products With Low tock</h2>
                        <div class="tm-notification-items">
                            @foreach ($products as $product)

                            @if ($product->stock <=5 && $product->stock > 0 )

                            <div class="media tm-notification-item">
                                <div class="brand-img"><img src=" {{ asset('storage/' . $product->main_image) }} " alt="Avatar Image" class="brand-img"></div>
                                <div class="media-body">
                                    <p class="mb-2">{{$product->model}}</p>
                                    <p class="mb-2">Only <b>{{$product->stock}} Left in Stock</b></p>
                                    <span class="tm-small tm-text-color-secondary">{{$product->updated_at}}</span>
                                </div>
                            </div>

                            @endif


                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-overflow">
                        <h2 class="tm-block-title">Notification List</h2>
                        <div class="tm-notification-items">




                        </div>
                    </div>
                </div>
                <div class="col-12 tm-block-col">
                    <div class="tm-bg-primary-dark tm-block tm-block-taller tm-block-scroll">


                        <h2 class="tm-block-title">Orders List</h2>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ORDER NO.</th>
                                    <th scope="col">STATUS</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col">LOCATION</th>
                                    <th scope="col">TOTAL ITEM</th>
                                    <th scope="col">START DATE</th>
                                    <th scope="col">ORDER TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)

                                <tr>
                                    <th scope="row"><b>{{$order->order_no}}</b></th>
                                    <td>
                                        <div class="tm-status-circle moving">
                                        </div>{{$order->status}}
                                    </td>
                                    <td><b>{{$order->user->email}}</b></td>
                                    <td><b>{{$order->location}}</b></td>
                                    <td><b>{{$order->orderItems->count()}} Products</b></td>
                                    <td>{{$order->created_at}}</td>
                                    <td>${{$order->total_amount}}</td>
                                </tr>

                                @endforeach

                            </tbody>
                        </table>
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
    </div>

    <script src="js/jquery-3.3.1.min.js"></script>
    <!-- https://jquery.com/download/ -->
    <script src="js/moment.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="js/Chart.min.js"></script>
    <!-- http://www.chartjs.org/docs/latest/ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- https://getbootstrap.com/ -->
    <script src="js/tooplate-scripts.js"></script>
    <script>
        Chart.defaults.global.defaultFontColor = 'white';
        let ctxLine,
            ctxBar,
            ctxPie,
            optionsLine,
            optionsBar,
            optionsPie,
            configLine,
            configBar,
            configPie,
            lineChart;
        barChart, pieChart;
        // DOM is ready
        $(function () {
            drawLineChart(); // Line Chart
            drawBarChart(); // Bar Chart
            drawPieChart(); // Pie Chart

            $(window).resize(function () {
                updateLineChart();
                updateBarChart();
            });
        })
    </script>
</body>

</html>
