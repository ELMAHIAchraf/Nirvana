// function displaySearchResults(){
//     document.getElementById('search-results').innerHTML="";
//     let searchInput=document.getElementById('searchInp').value;
//     let category=document.getElementById('category').value;
//     let xhr = new XMLHttpRequest();
//     xhr.onload=function(){
//         if(xhr.status==200){
//             if(xhr.responseText.length>0){
//                 for(let i=0; i<JSON.parse(xhr.responseText).length; i++){
//                     document.getElementById('search-results').style.display="block";
//                     document.getElementById('search-results').innerHTML+=
//                     "<div class='search-result' onclick='fillSearchInput("+i+")'><p class='search-par'>"+JSON.parse(xhr.responseText)[i].name_article+"</p></div>";
//                 }
//              }else{
//                 document.getElementById('search-results').style.display="none";
//             }
//         }
//     }
//     xhr.open("GET", "search.php?search="+searchInput+"&category="+category, true);
//     xhr.send();
// }
// function fillSearchInput(index){
//     document.getElementById('searchInp').value=document.getElementsByClassName('search-par')[index].innerHTML;
//     document.getElementById('search-results').style.display="none";
//     document.getElementById('searchButt').click();/*Auto search*/
// }

// function dropDownMenuDisplay(){
//     document.getElementById('userButt').style.backgroundColor='#6e61ff';
//     document.getElementById('dropDown').style.display="block";
//     setTimeout(function(){
//         document.getElementById('dropDown').style.opacity="1";
//         document.getElementById('dropDown').style.transition="1s";
//     }, 100) 
// }
// function hideSearchResults(event){
//     if(event.target.id!="search-results"){
//         document.getElementById('search-results').style.display="none";
//     }
// }
// function dropDownMenuHide(){
//     document.getElementById('userButt').style.backgroundColor='#796EFF';
//     setTimeout(function(){
//         document.getElementById('dropDown').style.opacity="0";
//         document.getElementById('dropDown').style.transition="1s";
//     }, 100)
//     document.getElementById('dropDown').style.display="none"; 
// }

// let i=0;
// function searchDisplay(){
//     if((document.getElementById('searchInp').value!="" || document.getElementById('category').value!=loadedCategoryValue) && i!=0){
//             document.getElementById('searchButt').type="submit";
//     }
//     if(i%2==0){
//         document.getElementById('searchButt').style.borderTopLeftRadius='0px';
//         document.getElementById('searchButt').style.borderBottomLeftRadius='0px';
//         document.getElementById('searchInp').style.display="block"; 
//         document.getElementById('category').style.display="block";
//         document.getElementById('searchInp').focus();
//     }else{
//         document.getElementById('searchButt').style.borderTopLeftRadius='8px';
//         document.getElementById('searchButt').style.borderBottomLeftRadius='8px';
//         document.getElementById('searchInp').style.display="none"; 
//         document.getElementById('category').style.display="none"
//     }
//     i++;
// }


function heartClick(productIndex){
    let j=0;
    let color=document.getElementsByClassName('heart')[productIndex].style.color;
    if(color=="rgb(238, 71, 71)"){
        j=1;
    }
    if(j%2==0){
        document.getElementsByClassName('heart')[productIndex].style.color='#ee4747';
        document.getElementsByClassName('heart')[productIndex].style.transition="color 0.5s";
    }else{
        document.getElementsByClassName('heart')[productIndex].style.color='#ffbfbf';
        document.getElementsByClassName('heart')[productIndex].style.transition="color 0.5s";
    }
    j++;
    document.getElementsByClassName('heart')[productIndex].setAttribute('class', 'fa-solid fa-heart heart');
}
function addToWishlist(productIndex){
    let id_article=document.getElementsByClassName('id_article')[productIndex].value;
    let color=document.getElementsByClassName('heart')[productIndex].style.color;
    let xhr = new XMLHttpRequest();
        if(color=='rgb(238, 71, 71)'){
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
function brokenHeart(productIndex){
    if(document.getElementsByClassName('heart')[productIndex].style.color=='rgb(238, 71, 71)'){
        document.getElementsByClassName('heart')[productIndex].setAttribute('class', 'fa-solid fa-heart-crack heart');
    }else{
        document.getElementsByClassName('heart')[productIndex].setAttribute('class', 'fa-solid fa-heart heart');
    }
}
function normalHeart(productIndex){
    document.getElementsByClassName('heart')[productIndex].setAttribute('class', 'fa-solid fa-heart heart');
}        

let images = ['affiche1.jpg', 'affiche2.jpg', 'affiche3.jpg'];
let i=-1;
function slide(){
    i++;
    if(i > images.length-1){
        i=0;
    }
    document.getElementById('poster').src = images[i];
    slidePlay=setTimeout(slide, 3000);
}
function previous(){
	i--;
	if(i<0){
		i=(images.length)-1;
	}
	document.getElementById("poster").src=images[i];
}
function next(){
	i++;
	if(i>(images.length)-1){
		i=0;
	}
	document.getElementById("poster").src=images[i];
}
