function resetIndexes(className, inpColor){
    let checkArray = document.getElementsByClassName(className);
    for (let j = 0; j < checkArray.length; j++) {
        document.getElementsByClassName(className)[j].id = j;
    }
    let colorValueInp = document.getElementsByClassName(inpColor);
    for (j = 0; j < colorValueInp.length; j++) {
        document.getElementsByClassName(inpColor)[j].id = 'inp'+j;
    }
}                
function removeFromCart(productIndex, color){
    let id_article=document.getElementsByClassName('check')[productIndex].value;
    let xhr = new XMLHttpRequest();
        xhr.onload=function(){
            if(xhr.status==200){
                document.getElementById('cartCountNum').innerHTML=xhr.responseText;
            }
        }
        xhr.open("POST", "remove from cart.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id_article="+id_article+"&color="+color); 
    document.getElementsByClassName('product-div')[productIndex].remove();
    updateAmount();
}
function updateAmount(){
    let xhr = new XMLHttpRequest();
    xhr.onload=function(){
        if(xhr.status==200){
            document.getElementById('amount').innerHTML='$'+xhr.responseText;
        }
    }
    xhr.open("POST", "cart amount.php", true);
    xhr.send(); 
}

// function removeSelectedFromCart(){  
//     let check = document.getElementsByClassName('check');
//     let selectedArticles= [];
//     for (let i=0; i<check.length; i++) {
//         if(check[i].checked){
//             selectedArticles.push(check[i].id);
//         }
//     }
//     removeFromCart(selectedArticles[0]);
//     for (i=1; i<selectedArticles.length; i++) {
//         removeFromCart(selectedArticles[i]-i);  
//     }
// }
function isCartEmpty(){
    if(document.getElementsByClassName('product-div').length < 1){
        document.getElementById('purchase').style.display='none';
        document.getElementById('amount').style.display='none';
        document.getElementById('empty-cart-div').style.display='grid';
    }        
}
function totalAmount(){
    let prices = document.getElementsByClassName('product-price');
    let amount=0;
    for (let i = 0; i < prices.length; i++) {
        amount+=Number(prices[i].innerHTML.substring(1, prices[i].innerHTML.length));
    }
    document.getElementById('amount').innerHTML=`$${amount.toFixed(2)}`;
}