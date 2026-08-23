<?php
header("Content-Type: text/css");
?>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Cambria, Cochin, Georgia, serif;
    background-color: wheat;
    padding: 0 20px 20px 20px;
}

/* Header */

.Header {
    position: fixed;
    top: 0;
    left: 20px;
    right: 20px;
    height: 90px;
    z-index: 1000;
    background-color: #12372A;
}

.Header h1 {
    background-color: #12372A;
    color: white;
    padding: 28px 20px;
    text-align: center;
    height: 90px;
}

/* Navigation */

.topnav {
    position: fixed;
    top: 90px;
    left: 20px;
    right: 20px;
    height: 55px;
    z-index: 999;
    background-color: #1D5B4F;
    overflow: hidden;
    margin-bottom: 20px;
}

.topnav a {
    float: left;
    color: white;
    text-decoration: none;
    padding: 15px 20px;
    font-size: 20px;
}

.topnav a:hover {
    background-color: white;
    color: black;
}

.topnav a.active {
    background-color: white;
    color: black;
}

/* Main Container */

.container {
    position: static;
    max-width: 1500px;
    margin: 0 auto;
    margin-top: 165px;
    background-color: white;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 20px gray;
}

.container h1 {
    color: #12372A;
    margin-bottom: 25px;
}

.container h2 {
    text-align: center;
    margin-bottom: 20px;
    font-size: 30px;
    color: #12372A;
}

.dashboard-container {
    max-width: 1500px;
}

.profile-container {
    max-width: 1500px;
}

.listings-container {
    max-width: 1500px;
}

.add-listing-container {
    max-width: 1500px;
}

/* Welcome Section */

.welcome {
    margin-bottom: 30px;
}

.welcome h2 {
    font-size: 30px;
}

/* Fieldset */

fieldset {
    border: 2px solid black;
    border-radius: 20px;
    padding: 20px;
    background-color: antiquewhite;
}

legend {
    background-color: black;
    color: white;
    padding: 10px;
    border-radius: 10px;
    font-size: 20px;
}

label {
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 20px;
    font-weight: bold;
    color: #12372A;
}

/* Table */

table {
    width: 100%;
    border-collapse: collapse;
}

th,
td {
    border: 1px solid gray;
    padding: 15px;
    text-align: center;
}

th {
    background-color: antiquewhite;
}

/* Input */

input[type="text"],
input[type="number"],
input[type="file"],
textarea {
    width: 100%;
    padding: 10px;
    border-radius: 10px;
    border: 1px solid black;
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 18px;
}

textarea {
    resize: vertical;
}

/* Submit and Reset */

input[type="submit"],
input[type="reset"] {
    margin-top: 15px;
    padding: 10px 20px;
    border: none;
    width: 100%;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 18px;
}

input[type="submit"] {
    background-color: #1D5B4F;
}

input[type="submit"]:hover {
    background-color: #12372A;
}

input[type="reset"] {
    background-color: red;
}

input[type="reset"]:hover {
    background-color: darkred;
}

/* Buttons */

button {
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    background-color: #1D5B4F;
    color: white;
    cursor: pointer;
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 16px;
}

button:hover {
    background-color: #12372A;
}

/* My Listings */

.listings-container button {
    padding: 10px 30px;
    font-size: 18px;
    margin: 10px;
}

.my-listings-table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fffaf0;
}

.my-listings-table tr,
.my-listings-table td {
    border: none;
}

.my-listings-table td {
    padding: 10px 15px;
    text-align: left;
}

.my-listings-table label {
    color: #12372A;
}

.my-listings-table input {
    width: 60%;
    background-color: #f1f8f5;
    border: 1px solid #1D5B4F;
    color: #12372A;
}

.my-listings-table input:focus {
    outline: none;
    border-color: #12372A;
    background-color: white;
}

.my-listings-table button {
    margin: 5px 0;
    padding: 10px 30px;
    background-color: #1D5B4F;
}

.my-listings-table button:hover {
    background-color: #12372A;
}

/* Add Listing */

.add-listing-container h2 {
    text-align: center;
    color: #12372A;
    background-color: #e8f3ee;
    padding: 15px;
    border-radius: 15px;
    margin-bottom: 25px;
}

.add-listing-container fieldset {
    border: none;
    padding: 25px;
    background-color: #fff8e7;
    border-radius: 20px;
}

.add-listing-container legend {
    background-color: #1D5B4F;
    color: white;
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 22px;
    font-weight: bold;
}

.add-listing-container table {
    width: 100%;
    border-collapse: collapse;
}

.add-listing-container table tr,
.add-listing-container table td {
    border: none;
}

.add-listing-container table td {
    padding: 12px;
    text-align: left;
}

.add-listing-container label {
    color: #12372A;
    font-size: 20px;
    font-weight: bold;
}

.add-listing-container input[type="text"],
.add-listing-container input[type="number"],
.add-listing-container input[type="file"],
.add-listing-container textarea {
    width: 100%;
    padding: 12px;
    border-radius: 10px;
    border: 2px solid #9bc7b8;
    background-color: #f4fbf7;
    color: #12372A;
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 18px;
}

.add-listing-container input[type="text"]:focus,
.add-listing-container input[type="number"]:focus,
.add-listing-container input[type="file"]:focus,
.add-listing-container textarea:focus {
    outline: none;
    border-color: #1D5B4F;
    background-color: white;
}

.add-listing-container textarea {
    resize: vertical;
}

.add-listing-container input[type="submit"],
.add-listing-container input[type="reset"] {
    margin-top: 20px;
    padding: 10px 15px;
    width: 20%;
    border: none;
    border-radius: 10px;
    color: white;
    cursor: pointer;
    font-family: Cambria, Cochin, Georgia, serif;
    font-size: 16px;
}

.add-listing-container input[type="submit"] {
    background-color: #1D5B4F;
}

.add-listing-container input[type="submit"]:hover {
    background-color: #12372A;
}

.add-listing-container input[type="reset"] {
    background-color: #c94c4c;
    margin-left: 10px;
}

.add-listing-container input[type="reset"]:hover {
    background-color: #a83232;
}

.add-listing-container form {
    text-align: center;
}

/* Profile */

.profile-card {
    width: 100%;
}

.profile-header {
    display: flex;
    align-items: center;
    gap: 20px;
    background-color: antiquewhite;
    padding: 25px;
    border-radius: 20px;
    border: 1px solid gray;
    margin-bottom: 25px;
}

.profile-header h2 {
    font-size: 35px;
    color: #12372A;
    margin-bottom: 5px;
}

.profile-header p {
    color: gray;
    font-size: 18px;
}

.profile-image {
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background-color: #1D5B4F;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 45px;
}

.profile-info {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    margin-bottom: 25px;
}

.info-box {
    width: calc(50% - 10px);
    background-color: antiquewhite;
    padding: 20px;
    border-radius: 20px;
    border: 1px solid gray;
}

.info-box label {
    display: block;
    color: #12372A;
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 8px;
}

.info-box p {
    color: black;
    font-size: 17px;
}

.buttons {
    display: flex;
    gap: 15px;
}

.buttons button {
    padding: 10px 20px;
}

.back-btn {
    padding: 10px 20px;
    border-radius: 10px;
    background-color: #1D5B4F;
    color: white;
    cursor: pointer;
    text-decoration: none;
    font-size: 16px;
}

.back-btn:hover {
    background-color: #12372A;
}

/* Recent Listings */

#recent_listings {
    border: none;
    border-collapse: collapse;
}

#recent_listings tr,
#recent_listings td {
    border: none;
}

#recent_listings td {
    padding: 10px;
    text-align: left;
}