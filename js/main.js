//wow.js
new WOW().init();

//global
let products = [];
let cartItems = [];
let cart_n = document.getElementById("cart_n");

//divs
let fruitDiv = document.getElementById("fruitDIV");
let juiceDiv = document.getElementById("juiceDIV");
let saladDiv = document.getElementById("saladDIV");

//information
let FRUIT=[
    {name: 'Apple', price:1},
    {name: 'Orange', price:1},
    {name: 'Cherry', price:1},
    {name: 'Strawberry', price:1},
    {name: 'Kiwi', price:1},
    {name: 'Banana', price:1},
    {name: 'Pineapple', price:1},
    {name: 'Mango', price:1},
];
let JUICE=[
    {name: 'Apple Juice', price:10},
    {name: 'Orange Juice', price:10},
    {name: 'Cherry Juice', price:10},
    {name: 'Strawberry Juice', price:10},
    {name: 'Kiwi Juice', price:10},
    {name: 'Banana Juice', price:10},
    {name: 'Pineapple Juice', price:10},
    {name: 'Mango Juice', price:10},
];
let SALAD=[
    {name: 'Greek Salad', price:8},
    {name: 'Cesar Salad', price:8},
    {name: 'Asian Salad', price:8},
    {name: 'Broccoli Salad', price:8},
    {name: 'Brussels Salad', price:8},
    {name: 'Pasta Salad', price:8},
    {name: 'Tomato Salad', price:8},
    {name: 'Avocado Salad', price:8},
];

//HTML
function HTMLfruitProduct(con){
    let URL = `img/fruit/fruit${con}.jpg`;
    let btn = `btnFruit${con}`;
    return `
        <div class='col-md-4 wow animate__animated animate__zoomIn' data-wow-duration="3s" data-wow-offset="240">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top img-fluid" style="height: 16rem;" src="${URL}" alt="Card Image cap">
                <div class="card-body">
                    <p class="card-text">${FRUIT[con-1].name}</p>
                    <p class="card-text">Price: $${FRUIT[con-1].price}</p>
                    <div class="d-flex justify-content-between align-item-center">
                        <div class="btn-group">
                            <button type="button" onclick="cart2('${FRUIT[con-1].name}', '${FRUIT[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a href="cart.php" style="color: inherit; text-decoration: none;">Buy</a>    
                            </button>
                            <button id="${btn}" type="button" onclick="cart('${FRUIT[con-1].name}', '${FRUIT[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a  style="color: inherit; text-decoration: none;">Add to cart</a>    
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
function HTMLjuiceProduct(con){
    let URL = `img/juice/juice${con}.jpg`;
    let btn = `btnJuice${con}`;
    return `
         <div class='col-md-4 wow animate__animated animate__zoomIn' data-wow-duration="5s" data-wow-offset="240">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="height: 16rem;" src="${URL}" alt="Card Image cap">
                <div class="card-body">
                    <p class="card-text">${JUICE[con-1].name}</p>
                    <p class="card-text">Price: $${JUICE[con-1].price}</p>
                    <div class="d-flex justify-content-between align-item-center">
                        <div class="btn-group">
                            <button type="button" onclick="cart2('${JUICE[con-1].name}', '${JUICE[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a href="cart.php" style="color: inherit; text-decoration: none;">Buy</a>    
                            </button>
                            <button id="${btn}" type="button" onclick="cart('${JUICE[con-1].name}', '${JUICE[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a  style="color: inherit;text-decoration: none;">Add to cart</a>    
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}
function HTMLsaladProduct(con){
    let URL = `img/salad/salad${con}.jpg`;
    let btn = `btnSalad${con}`;
    return `
         <div class='col-md-4 wow animate__animated animate__zoomIn' data-wow-duration="5s" data-wow-offset="240">
            <div class="card mb-4 shadow-sm">
                <img class="card-img-top" style="height: 16rem;" src="${URL}" alt="Card Image cap">
                <div class="card-body">
                    <p class="card-text">${SALAD[con-1].name}</p>
                    <p class="card-text">Price: $${SALAD[con-1].price}</p>
                    <div class="d-flex justify-content-between align-item-center">
                        <div class="btn-group">
                            <button  type="button" onclick="cart2('${SALAD[con-1].name}', '${SALAD[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a href="cart.php" style="color: inherit; text-decoration: none;">Buy</a>    
                            </button>
                            <button id="${btn}" type="button" onclick="cart('${SALAD[con-1].name}', '${SALAD[con-1].price}', '${URL}', '${con}', '${btn}')" 
                            class="btn btn-sm btn-outline-secondary">
                                <a style="color: inherit; text-decoration: none;">Add to cart</a>    
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    `;
}

//animation
function animation() {
    Swal.fire({
        text: 'Added to Cart',
        icon: "success",
        position: 'top-right'
    });
}

//cart functions
function cart(name, price, url, con ,btncart) {
    let item = {
        name: name,
        price: price,
        url: url
    };
    cartItems.push(item);
    let storage = JSON.parse(localStorage.getItem("cart"));
    if(storage == null){
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));
    }else{
        products = JSON.parse(localStorage.getItem("cart"));
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));
    }
    product = JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML = `[${products.length}]`;
    document.getElementById(btncart).style.display = 'none';
    animation();
}
function cart2(name, price, url, con, btncart){
    let item = {
        name: name,
        price: price,
        url: url
    };
    cartItems.push(item);
    let storage = JSON.parse(localStorage.getItem("cart"));
    if(storage == null){
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));
    }else{
        products = JSON.parse(localStorage.getItem("cart"));
        products.push(item);
        localStorage.setItem("cart", JSON.stringify(products));
    }
    product = JSON.parse(localStorage.getItem("cart"));
    cart_n.innerHTML = `[${products.length}]`;
    document.getElementById(btncart).style.display = 'none';
    animation();
}

//render
function render(){
    for (let index = 1; index <= 8; index++){
        fruitDiv.innerHTML += `${HTMLfruitProduct(index)}`;
        juiceDiv.innerHTML += `${HTMLjuiceProduct(index)}`;
        saladDiv.innerHTML += `${HTMLsaladProduct(index)}`;
    }
    if(localStorage.getItem("cart") == null){

    }else {
        products = JSON.parse(localStorage.getItem("cart"));
        cart_n.innerHTML = `[${products.length}]`;
    }
}

//login
document.getElementById("formA").addEventListener("submit", (e)=>{
   e.preventDefault();
   let userEmail = document.getElementById("Aemail");
   let userPass = document.getElementById("Apassword");
   if(userEmail.value === "admin@admin.pl" && userPass.value === "admin"){
       Swal.fire({
           title: 'Welcome',
           text: 'Access granted',
           icon: "success"
        });
        setTimeout(()=>{
            loadPage();
        }, 2000);
   }else{
       Swal.fire({
           title: 'Error',
           text: 'Access not granted',
           icon: "error"
       });
   }
   function loadPage(){
       window.location.href = "/fullecomm/admin/admin.php";
   }
});
