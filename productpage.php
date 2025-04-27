<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <title class = "pageTitle">Product Page</title>
<style>
    /*Main Css*/
    body {
        background-color: #FFFFFF;
        color: #1d1d1d;
        margin: 0;
        border: 0;
        padding: 0;
        font-family: Arial, sans-serif;
        min-height: 100vh;
    }

    .container-fluid{
      gap: 2vw;
      padding-left: 2vw;
      padding-right: 2vw;
      margin-top: 3vh;
    }

    .img-fluid {
    object-fit: cover;
    height: 100%;
    transition: transform 0.3s ease-in-out;
    }

    .img-fluid:hover{
        transform: scale(1.05);
        cursor: zoom-in;
    }

    .accordion-spacing{
      margin-top: 1.5vh;
    }

    #sizes a {
        color: #000 !important;
        transition: all 0.2s ease-in-out;
    }

    #sizes a:hover {
    background-color: #000 !important;
    color: #FFFFFF !important;
    transform: translateY(-1px);
    }

    .size-button {
        display: flex;
        justify-content: center;
        align-items: center;
        flex: 1;
        margin: 0 0.5px;
        padding: 0.5rem;
        font-size: 1rem;
        background-color:rgb(255, 255, 255) !important;
        color: #000 !important;
    }

    .size-button:hover{
        background-color:rgb(241, 241, 241) !important;
        color: #1d1d1d!important;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        border-color: #000 !important;
    }

    input[name="options-size"]:checked + .size-button {
    background-color: #000 !important;
    color: white !important;
    }

    .addtoCart{
     background-color: #000;;
     color: #FFFFFF;
     font-weight: bold;
     font-size: larger;
     border: none;
     width: 70%;
     height: 7vh;
     border-radius: 0.75em;
    }
    .addtoCart:hover {
    background-color: #000 !important;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
    }
</style>
</head>
<body>
    <div class="container-fluid main">
        <div class="row row-cols-1 row-cols-lg-2 g-2">
            <div class="col-12 col-lg-9">
            <div class="row row-cols-1 row-cols-md-2 g-1">
                  <div class="col">
                    <img src="kai1.jpg" class="img-fluid" alt="imaj1">
                  </div>
                  <div class="col">
                    <img src="kai2.jpg" class="img-fluid" alt="imaj2">
                  </div>
                  <div class="col">
                     <img src="kai3.jpg" class="img-fluid" alt="imaj3">
                  </div>
                  <div class="col">
                    <img src="kai4.jpg" class="img-fluid" alt="imaj4">
                  </div>
            </div>
            </div>

            <div class="col-12 col-lg-3" id = "productDesc">
                <div class ="productDesc">
                    <div class = "productTitle">
                        <h3><i>Basketball</i></h3>
                        <h3><strong>Kaiju 1</strong></h3>
                    </div>

                    <div class = "productPriceSize">
                        <h4><strong>Php 5,400</strong></h4>
                    </div>

                    <p class = "productText">
                        A Kai-ju Sotto Type of Footwear that makes you become the Monster that Kai Sotto the G.O.A.T is!
                    </p><br>

                    <div class="row row-cols-2">
                        <div class="col-8">
                            <p> Sizes </p>
                        </div>
                        <div class="col-4">
                            <div class="d-flex align-items-center" id = "sizes">
                            <i class="material-icons me-2">
                                straighten
                            </i>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#sizeGuideModal">
                            Size Guide
                            </a>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-3 g-2">
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option5" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option5">8</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option6" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option6">8.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option7" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option7">9</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option8" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option8">9.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option9" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option9">10</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option10" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option10">10.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option11" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option11">11</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option12" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option12">11.5</label>
                        </div>
                        <div class="col">
                            <input type="radio" class="btn-check" name="options-size" id="option13" autocomplete="off">
                            <label class="btn btn-outline-secondary size-button" for="option13">12</label>
                        </div>
                    </div>

                    <br>

                    <button class="btn btn-primary btn-lg addtoCart" data-bs-toggle="modal" data-bs-target="#addCartModal">Add To Cart</button>

                    
                    <div class="accordion accordion-spacing accordion-flush" id="accordionExample">
                        <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            Details
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <div class="row row-cols-2">
                                    <div class="col">
                                        <ul class="list-group">
                                            <li>Model: Kaiju 1</li>
                                            <li>Color: Colorful</li>
                                            <li>Material: Premium Leather + Rubber</li>
                                            <li>Weight: 450 grams</li>
                                        </ul>
                                    </div>
                                    <div class="col">
                                        <ul class="list-group">
                                            <li>Cushioning: Air Unit</li>
                                            <li>Traction: Rubber Outsole</li>
                                            <li>Support: High Ankle</li>
                                            <li>Technology: Impact Protection</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </div>
<div class="modal fade" id="addCartModal" tabindex="-1" aria-labelledby="addCartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCartModalLabel"><i class="bi bi-cart-check"></i> Item Added to Cart</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row align-items-center">
                    <div class="col-md-4">
                        <img src="kai1.jpg" alt="Product" class="img-fluid rounded">
                    </div>
                    <div class="col-md-8">
                        <h5>Kaiju 1</h5>
                        <p>Php 5,400</p>
                        <p>Size: <span id="selected-size"></span></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Continue Shopping</button>
                <a href="cart.html" type="button" class="btn btn-primary">View Cart</a>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="sizeGuideModal" tabindex="-1" aria-labelledby="sizeGuideModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sizeGuideModalLabel"><i class="material-icons me-2">straighten</i>Size Guide</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>US</th>
                            <th>EU</th>
                            <th>Length (cm)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>8</td>
                            <td>41</td>
                            <td>27</td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td>43</td>
                            <td>28.5</td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td>45</td>
                            <td>30</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const modal = new bootstrap.Modal('#addCartModal');
    
    document.querySelector('.addtoCart').addEventListener('click', () => {
        const selectedSize = document.querySelector('input[name="options-size"]:checked')?.nextElementSibling?.textContent || '';
        document.getElementById('selected-size').textContent = selectedSize;
        modal.show();
    });
});
</script>
</body>
</html>