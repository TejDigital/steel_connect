<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/a1abbb321b.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="./js/main.js"></script>
<script src="js/fancybox.min.js"></script>
<script>
    $("#booked").on("click", function(e) {
        e.preventDefault();

        var formData = $("#ticketForm").serialize();
        var amount = $("#amt").val(); // Get the amount from the form
        var name = $("#name").val(); // Get the name from the form
        var email = $("#email").val(); // Get the email from the form
        var contact = $("#number").val(); // Get the contact from the form
        var tic_number = $("#tic_number").val(); // Get the ticket number from the form

        if (name.trim() !== "" && email.trim() !== "" && contact.trim() !== "") {

            $.ajax({
                method: "POST",
                url: "./admin/ticket_booking.php",
                data: formData,
                success: function(response) {
                    if (response === "success") {
                        // Form submission was successful, proceed to Razorpay payment

                        // Razorpay options
                        var options = {
                            "key": "rzp_live_zTT9YMlkQS43qv",
                            "amount": 1 * 100,
                            "currency": "INR",
                            "name": "Steel Connect",
                            "description": "Test Transaction",
                            "image": "../images/logo_1.svg",
                            "handler": function(response) {
                                // Handle the successful payment here
                                var paymentId = response.razorpay_payment_id;
                                // You can send the payment ID to your server for further processing
                                // console.log("Payment successful with ID: " + paymentId);
                                // Display a success message to the user
                                window.alert("Payment successful with ID: " + paymentId + "Check Your Mail For Your Ticket Detail");

                                $.ajax({
                                    method: "POST",
                                    url: "./admin/ticket_booking.php",
                                    data: {
                                        payment_id: paymentId
                                    },
                                    success: function(processResponse) {
                                        // console.log("Payment processed on the server:", processResponse);
                                        $.ajax({
                                            method: "POST",
                                            url: "./admin/receipt.php", // Replace with the URL to your payment processing script
                                            data: {
                                                payment_id: paymentId
                                            },
                                            success: function(NewResponse) {
                                                if(NewResponse == "success"){
                                                    console.log("Email Send:");
                                                }else{
                                                    console.log("Email Not send :");
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                console.error("Payment processing error:", xhr.responseText);
                                            }
                                        });
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Payment processing error:", xhr.responseText);
                                    }
                                });
                                // window.location.href = "./admin/receipt.php";

                            },
                            "prefill": {
                                "name": name,
                                "email": email,
                                "contact": contact
                            },
                            "notes": {
                                "ticketNumber": tic_number,
                                "tol_price": amount
                            }
                        };

                        var rzp1 = new Razorpay(options);

                        // Open the Razorpay payment modal
                        rzp1.open();
                    } else {
                        // Form submission failed
                        window.alert("failed. Try again.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
            clearInput();
        } else {
            window.alert('all fields are required')
        }
        // Reset the form
    });

    function clearInput() {
        document.getElementById('ticketForm').reset();
    }

    // $("#booked").on("click", function(e) {
    //     e.preventDefault();

    //     var formData = $("#ticketForm").serialize();
    //     var amount = $("#amt").val(); // Get the amount from the form
    //     var name = $("#name").val(); // Get the name from the form
    //     var email = $("#email").val(); // Get the email from the form
    //     var contact = $("#number").val(); // Get the contact from the form
    //     var tic_number = $("#tic_number").val(); // Get the ticket number from the form

    //     $.ajax({
    //         method: "POST",
    //         url: "./admin/ticket_booking.php",
    //         data: formData,
    //         success: function(response) {
    //             if (response === "success") {
    //                 // Form submission was successful, proceed to Razorpay payment

    //                 // Razorpay options
    //                 var options = {
    //                     "key": "rzp_test_XDMvHbISe3Ffrd",
    //                     "amount": amount * 100,
    //                     "currency": "INR",
    //                     "name": "Steel Connect",
    //                     "description": "Test Transaction",
    //                     "image": "../images/logo_1.svg",
    //                     "handler": function(response) {
    //                         $.ajax({
    //                             method: "POST",
    //                             url: "./admin/ticket_booking.php",
    //                             data: "payment_id"=+presponse.razorpay_payment_id,
    //                             success: function(response) {
    //                                      // Handle the successful payment here
    //                         var paymentId = response.razorpay_payment_id;
    //                         // You can send the payment ID to your server for further processing
    //                         console.log("Payment successful with ID: " + paymentId);
    //                         // Display a success message to the user
    //                         window.alert("Payment successful with ID: " + paymentId);
    //                                 "prefill": {
    //                         "name": name,
    //                         "email": email,
    //                         "contact": contact
    //                     },
    //                     "notes": {
    //                         "ticketNumber": tic_number,
    //                         "tol_price": amount
    //                     }
    //                             }
    //                         });

    //                     },

    //                 };

    //                 var rzp1 = new Razorpay(options);

    //                 // Open the Razorpay payment modal
    //                 rzp1.open();
    //             } else {
    //                 // Form submission failed
    //                 window.alert("failed. Try again.");
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });

    //     // Reset the form
    //     clearInput();
    // });

    // function clearInput() {
    //     document.getElementById('ticketForm').reset();
    // }







    // document.getElementById('booked').onclick = function(e) {
    //     rzp1.open();

    //     $(document).ready(function() {
    //         $("#ticketForm").submit(function(event) {
    //             event.preventDefault(); 
    //             var formData = $(this).serialize();
    //             // console.log(formData);
    //             $.ajax({
    //                 type: "POST",
    //                 url: "./admin/ticket_booking.php", 
    //                 data: formData,
    //                 success: function(response) {
    //                     if (response === "success") {
    //                         // $("#responseMessage").html("Way to Payment");
    //                         window.alert('Way to Payment');
    //                         var options = {
    //                             "key": "rzp_test_XDMvHbISe3Ffrd", 
    //                             "amount": "50000", 
    //                             "currency": "INR",
    //                             "name": "Steel Connect",
    //                             "description": "Test Transaction",
    //                             "image": "../images/logo_1.svg",
    //                         };
    //                         var rzp1 = new Razorpay(options);
    //                     } else {
    //                         // $("#responseMessage").html("Failed. Try Again");
    //                         window.alert("Failed. Try Again");
    //                     }
    //                 }
    //             });
    //             clearInput();
    //         });
    //     });
    // };
    // let form1 = document.getElementById('ticketForm');

    // function clearInput() {
    //     form1.reset();
    // }


    // $("#booked").on("click", function(e) {
    //     e.preventDefault();

    //     var formData = $("#ticketForm").serialize();

    //     var amount = $("#amt").val(); // Get the amount from the form
    //     var name = $("#name").val(); // Get the name from the form
    //     var email = $("#email").val(); // Get the email from the form
    //     var contact = $("#number").val(); // Get the contact from the for
    //     var contact = $("#tic_number").val(); // Get the contact from the for
    //     var tic_number = $("#number").val(); // Get the contact from the for
    //     // console.log(formData);

    //     $.ajax({
    //         method: "POST",
    //         url: "./admin/ticket_booking.php",
    //         data: formData,
    //         success: function(response) {
    //             // if (response === "success") {
    //                 // Razorpay options
    //                 var options = {
    //                     "key": "rzp_test_XDMvHbISe3Ffrd",
    //                     "amount": amount * 100,
    //                     "currency": "INR",
    //                     "name": "Steel Connect",
    //                     "description": "Test Transaction",
    //                     "image": "../images/logo_1.svg",
    //                     "handler": function(response) {
    //                         // Handle the successful payment here
    //                         var paymentId = response.razorpay_payment_id;
    //                         // You can send the payment ID to your server for further processing
    //                         console.log("Payment successful with ID: " + paymentId);
    //                         // Display a success message to the user
    //                         window.alert("Payment successful with ID: " + paymentId);
    //                     },
    //                     "prefill": {
    //                         "name": $(name).val(),
    //                         "email": $(email).val(),
    //                         "contact": $(contact).val()
    //                     },
    //                     "notes": {
    //                         "ticketNumber": $(tic_number).val(),
    //                         "tol_price": $(amount).val()
    //                     }
    //                 };

    //                 var rzp1 = new Razorpay(options);

    //                 // Open the Razorpay payment modal
    //                 rzp1.open();
    //             // } else {
    //                 // Form submission failed
    //             //     window.alert("Form submission failed. Try again.");
    //             // }
    //         },
    //         error: function(xhr, status, error) {
    //             console.error(xhr.responseText);
    //         }
    //     });

    //     // Reset the form
    //     clearInput();
    // });

    // let form1 = document.getElementById('ticketForm');

    // function clearInput() {
    //     form1.reset();
    // }
</script>
<script>

</script>

</body>

</html>