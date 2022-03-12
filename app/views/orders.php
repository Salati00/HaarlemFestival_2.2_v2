<?php
require APPROOT . '/views/includes/head.php';
?>
        <div class="col-lg-4">

            <!-- Card -->
            <div class="card mb-4">
                <div class="card-body">

                    <h5 class="mb-3">The total amount of</h5>

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0">
                            Temporary amount
                            <span>$53.98</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center px-0">
                            Shipping
                            <span>Gratis</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                            <div>
                                <strong>The total amount of</strong>
                                <strong>
                                    <p class="mb-0">(including VAT)</p>
                                </strong>
                            </div>
                            <span><strong>$53.98</strong></span>
                        </li>
                    </ul>

                    <button type="button" class="btn btn-primary btn-block waves-effect waves-light">Make purchase</button>

                </div>
            </div>
            <div class="card mb-4">
                <div class="card-body">

                    <a class="dark-grey-text d-flex justify-content-between" data-toggle="collapse" href="#collapseExample"
                       aria-expanded="false" aria-controls="collapseExample">
                        Add a discount code (optional)
                        <span><i class="fas fa-chevron-down pt-1"></i></span>
                    </a>

                    <div class="collapse" id="collapseExample">
                        <div class="mt-3">
                            <div class="md-form md-outline mb-0">
                                <input type="text" id="discount-code" class="form-control font-weight-light"
                                       placeholder="Enter discount code">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>


</section>



<?php
require APPROOT . '/views/includes/footer.php';
?>

