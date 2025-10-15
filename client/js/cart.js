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
    const data = await response.json();
    if(data.success) {
        return true;
    } else {
        console.log(data.message);
        return false;
    }
}

async function removeItemFromCart(params) {
    /*
    params = {
        user_id: int,
        product_id: int
    }
    */
    const response = await fetch('process.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: {
            action : 'remove_from_cart',
            data : JSON.stringify({params})
        }
    })
    const data = await response.json();
    if(data.success) {
        return true;
    } else {
        console.log(data.message);
        return false;
    }
}

async function updateItemQuantity(params) {
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
            action : 'update_cart_quantity',
            data : JSON.stringify({params})
        }
    })
    const data = await response.json();
    if(data.success) {
        return true;
    } else {
        console.log(data.message);
        return false;
    }
}
