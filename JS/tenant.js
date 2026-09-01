function SearchListings()
{
    let location = document.getElementById("location") ? document.getElementById("location").value.trim() : "";
    let minRent = document.getElementById("minRent") ? document.getElementById("minRent").value.trim() : "";
    let maxRent = document.getElementById("maxRent") ? document.getElementById("maxRent").value.trim() : "";
    let container = document.getElementById("listings_container");

    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200)
        {
            if (container)
            {
                container.innerHTML = this.responseText;
            }
        }
    };

    xhttp.open("POST", "../Controller/GetBrowseListings.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send(
        "location=" + encodeURIComponent(location) +
        "&minRent=" + encodeURIComponent(minRent) +
        "&maxRent=" + encodeURIComponent(maxRent)
    );
}

function LoadAvailableListings()
{
    SearchListings();
}