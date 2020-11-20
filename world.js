"use strict"

window.onload=function(){
    var countryBtn=document.getElementById("lookup");
    var citiesBtn=document.getElementById("city");
    var lookupField=document.querySelector("#country");
    var result=document.querySelector("#result");
    var httpRequest;

    countryBtn.addEventListener("click", function(){
        let lookupValue=lookupField.value;

        httpRequest= new XMLHttpRequest();
        var url="http://localhost/info2180-lab5/world.php?country="+lookupValue+"&context=''";
        httpRequest.onreadystatechange=lookupData;
        httpRequest.open('GET',url);
        httpRequest.send();


    }); 

    citiesBtn.addEventListener("click", function(){
         let lookupValue=lookupField.value;

         httpRequest= new XMLHttpRequest();
         let url="http://localhost/info2180-lab5/world.php?country="+lookupValue+"&context=cities";
         httpRequest.onreadystatechange=lookupData;
         httpRequest.open('GET',url);
         httpRequest.send();

    });



    function lookupData() {
        if (httpRequest.readyState === XMLHttpRequest.DONE) {
          if (httpRequest.status === 200) {
            var response = httpRequest.responseText;
            result.innerHTML=response; 
          } else {
            alert('There was a problem with the request.');
          }
        }
      }















}