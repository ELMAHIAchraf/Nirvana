        let slidePlay;
        let i=0;
        function slide(){
				if(i > images.length-1){
					i=0;
				}
				document.getElementById('product-img').src = images[i];
				slidePlay=setTimeout(slide, 3000);
                slidePosition();
                i++;
			}
            let j;
            function slidePosition(){ 
                for(j=0;j<circles.length;j++){
                    document.getElementById(circles[j]).style.color="#BEB9FA";
			    }
				document.getElementById(circles[i]).style.color="#5C4EFF";
			}
           function displayImage(arrayIndex, circleId){
                clearTimeout(slidePlay);
                document.getElementById('product-img').src=images[arrayIndex];
                for(j=0;j<circles.length;j++){
                    document.getElementById(circles[j]).style.color="#BEB9FA";
			    }
                document.getElementById(circleId).style.color="#5C4EFF";
           }
           function switchItemColor(colorDir){
                for(j=0;j<images.length;j++){
                        images[j]=images[j].replace(/color[0-9]/, colorDir);
                }
                i=0;
                clearTimeout(slidePlay);
                slide();
           }
           function addCheck(iconeId){
                for(j=0;j<colors.length;j++){
                        document.getElementById(colors[j]).style.display="none";
                }
                document.getElementById(iconeId).style.display="block";
            }
            function displayRatingsDetails(){
                document.getElementById('ratings-detail-cont').style.display="block";
            }
            function hideRatingsDetails(){
                document.getElementById('ratings-detail-cont').style.display="none";
            }
            function isInCart(id_article, color){
                let colorWithoutSharp = color.substring(1);
                let xhr = new XMLHttpRequest();
                xhr.onload=function(){
                    if(xhr.status==200){
                        if(xhr.responseText==1){
                            document.getElementById('addToCart-butt').innerHTML="<i class='fa-solid fa-cart-arrow-up' id='cart-icon'></i>&ensp;Remove";
                        }else{
                            document.getElementById('addToCart-butt').innerHTML="<i class='fa-solid fa-cart-arrow-down' id='cart-icon'></i>&ensp;Add to cart";

                        }
                    }
                }
                xhr.open('GET', 'cart check.php?id_article='+id_article+'&color='+colorWithoutSharp, true);
                xhr.send();
                if(cartStatus=="fa-solid fa-cart-arrow-up"){
                    l=1;
                }else{
                    l=0;
                }
            }
            let k=0;
            function displayReviews(){
                if(k%2==0){
                    document.getElementById('container').style.borderBottomLeftRadius='0';
                    document.getElementById('container').style.borderBottomRightRadius='0';
                    document.getElementById('reviews-section').style.display='flex';
                    document.getElementById('reviews-display').innerHTML='Hide all customers reviews<i class="fa-sharp fa-solid fa-angle-up" id="down-arrow-reviews"></i>';
                    document.getElementById('reviews-display').style.marginLeft='8.5%';
                    document.getElementById('goUpContainer').style.display="block";
                }else{
                    document.getElementById('container').style.borderBottomLeftRadius='45px';
                    document.getElementById('container').style.borderBottomRightRadius='45px';
                    document.getElementById('reviews-section').style.display='none';
                    document.getElementById('reviews-display').innerHTML='See all customers reviews<i class="fa-sharp fa-solid fa-angle-down" id="down-arrow-reviews"></i>';
                    document.getElementById('reviews-display').style.marginLeft='9.5%';
                    document.getElementById('goUpContainer').style.display="none";
                }
                k++;
            }
            let c=0;
            function heartClick(){
                if(document.getElementById('wishlist').style.backgroundColor=="rgb(255, 68, 68)"){
                    c=1;
                }
                if(c%2==0){
                    document.getElementById('wishlist').innerHTML="<i class='fa-solid fa-heart-crack heart'></i>&nbsp; Remove";
                    document.getElementById('wishlist').style.backgroundColor='#ff4444';
                }else{
                    document.getElementById('wishlist').innerHTML="<i class='fa-solid fa-heart heart'></i>&nbsp; Add to wishlist";
                    document.getElementById('wishlist').style.backgroundColor='#ff8b8b';
                }
                c++;
            }
            function addToWishlist(){
                let xhr = new XMLHttpRequest();
                let id_article=document.getElementById('product_id').value;
                if(document.getElementById('wishlist').style.backgroundColor=="rgb(255, 68, 68)"){
                    xhr.onload=function(){
                        if(xhr.status==200){
                            document.getElementById('heartCountNum').innerHTML=xhr.responseText;
                        }
                    }
                    xhr.open("POST", "wishlistAdd.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("id_article="+id_article);
                }else{
                    xhr.onload=function(){
                        if(xhr.status==200){
                            document.getElementById('heartCountNum').innerHTML=xhr.responseText;
                        }
                    }
                    xhr.open("POST", "wishlistRemove.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("id_article="+id_article); 

                }
            }

            let clrDivId='color1';
            function colorDivId(id){
                clrDivId=id;
            }
            let cartStatus;
            let l=0;
            function addToCart(){
                let color;
                if(document.getElementById(clrDivId)){
                    let index=clrDivId.substring(clrDivId.length-1)
                    color=document.getElementById('colorInp'+index).value;
                }else{
                    color="";
                }
                let quantity=document.getElementById('quantity-input').value;
                cartStatus=document.getElementById('cart-icon').className;
                
                let url = new URL(document.location.href);
                let id_article = url.searchParams.get("id_article")

                let xhr= new XMLHttpRequest();
                if(cartStatus=="fa-solid fa-cart-arrow-up"){
                    l=1;
                }
                if(l%2==0){
                    xhr.onload=function(){
                        if(xhr.status==200){
                            document.getElementById('cartCountNum').innerHTML=xhr.responseText;
                        }
                    }
                    xhr.open('POST', 'add to cart.php', true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("id_article="+id_article+"&color="+color+"&quantity="+quantity+"&id_color="+clrDivId);

                    document.getElementById('addToCart-butt').innerHTML='<i class="fa-solid fa-cart-arrow-up" id="cart-icon"></i>&ensp;Remove';
                }else{
                    xhr.onload=function(){
                        if(xhr.status==200){
                            document.getElementById('cartCountNum').innerHTML=xhr.responseText;
                        }
                    }
                    xhr.open('POST', 'remove from cart.php', true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("id_article="+id_article+"&color="+color);
                    
                    document.getElementById('addToCart-butt').innerHTML='<i class="fa-solid fa-cart-arrow-down" id="cart-icon"></i>&ensp;Add to cart';
                }
                l++;
            }
            let m=0;
            function slideRight(){
                m++;
                if(m>(images.length)-1){
                    m=0;
                }
                document.getElementById("displayed-img").src=images[m];
            }
            function slideLeft(){
                m--;
                if(m<0){
                    m=(images.length)-1;
                }
                document.getElementById("displayed-img").src=images[m];
            }
            function hideImage(){
                if(event.target.id=='transparent-bg' || event.target.id=='image-div' || event.target.id=='displayed-img'){
                    document.getElementById('transparent-bg').style.display="none";
                }
            }
            function imageDisplay(){
                    document.getElementById('transparent-bg').style.display="flex";
                    let path=document.getElementById('product-img').src
                    document.getElementById('displayed-img').setAttribute('src', path);
            }
            function arrowHover(id){
                document.getElementById(id).style.color="rgba(92, 78, 255, 0.800)";
                document.getElementById(id).style.backgroundColor="#CDCDCD";
            }
            function arrowMouseLeave(id){
                document.getElementById(id).style.color="rgba(0, 0, 0, 0.200)";
                document.getElementById(id).style.backgroundColor="transparent";
            }
            let color;
            let quantity
            function parmsPrep(){
                if(document.getElementById(clrDivId)){
                    color=getComputedStyle(document.getElementById(clrDivId)).backgroundColor;
                }else{
                    color="";
                }
                quantity=document.getElementById('quantity-input').value;
            }
            
            