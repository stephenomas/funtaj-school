<body>
    <!-- Tab Mobile View Header -->
    <?php //include 'inc/mobile-header.php';
      $this->load->view('student/inc/mobile-header')
    ?>
    <!-- Tab Mobile View Header -->

    <!--  BEGIN NAVBAR  -->
    <?php //include 'inc/desk-header.php';
      $this->load->view('student/inc/desk-header')
    ?>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">
        <div class="overlay"></div>
        <div class="cs-overlay"></div>
        <div class="search-overlay"></div>

        <?php //include 'inc/navbar.php'; 
        $this->load->view('student/inc/navbar')
        ?>
        <!--  END TOPBAR  -->

        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="container">
                <div class="page-header">
                    <div class="page-title">
                        <h3>School Store</h3>
                    </div>
                </div>

                <div id="product-catalog-container" class="container">


                    <div class="row">
                        <?php foreach($products as $prod){ ?>
                        <a href="<?= site_url('student-portal/store/product-detail/'.$prod->id) ?>" class="col-xl-3 col-lg-6 col-md-6 col-sm-6 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area px-0 py-0 product-cat7">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="card">
                                                <div class="wrapper">
                                                    <div class="row">
                                                        <div class="col-xl-12 card-image mb-4">
                                                            <img alt="image-product" src="<?= base_url().$prod->product_image ?>" class="img-fluid">

                                                        </div>
                                                        <div class="col-xl-12 text-center">
                                                            <p class="card-cat"><?php 
                                                        $this->db->where('id', $prod->product_category);
                                                        $cat = $this->db->get('products_categories')->row();
                                                        echo  $cat->categories;
                                                        ?></p>
                                                            <h4 class="card-title"><?= $prod->product_name ?></h4>
                                                            <h3 class="card-pricing">₦ <?= number_format($prod->product_price) ?></h3>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                        <?php } ?>
                    </div>


                    <div class="widget-content widget-content- text-center">
                        <ul class="pagination pagination-style-5 pagination-rounded justify-content-center pagination-sm mb-5">
                            <li><a href="javascript:void(0);">&laquo;</a></li>
                            <li><a href="javascript:void(0);">1</a></li>
                            <li><a href="javascript:void(0);" class="active">2</a></li>
                            <li><a href="javascript:void(0);">3</a></li>
                            <li><a href="javascript:void(0);">4</a></li>
                            <li><a href="javascript:void(0);">5</a></li>
                            <li><a href="javascript:void(0);">&raquo;</a></li>
                        </ul>
                    </div>

                </div>

            </div>
        </div>
        <!--  END CONTENT PART  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!--  BEGIN FOOTER  -->
    <?php //include 'inc/footer.php';
      $this->load->view('student/inc/footer')
    ?>
    <!--  END FOOTER  -->

