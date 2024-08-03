let stripe = Stripe('pk_test_51N1GKxK4PQO9ioldtxlrwuwblBhEOmyGpWH6EJLavHnFYgsdPs744pTBUQ8k45UaIWa1Fne6mu0w5qtpjKR25AmL00I6FIDzeg');

let cardNum=document.getElementById('cardNum');
let cardExp=document.getElementById('cardExp');
let cardCvc=document.getElementById('cardCvc');
let purchaseButt=document.getElementById('pay-button');

let elements=stripe.elements();

let styling ={
    base:{
        color:'#3826ff',
        iconColor: '#9990fc',
        fontSize:'18px',
        fontFamily:'Source Sans Pro, sans-serif',
        '::placeholder':{
            color:'#9990fc'
        }
    },
    invalid:{
        color:'#FF6161',
        iconColor:'#FF6161'
    },
    complete:{
        color:'#00D513'
    }
}

let cardNumElem=elements.create('cardNumber', {
    showIcon:true,
    iconStyle:'solid',
    style:styling
});
cardNumElem.mount(cardNum);
let cardExpElem=elements.create('cardExpiry', {
    disabled:true,
    style:styling

});
cardExpElem.mount(cardExp);
let cardCvcElem=elements.create('cardCvc', {
    disabled:true,
    style:styling
});
cardCvcElem.mount(cardCvc);

cardNumElem.on('ready', function(){
        cardNumElem.focus();
});

cardNumElem.on('change', function(event){
    if(event.complete){
        cardExpElem.update({disabled:false});
        cardExpElem.focus();
    }
});
cardExpElem.on('change', function(event){
    if(event.complete){
        cardCvcElem.update({disabled:false});
        cardCvcElem.focus();
    }
});
cardCvcElem.on('change', function(event){
    if(event.complete){
        purchaseButt.removeAttribute('disabled');
        purchaseButt.style.backgroundColor="#5C4EFF";
    }else{
        purchaseButt.setAttribute('disabled', 'disabled');
        purchaseButt.style.backgroundColor="#756cfd";
    }
});
purchaseButt.addEventListener('click', function(){
        purchaseButt.setAttribute('disabled', 'disabled');
        purchaseButt.style.backgroundColor="#756cfd";
});




