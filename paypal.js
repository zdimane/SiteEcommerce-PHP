paypal.Buttons({
    createOrder: function(data, actions) {
        return actions.order.create({
            purchase_units: [{    
                amount: {
                    value: '00.10'
                }
            }]
        }); 
    },
    onApprove: function(date, actions) {
        return actions.order.capture().then(function(details) {
            alert('Transaction completed by' + details.payer.name.given_name);

        });

    }
 
}).render('#paypal-button-container');