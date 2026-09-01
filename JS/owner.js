function CheckOwner()
{
    let owner_email = document.getElementById("owner_email").value.trim();
    let response = document.getElementById("emailresponse");
    if (!response) return;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            response.innerHTML = this.responseText;
        }
    };

    xhttp.open("POST", "../Controller/CheckOwner.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("owner_email=" + encodeURIComponent(owner_email));
}

function AddListing()
{
    let home_name = document.getElementById("property_name") ? document.getElementById("property_name").value.trim() : "";
    let location = document.getElementById("location") ? document.getElementById("location").value.trim() : "";
    let rent = document.getElementById("rent") ? document.getElementById("rent").value.trim() : "";
    let description = document.getElementById("description") ? document.getElementById("description").value.trim() : "";
    let imageInput = document.getElementById("property_image") || document.getElementById("listing_image");
    let image = (imageInput && imageInput.files.length > 0) ? imageInput.files[0] : null;

    let response = document.getElementById("listingresponse");

    let formData = new FormData();
    formData.append("home_name", home_name);
    formData.append("property_name", home_name);
    formData.append("location", location);
    formData.append("rent", rent);
    formData.append("description", description);

    if (image)
    {
        formData.append("listing_image", image);
        formData.append("property_image", image);
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            if (response) response.innerHTML = this.responseText;

            if (this.responseText.indexOf("Successfully") !== -1)
            {
                let form = document.querySelector("form");
                if (form) form.reset();
            }
        }
        else if (this.readyState == 4 && response)
        {
            response.innerHTML = "Error: " + this.status;
        }
    };

    xhttp.open("POST", "../Controller/AddListing.php", true);
    xhttp.send(formData);
}

function UpdateListing()
{
    let listing_id = document.getElementById("listing_id") ? document.getElementById("listing_id").value.trim() : "";
    let home_name = document.getElementById("property_name") ? document.getElementById("property_name").value.trim() : (document.getElementById("home_name") ? document.getElementById("home_name").value.trim() : "");
    let location = document.getElementById("location") ? document.getElementById("location").value.trim() : "";
    let rent = document.getElementById("rent") ? document.getElementById("rent").value.trim() : "";
    let description = document.getElementById("description") ? document.getElementById("description").value.trim() : "";
    let status = document.getElementById("status") ? document.getElementById("status").value.trim() : "";

    let response = document.getElementById("listingresponse");
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            if (response) response.innerHTML = this.responseText;
        }
        else if (this.readyState == 4 && response)
        {
            response.innerHTML = "Error: " + this.status;
        }
    };

    xhttp.open("POST", "../Controller/UpdateListing.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "listing_id=" + encodeURIComponent(listing_id) +
        "&home_name=" + encodeURIComponent(home_name) +
        "&location=" + encodeURIComponent(location) +
        "&rent=" + encodeURIComponent(rent) +
        "&description=" + encodeURIComponent(description) +
        "&status=" + encodeURIComponent(status)
    );
}

function DeleteListing(listing_id)
{
    if (!confirm("Are you sure you want to delete this listing?"))
    {
        return;
    }

    let response = document.getElementById("listingresponse");
    let xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            if (response) response.innerHTML = this.responseText;
            LoadMyListings();
        }
        else if (this.readyState == 4 && response)
        {
            response.innerHTML = "Error: " + this.status;
        }
    };

    xhttp.open("POST", "../Controller/DeleteListing.php", true);
    xhttp.setRequestHeader("content-type", "application/x-www-form-urlencoded");
    xhttp.send("listing_id=" + encodeURIComponent(listing_id));
}

function LoadOwnerProfile()
{
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            try
            {
                let data = JSON.parse(this.responseText);
                if (document.getElementById("full_name")) document.getElementById("full_name").value = data.owner_name || "";
                if (document.getElementById("owner_username")) document.getElementById("owner_username").value = data.owner_username || "";
                if (document.getElementById("owner_dob")) document.getElementById("owner_dob").value = data.owner_dob || "";
                if (document.getElementById("email")) document.getElementById("email").value = data.owner_email || "";
                if (document.getElementById("phone")) document.getElementById("phone").value = data.owner_phone || "";
                if (document.getElementById("address")) document.getElementById("address").value = data.owner_address || "";
                if (document.getElementById("owner_nid")) document.getElementById("owner_nid").value = data.owner_nid || "";
            }
            catch (e)
            {
                // Fallback to pipe-separated parsing
                let parts = this.responseText.split("|");
                if (parts.length >= 6)
                {
                    if (document.getElementById("full_name")) document.getElementById("full_name").value = parts[0] || "";
                    if (document.getElementById("owner_dob")) document.getElementById("owner_dob").value = parts[1] || "";
                    if (document.getElementById("email")) document.getElementById("email").value = parts[2] || "";
                    if (document.getElementById("phone")) document.getElementById("phone").value = parts[3] || "";
                    if (document.getElementById("address")) document.getElementById("address").value = parts[4] || "";
                    if (document.getElementById("owner_nid")) document.getElementById("owner_nid").value = parts[5] || "";
                    if (parts[6] && document.getElementById("owner_username")) document.getElementById("owner_username").value = parts[6] || "";
                }
            }
        }
    };

    xhttp.open("GET", "../Controller/GetOwner.php?format=json", true);
    xhttp.send();
}

function UpdateOwner()
{
    let owner_name = document.getElementById("full_name") ? document.getElementById("full_name").value.trim() : "";
    let owner_username = document.getElementById("owner_username") ? document.getElementById("owner_username").value.trim() : "";
    let owner_dob = document.getElementById("owner_dob") ? document.getElementById("owner_dob").value.trim() : "";
    let owner_phone = document.getElementById("phone") ? document.getElementById("phone").value.trim() : "";
    let owner_email = document.getElementById("email") ? document.getElementById("email").value.trim() : "";
    let owner_address = document.getElementById("address") ? document.getElementById("address").value.trim() : "";
    let owner_nid = document.getElementById("owner_nid") ? document.getElementById("owner_nid").value.trim() : "";

    let nidFileInput = document.getElementById("owner_nid_file");
    let nidFile = (nidFileInput && nidFileInput.files.length > 0) ? nidFileInput.files[0] : null;

    let response = document.getElementById("profileresponse");

    let formData = new FormData();
    formData.append("owner_name", owner_name);
    formData.append("full_name", owner_name);
    formData.append("owner_username", owner_username);
    formData.append("owner_dob", owner_dob);
    formData.append("owner_phone", owner_phone);
    formData.append("phone", owner_phone);
    formData.append("owner_email", owner_email);
    formData.append("email", owner_email);
    formData.append("owner_address", owner_address);
    formData.append("address", owner_address);
    formData.append("owner_nid", owner_nid);

    if (nidFile)
    {
        formData.append("owner_nid_file", nidFile);
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            if (response) response.innerHTML = this.responseText;
        }
        else if (this.readyState == 4 && response)
        {
            response.innerHTML = "Error: " + this.status;
        }
    };

    xhttp.open("POST", "../Controller/UpdateOwner.php", true);
    xhttp.send(formData);
}

function LoadRecentListings()
{
    let table = document.getElementById("recent_listings");
    if (!table) return;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "../Controller/GetRecentListings.php", true);
    xhttp.send();
}

function LoadMyListings()
{
    let table = document.getElementById("my_listings_table");
    if (!table) return;

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            table.innerHTML = this.responseText;
        }
    };

    xhttp.open("GET", "../Controller/GetMyListings.php", true);
    xhttp.send();
}

function LoadListingForUpdate()
{
    let urlParams = new URLSearchParams(window.location.search);
    let id = urlParams.get("id");

    if (!id)
    {
        let idInput = document.getElementById("listing_id");
        if (idInput && idInput.value)
        {
            id = idInput.value;
        }
    }

    if (!id) return;

    if (document.getElementById("listing_id"))
    {
        document.getElementById("listing_id").value = id;
    }

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            try
            {
                let data = JSON.parse(this.responseText);
                if (data && !data.error)
                {
                    if (document.getElementById("listing_id")) document.getElementById("listing_id").value = data.listing_id || id;
                    if (document.getElementById("property_name")) document.getElementById("property_name").value = data.home_name || "";
                    if (document.getElementById("home_name")) document.getElementById("home_name").value = data.home_name || "";
                    if (document.getElementById("location")) document.getElementById("location").value = data.location || "";
                    if (document.getElementById("rent")) document.getElementById("rent").value = data.rent || "";
                    if (document.getElementById("description")) document.getElementById("description").value = data.description || "";
                    if (document.getElementById("status")) document.getElementById("status").value = data.status || "Available";
                }
            }
            catch (e)
            {
                console.error("Failed to parse listing details", e);
            }
        }
    };

    xhttp.open("GET", "../Controller/UpdateListing.php?id=" + encodeURIComponent(id), true);
    xhttp.send();
}