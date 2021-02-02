var products = JSON.parse(localStorage.getItem('cart'));
var cartItems=[];
var cart_n = document.getElementById('cart_n');
var table = document.getElementById('table');
var total = 0;

function tableHTML(i){
    return `
        <tr>
        <th scope="row">${i+1}</th>
        <td><img style="width: 90px" src="${products[i].url}" alt="product img"></td>
        <td>${products[i].name}</td>
        <td>1</td>
        <td>${products[i].price}</td>
    `;
}

function clean(){
    localStorage.clear();
    for (let index = 0; index < products.length; index++){
        table.innerHTML += tableHTML(index);
        total = total + parseInt(products[index].price);
    }
    total = 0;
    table.innerHTML = `
        <tr>
        <th></th>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        </tr>
    `;
    cart_n.innerHTML='';
    document.getElementById("btnBuy").style.display = "none";
    document.getElementById("btnClear").style.display = "none";
}

function render(){
    for (let index = 0; index < products.length; index++){
        table.innerHTML += tableHTML(index);
        total = total + parseInt(products[index].price);
    }
    table.innerHTML += `
        <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">Total: $${total}.00</th>
        </tr>
        <tr>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col">
            <button id="btnClear" onclick="ClearCart(); " class="btn text-white btn-warning">Clear</button>
        </th>
        <th scope="col">
            <form id="formAdd">
                <button type="submit" id="btnBuy" class="btn btn-success">Buy</button>
            </form>
        </th>
        </tr>
    `;
    products=JSON.parse(localStorage.getItem('cart'));
    cart_n.innerHTML = `[${products.length}]`;
}

$(document).ready(function (){

   $("#formAdd").submit(function (){
       var option = 1;
       post = $.trim(option);
       $.ajax({
           url: "./db/crud.php",
           type: "POST",
           dataType: "json",
           data: {order: total * total * 23, total: total, option: post},
           success: function (data){
               console.log(`success: ${data}`);
           }
       });
       Swal.fire({
           title: 'Purchase made successfully',
           text: `Your purchase order is: ${total * total * 23}`,
           icon: "success"});
       clean();
   });
});

function ClearCart(){
    clean();
    Swal.fire({
        title: 'Cart cleared',
        icon: "error"
    })
}