function resetIndexes(className){
    let checkArray = document.getElementsByClassName(className);
    for (let j = 0; j < checkArray.length; j++) {
        document.getElementsByClassName(className)[j].id = j;
    }
}           
function removeFromWishlist(productIndex){
    let id_article=document.getElementsByClassName('check')[productIndex].value;
    let xhr = new XMLHttpRequest();
        xhr.onload=function(){
            if(xhr.status==200){
                document.getElementById('heartCountNum').innerHTML=xhr.responseText;
            }
        }
        xhr.open("POST", "wishlistRemove.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.send("id_article="+id_article); 
    document.getElementsByClassName('product-div')[productIndex].remove();

}
function removeSelectedFromWishlist(){  
    let check = document.getElementsByClassName('check');
    let selectedArticles= [];
    for (let i=0; i<check.length; i++) {
        if(check[i].checked){
            selectedArticles.push(check[i].id);
        }
    }
    removeFromWishlist(selectedArticles[0]);
    for (i=1; i<selectedArticles.length; i++) {
        removeFromWishlist(selectedArticles[i]-i);  
    }
}
function isWishlistEmpty(){
    if(document.getElementsByClassName('product-div').length < 1){
        document.getElementById('remove-form').style.display='none';
        document.getElementById('empty-wishlist-div').style.display='grid';
    }        
}