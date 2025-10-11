async function addItemToCart(params) {
    /*
    params = {
        user_id: int,
        product_id: int,
        quantity: int
    }
    */
    const response = await fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: {
            action : 'add_to_cart',
            data : JSON.stringify(params)
        }
    })
    .then(response => response.json())
    .catch(error => console.error('Error:', error));
    return response;
}