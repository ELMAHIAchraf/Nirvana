let i;
let buttonIndex;
function displayDetails(index){
    for (let j = 0; j < document.getElementsByClassName('product-div').length; j++) {
        document.getElementsByClassName('product-conf-div')[j].style.display='none';
        document.getElementsByClassName('product-div')[j].style.borderBottomRightRadius='20px';
        document.getElementsByClassName('product-div')[j].style.borderBottomLeftRadius='20px';
    }

    if(buttonIndex!=index)
        i=0;

    if(i%2==0){
        document.getElementsByClassName('product-conf-div')[index].style.display='flex';
        document.getElementsByClassName('product-div')[index].style.borderBottomRightRadius='0px';
        document.getElementsByClassName('product-div')[index].style.borderBottomLeftRadius='0px';
    }
    buttonIndex=index;
    i++;
}
let stars=['star1', 'star2', 'star3', 'star4', 'star5'];
    function starsRating(index, containerIndex){
        let rating=Number(document.getElementsByClassName('rating')[index].value);
        let intRating=Math.floor(rating);
        let selector=``;
        for(let i=0;i<stars.length;i++){
            selector = `.product${containerIndex} > #${stars[i]}`;
            document.querySelector(selector).setAttribute('class', 'fa-regular fa-star');            
        }
        for(i=0;i<intRating;i++){
            selector = `.product${containerIndex} > #${stars[i]}`;
            document.querySelector(selector).setAttribute('class', 'fa-solid fa-star');
        }
        if(!Number.isInteger(rating)){
            selector = `.product${containerIndex} > #${stars[i]}`;
            document.querySelector(selector).setAttribute('class', 'fa-solid fa-star-half-stroke');
        }    
    }
    function isShippingEmpty(){
        if(document.getElementsByClassName('product-div').length < 1){
            document.getElementById('empty-shipping-div').style.display='grid';
        }        
    }