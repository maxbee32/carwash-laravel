const stripe = Stripe("pk_test_51Q7OyPRxmKe0UKBMa1Wos3xUj27xr5au3B3lVBbYJmANhBhTktp75pzpldutg7G4kJVK1yl2dSrPsEJ5Bl6gnhKD00w5aEWmyF");

const items = [{ id: "xl-tshirt" }];
// const successUrl = "{{ route('success') }}";

let elements;

initialize();
checkStatus();

document.querySelector("#payment-form").addEventListener("submit", handleSubmit);

async function initialize() {
    const { clientSecret } = await fetch("/charge", {
        method: "POST",
        headers: {
             "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,
            // "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        },
        body: JSON.stringify({ items }),
    }).then((r) => r.json());

    elements = stripe.elements({ clientSecret });

    const paymentElement = elements.create("payment");
    paymentElement.mount("#payment-element");
}

async function handleSubmit(e) {
    e.preventDefault();
    setLoading(true);

    const { error } = await stripe.confirmPayment({
        elements,
        confirmParams: {
            // Replace with your payment completion page
            return_url: successUrl,//"http://127.0.0.1:8000/success",
            // receipt_email: document.getElementById("email").value,
        },
    });

    if (error.type === "card_error" || error.type === "validation_error") {
        showMessage(error.message);
    } else {
        showMessage("An unexpected error occured.");
    }



    // If paymentIntent was created successfully, get the payment_intent_id
    if (paymentIntent && paymentIntent.id) {
        const paymentIntentId = paymentIntent.id; // This is your payment_intent_id

        // You can now send an AJAX request to save the booking data
        await fetch("/saveBookingAfterPayment", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,  // CSRF token for security
            },
            body: JSON.stringify({
                payment_intent_id: paymentIntentId,  // Pass the payment intent ID
                // Add other necessary data here as needed
            }),
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showMessage("Booking successfully saved!");
            } else {
                showMessage("Failed to save booking.");
            }
        })
        .catch((error) => {
            console.error("Error:", error);
            showMessage("An error occurred while saving the booking.");
        });
    }


    setLoading(false);
}

async function checkStatus() {
    const clientSecret = new URLSearchParams(window.location.search).get(
        "payment_intent_client_secret"
    );

    if (!clientSecret) {
        return;
    }

    const { paymentIntent } = await stripe.retrievePaymentIntent(clientSecret);

    switch (paymentIntent.status) {
        case "succeeded":
            showMessage("Payment succeeded!");

            // // Send an AJAX request to save user booking data in the database
            // await fetch("/saveBookingAfterPayment", {
            //     method: "POST",
            //     headers: {
            //         "Content-Type": "application/json",
            //         "X-CSRF-TOKEN": document.querySelector('input[name="_token"]').value,  // CSRF token for security
            //     },
            //     body: JSON.stringify({
            //         payment_intent_id: paymentIntent.id,  // You can pass other necessary data as needed
            //     }),
            // })
            // .then(response => response.json())
            // .then(data => {
            //     if (data.success) {
            //         showMessage("Booking successfully saved!");
            //     } else {
            //         showMessage("Failed to save booking.");
            //     }
            // })
            // .catch((error) => {
            //     console.error("Error:", error);
            //     showMessage("An error occurred while saving the booking.");
            // });


            break;
        case "processing":
            showMessage("Your payment is processing.");
            break;
        case "requires_payment_method":
            showMessage("Your payment was not successful, please try again.");
            break;
        default:
            showMessage("Something went wrong.");
            break;
    }
}

// ------- UI helpers -------

function showMessage(messageText) {
    const messageContainer = document.querySelector("#payment-message");

    messageContainer.classList.remove("hidden");
    messageContainer.textContent = messageText;

    setTimeout(function () {
        messageContainer.classList.add("hidden");
        messageText.textContent = "";
    }, 4000);
}

function setLoading(isLoading) {
    if (isLoading) {
        document.querySelector("#submit").disabled = true;
        document.querySelector("#spinner").classList.remove("hidden");
        document.querySelector("#button-text").classList.add("hidden");
    } else {
        document.querySelector("#submit").disabled = false;
        document.querySelector("#spinner").classList.add("hidden");
        document.querySelector("#button-text").classList.remove("hidden");
    }
}




