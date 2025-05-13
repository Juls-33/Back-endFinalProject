<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Header and Footer -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"/>
    <script src="../assets/js/user.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet"/>    
    <!-- <link rel="stylesheet" href="../assets/css/user.css"/> -->
    <link rel="stylesheet" href="../HEADER/FOOTER/header-footer.css"/>
    <link rel="stylesheet" href="productpage.css">
    <link rel="stylesheet" href="userTest.css">
     <link rel="stylesheet" href="../header-footer/header-footer.css">
    <link rel="stylesheet" href="../assets/swal/sweetalert2.min.css">
    <script src="../assets/swal/sweetalert2.min.js"></script>
    <style>
        .accordion{
            display:flex;
            flex-direction:column;
            justify-content:center;
            margin-left:12%;
            margin-bottom:2%;
        }
            
        .text-large{
            font-size: 0.6em;
        }

        .customer_support{
            display: grid;
            margin: auto;
            width: 60%;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            padding:1rem;
        }

        .customer_support h3{
            grid-column: span 2;
            padding-left: 2.5%;
        }

        .customer_support ul {
            list-style-type: none;
            padding-left: 10%;
        }

        .customer_support button {
            margin-left: 40%;
            margin-top: -1.5rem;
            width: 50%;
            height:50%;
            border-radius: 0;
            justify-self: center; 
            align-self: center; 
        }     
    </style>
</head>
    <header>
        <?php include('../header-footer/header.php'); ?>
    </header>
    <body>

        <main>
            <h1 style = "padding: 3%">Frequently Asked Questions</h1>
            <div class="accordion accordion-flush  w-100 " id="accordionFAQ" style="max-width: 80%;" >
                <div class="accordion-item">
                    <h2 class="accordion-header">
                        <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            How Do I Return (parts) of My Order?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            If you’re not completely satisfied with your purchase, you can return items within the specified return period. Our return policy covers defective products, incorrect sizes, and items that do not match the product description. To initiate a return, fill out the return request form on our website or contact our customer service team. You will receive instructions on how to package the item and where to send it. Please ensure the items are in their original condition, unworn, and with tags attached.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Specifications for a Refund
                    </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Refunds are processed once the returned items are inspected and verified. If approved, the refund will be issued via the original payment method within 7-10 business days. Refunds are available for items returned within the designated period and meeting our return criteria, such as being in unused condition with all original tags. Shipping fees are non-refundable unless the item received was damaged or incorrect.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large " type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        How Long Does Delivery Take
                    </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Delivery times vary based on your location and the shipping method selected at checkout. Standard delivery typically takes 3-7 business days within the domestic region, while international shipping can take 10-20 business days. You will receive a confirmation email with tracking information once your order has been dispatched. Delays may occur during peak seasons or due to external factors such as weather conditions.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                        Reasons for Order Cancellation
                    </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Your order may be canceled for several reasons, including payment failure, stock unavailability, or discrepancies in your shipping address. If your order is canceled, you will receive an email notification with details. In cases where your payment has been processed, a full refund will be issued. You may also choose to cancel your order voluntarily if it has not yet been shipped.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                        Can I Cancel Orders Before They Are Out for Delivery?
                    </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Yes, you can cancel your order as long as it has not been processed for shipping. To do so, visit your order history in your Lesanshoes account and select the cancellation option. If your order is already marked as "Shipped," cancellation is no longer possible, and you will need to initiate a return once the item arrives.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                        Accepted Payment Methods
                    </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                        Lesanshoes accepts major credit and debit cards, including Visa, MasterCard, and American Express. We also support digital payment options such as PayPal and Apple Pay. Please ensure that your payment information is accurate to avoid transaction delays.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                        What if I Receive a Damaged or Incorrect Item
                    </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            If your item arrives damaged or differs from what you ordered, contact us within 7 days of receiving the package. Provide photos of the item and your order details to expedite the resolution process. We will offer a replacement, exchange, or full refund, depending on your preference.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                        Do You Ship Internationally?
                    </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Yes, Lesanshoes ships worldwide. International shipping rates and delivery times vary based on the destination and shipping method chosen. Please note that customs fees or import taxes may apply, which are the buyer's responsibility.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                        Size Guide and Product Fit
                    </button>
                    </h2>
                    <div id="collapseNine" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Our size guide is available on each product page to help you select the correct size. We recommend measuring your foot length and referring to our chart for accurate sizing. If you are between sizes, choose the larger size for added comfort.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                        How Do I Change My Shipping Address
                    </button>
                    </h2>
                    <div id="collapseTen" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            If you need to update your shipping address after placing an order, visit your account dashboard and select the order you want to modify. Changes can only be made if the order has not yet been processed for shipment.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                        Product Care Instructions
                    </button>
                    </h2>
                    <div id="collapseEleven" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            To keep your Lesanshoes looking their best, follow our care instructions included with each product. Depending on the material, you may need specific cleaning products or techniques. Regular maintenance will help extend the life of your footwear.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                        My Account: Registration and Login Issues
                    </button>
                    </h2>
                    <div id="collapseTwelve" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            If you’re having trouble accessing your account, try resetting your password using the "Forgot Password" link on the login page. For registration issues, ensure all required fields are filled out correctly. Contact customer support if you continue to experience difficulties.
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-large" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                        Company Information
                    </button>
                    </h2>
                    <div id="collapseThirteen" class="accordion-collapse collapse" data-bs-parent="#accordionFAQ">
                        <div class="accordion-body">
                            Lesanshoes is dedicated to providing stylish, high-quality footwear for every occasion. Our products are crafted with comfort and durability in mind, and we are committed to sustainable practices in our production processes. For more information about our story, mission, or to contact our support team, visit our "About Us" page.
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="customer_support border solid">
                <h3>Customer Support</h3>
                <ul>
                    <li>Facebook: </li>
                    <li>Instagram: </li>
                    <li>Email: </li>
                    <li>Contact Number: </li>
                </ul>
                <button type="button" class="mbtn border solid">Contact Us</button>
            </div>
        </main>
        <!-- Footer -->
        <br> <br>
   <?php include('modals.php'); ?>
<?php include('../header-footer/footer.php'); ?>

        <script src="productsPageMiddleware.js"></script>
        <script src="ppageMiddleware.js"></script>
        <script src="orderDetailsMiddleware.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>