function CheckOwner()
{
    let owner_email=document.getElementById("owner_email").value.trim();
    let response=document.getElementById("emailresponse");
    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            response.innerHTML=this.status;
        }
    }

    xhttp.open("POST","../Controller/CheckOwner.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");
    xhttp.send("owner_email="+encodeURIComponent(owner_email));
}


function AddListing()
{
    let home_name=
        document
        .getElementById("property_name")
        .value.trim();

    let location=
        document
        .getElementById("location")
        .value.trim();

    let rent=
        document
        .getElementById("rent")
        .value.trim();

    let description=
        document
        .getElementById("description")
        .value.trim();

    let image=
        document
        .getElementById("property_image")
        .files[0];


    let response=
        document
        .getElementById("listingresponse");


    let formData=new FormData();


    formData.append(
        "home_name",
        home_name
    );

    formData.append(
        "location",
        location
    );

    formData.append(
        "rent",
        rent
    );

    formData.append(
        "description",
        description
    );


    if(image)
    {
        formData.append(
            "property_image",
            image
        );
    }


    let xhttp=new XMLHttpRequest();


    xhttp.onreadystatechange=function(){

        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;

            if(this.responseText=="Listing Added Successfully")
            {
                document
                    .querySelector("form")
                    .reset();
            }
        }
        else if(this.readyState==4)
        {
            response.innerHTML=this.status;
        }

    };



    xhttp.open("POST","../Controller/AddListing.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");

    xhttp.send(
        "home_name="+encodeURIComponent(home_name)+
        "&location="+encodeURIComponent(location)+
        "&rent="+encodeURIComponent(rent)+
        "&description="+encodeURIComponent(description)+
        "&listing_date="+encodeURIComponent(listing_date)
    );
}


function UpdateListing()
{
    let listing_id=document.getElementById("listing_id").value.trim();
    let home_name=document.getElementById("home_name").value.trim();
    let location=document.getElementById("location").value.trim();
    let rent=document.getElementById("rent").value.trim();
    let description=document.getElementById("description").value.trim();
    let status=document.getElementById("status").value.trim();

    let response=document.getElementById("listingresponse");
    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            response.innerHTML=this.status;
        }
    }

    xhttp.open("POST","../Controller/UpdateListing.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");

    xhttp.send(
        "listing_id="+encodeURIComponent(listing_id)+
        "&home_name="+encodeURIComponent(home_name)+
        "&location="+encodeURIComponent(location)+
        "&rent="+encodeURIComponent(rent)+
        "&description="+encodeURIComponent(description)+
        "&status="+encodeURIComponent(status)
    );
}


function DeleteListing(listing_id)
{
    let response=document.getElementById("listingresponse");
    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            response.innerHTML=this.status;
        }
    }

    xhttp.open("POST","../Controller/DeleteListing.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");

    xhttp.send(
        "listing_id="+encodeURIComponent(listing_id)
    );
}


function UpdateOwner()
{
    let owner_name=document.getElementById("owner_name").value.trim();
    let owner_dob=document.getElementById("owner_dob").value.trim();
    let owner_phone=document.getElementById("owner_phone").value.trim();
    let owner_email=document.getElementById("owner_email").value.trim();
    let owner_address=document.getElementById("owner_address").value.trim();
    let owner_nid=document.getElementById("owner_nid").value.trim();

    let response=document.getElementById("profileresponse");
    let xhttp=new XMLHttpRequest();

    xhttp.onreadystatechange=function(){
        if(this.readyState==4 && this.status==200)
        {
            response.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            response.innerHTML=this.status;
        }
    }

    xhttp.open("POST","../Controller/UpdateOwner.php",true);
    xhttp.setRequestHeader("content-type","application/x-www-form-urlencoded");

    xhttp.send(
        "owner_name="+encodeURIComponent(owner_name)+
        "&owner_dob="+encodeURIComponent(owner_dob)+
        "&owner_phone="+encodeURIComponent(owner_phone)+
        "&owner_email="+encodeURIComponent(owner_email)+
        "&owner_address="+encodeURIComponent(owner_address)+
        "&owner_nid="+encodeURIComponent(owner_nid)
    );
}
function LoadRecentListings()
{
    let table=
        document.getElementById("recent_listings");

    let xhttp=new XMLHttpRequest();


    xhttp.onreadystatechange=function(){

        if(this.readyState==4 && this.status==200)
        {
            table.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            table.innerHTML=this.status;
        }

    };


    xhttp.open(
        "GET",
        "../Controller/GetRecentListings.php",
        true
    );


    xhttp.send();
}


function LoadMyListings()
{
    let table=
        document.getElementById("my_listings_table");

    let xhttp=new XMLHttpRequest();


    xhttp.onreadystatechange=function(){

        if(this.readyState==4 && this.status==200)
        {
            table.innerHTML=this.responseText;
        }
        else if(this.readyState==4)
        {
            table.innerHTML=this.status;
        }

    };


    xhttp.open(
        "GET",
        "../Controller/GetMyListings.php",
        true
    );


    xhttp.send();
}