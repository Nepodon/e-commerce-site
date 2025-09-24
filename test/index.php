<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header class="header">
        <div class="logo">Solo Stove</div>
        <nav class="nav-links">
            <a href="#">Fire Pits</a>
            <a href="#">Pizza Oven</a>
            <a href="#">Grill</a>
            <a href="#">Camp Stoves</a>
            <a href="#">Corporate Sales</a>
        </nav>
        <div class="header-icons">
            <input type="search" placeholder="Search Fire Pits, Grills, Camp Stoves">
            <a href="#">📧</a>
            <a href="#">👤</a>
            <a href="#">🛒</a>
        </div>
    </header>

    <main class="cart-page">
        <h1>Your Cart (4 items)</h1>

        <div class="cart-container">
            <div class="cart-header">
                <span class="header-item">Item</span>
                <span class="header-price">Price</span>
                <span class="header-quantity">Quantity</span>
                <span class="header-total">Total</span>
            </div>

            <div class="cart-item">
                <div class="item-details">
                    <img src="https://via.placeholder.com/100" alt="Pi Pizza Oven" class="item-image">
                    <div class="item-info">
                        <h3>Pi Pizza Oven</h3>
                        <p class="est-ship">Estimated Ship Date: June 6th</p>
                        <p class="fuel-source">Fuel Source: Wood Only</p>
                        <a href="#" class="change-link">Change</a>
                    </div>
                </div>
                <span class="item-price">$469.99</span>
                <div class="item-quantity-controls">
                    <button class="quantity-btn">-</button>
                    <input type="number" value="1" min="1">
                    <button class="quantity-btn">+</button>
                </div>
                <span class="item-total">$469.99 <a href="#">❌</a></span>
            </div>

            <div class="cart-item">
                <div class="item-details">
                    <img src="https://via.placeholder.com/100" alt="Grill Ultimate Bundle" class="item-image">
                    <div class="item-info">
                        <h3>Solo Stove Grill Ultimate Bundle</h3>
                        <p class="add-protection">Add accident protection for $29.99</p>
                    </div>
                </div>
                <span class="item-price">$549.99</span>
                <div class="item-quantity-controls">
                    <button class="quantity-btn">-</button>
                    <input type="number" value="1" min="1">
                    <button class="quantity-btn">+</button>
                </div>
                <span class="item-total">$549.99 <a href="#">❌</a></span>
            </div>
            
            <div class="cart-item">
                <div class="item-details">
                    <img src="https://via.placeholder.com/100" alt="Solo Stove Starters" class="item-image">
                    <div class="item-info">
                        <h3>Solo Stove Starters</h3>
                        <p>(4 pack)</p>
                    </div>
                </div>
                <span class="item-price">$0.00</span>
                <div class="item-quantity-controls">
                    <input type="number" value="1" min="1">
                </div>
                <span class="item-total">$0.00</span>
            </div>

            <div class="cart-item">
                <div class="item-details">
                    <img src="https://via.placeholder.com/100" alt="Charcoal Grill Pack" class="item-image">
                    <div class="item-info">
                        <h3>Solo Stove Charcoal Grill Pack</h3>
                    </div>
                </div>
                <span class="item-price">$0.00</span>
                <div class="item-quantity-controls">
                    <input type="number" value="1" min="1">
                </div>
                <span class="item-total">$0.00</span>
            </div>
        </div>
        
        <div class="cart-summary">
            <div class="summary-row">
                <span>Subtotal:</span>
                <span>$1,019.98</span>
            </div>
            <div class="summary-row">
                <span>Sales Tax:</span>
                <span>$102.00</span>
            </div>
            <div class="summary-row coupon">
                <span>Coupon Code:</span>
                <a href="#">Add Coupon</a>
            </div>
            <div class="summary-row grand-total">
                <span>Grand total:</span>
                <span>$1,121.98</span>
            </div>
            <div class="free-shipping">
                <p>Congrats, you're eligible for **Free Shipping**</p>
                <img src="https://via.placeholder.com/30" alt="Free Shipping">
            </div>
            <button class="checkout-btn">Check out</button>
        </div>

    </main>

</body>
</html>