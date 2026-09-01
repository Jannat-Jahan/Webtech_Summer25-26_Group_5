<?php
header("Content-Type: text/css");
?>

*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body{
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    background-color: #f4f1e8;
    padding: 20px;
    line-height: 1.5;
}


.container{
    max-width: 900px;
    margin: 0 auto;
    background-color: #fffdf8;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(60, 70, 50, 0.20);
    position: relative;
    z-index: 1;
}

/* Headings */

h1{
    color: #315c4a;
    text-align: center;
    margin-bottom: 20px;
    font-size: 35px;
}

h2{
    margin-bottom: 10px;
}


form{
    display: block;
}

fieldset{
    border: 2px solid #6f927e;
    border-radius: 20px;
    padding: 20px;
    background-color: #edf2e8;
    margin-bottom: 20px;
}

legend{
    padding: 10px;
    background-color: #315c4a;
    color: white;
    border-radius: 20px;
    font-size: 15px;
}


table{
    width: 100%;
    border-collapse: collapse;
}

tr{
    margin-bottom: 10px;
}

td{
    padding: 8px;
}

label{
    margin-bottom: 10px;
}


input[type="text"],
input[type="date"],
input[type="email"],
input[type="password"],
input[type="tel"],
input[type="file"],
select,
textarea{
    width: 100%;
    padding: 10px;
    margin: 0 10px;
    border: 1px solid #9aac9b;
    border-radius: 10px;
    background-color: #fffdf8;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    font-size: 14px;
}


textarea{
    resize: none;
}



input[type="text"]:focus,
input[type="date"]:focus,
input[type="email"]:focus,
input[type="password"]:focus,
input[type="tel"]:focus,
input[type="file"]:focus,
select:focus,
textarea:focus{
    outline: none;
    border: 2px solid #5f806c;
}


input[type="checkbox"]{
    cursor: pointer;
}


input[type="submit"],
input[type="reset"],
input[type="button"],
button{
    background-color: #a9bea9;
    color: #26382d;
    padding: 10px 20px;
    border: 2px solid #6f927e;
    border-radius: 10px;
    font-size: 16px;
    font-weight: bold;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    cursor: pointer;
}


input[type="submit"]:hover,
input[type="reset"]:hover,
input[type="button"]:hover,
button:hover{
    background-color: #5f806c;
    color: white;
    border-color: #294638;
}


.buttons{
    text-align: center;
    margin-top: 20px;
}

.buttons button{
    margin: 5px;
    min-width: 100px;
}



.login-buttons{
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 20px;
}


.Header h1{
    background-color: #294638;
    color: white;
    padding: 10px;
    margin-bottom: 0;
}


/* Top Navigation Bar */

.topnav{
    background-color: #a9bea9;
    padding: 0 10px;
    margin-top: 0;
    overflow: visible;
    position: relative;
    z-index: 1000;
    margin-bottom: 20px;
    border-radius: 0 0 10px 10px;
}

.topnav::after{
    content: "";
    clear: both;
    display: table;
}

.topnav a{
    float: left;
    display: block;
    text-align: center;
    padding: 14px 20px;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
    color: #26382d;
    transition: background-color 0.2s, color 0.2s;
}

.topnav a:hover{
    background-color: #5f806c;
    color: white;
}

/* Dropdown Menu Styling */

.topnav .dropdown{
    float: left;
    position: relative;
    display: inline-block;
}

.topnav .dropdown .dropbtn{
    font-size: 18px;
    font-weight: bold;
    color: #26382d;
    background-color: transparent;
    padding: 14px 20px;
    border: none;
    border-radius: 0;
    margin: 0;
    cursor: pointer;
    font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    display: block;
    transition: background-color 0.2s, color 0.2s;
}

.topnav .dropdown:hover .dropbtn{
    background-color: #5f806c;
    color: white;
    border-color: transparent;
}

.topnav .dropdown-content{
    display: none;
    position: absolute;
    top: 100%;
    left: 0;
    background-color: #ffffff;
    min-width: 220px;
    box-shadow: 0 8px 16px rgba(40, 50, 40, 0.3);
    border: 1px solid #6f927e;
    border-radius: 0 0 10px 10px;
    z-index: 9999;
    overflow: hidden;
}

.topnav .dropdown-content a{
    float: none;
    color: #26382d;
    padding: 12px 18px;
    text-decoration: none;
    display: block;
    text-align: left;
    font-size: 16px;
    font-weight: bold;
    border-bottom: 1px solid #edf2e8;
}

.topnav .dropdown-content a:last-child{
    border-bottom: none;
}

.topnav .dropdown-content a:hover{
    background-color: #5f806c;
    color: white;
}

.topnav .dropdown:hover .dropdown-content{
    display: block;
}


.topnav + .container{
    margin-top: 20px;
}


.container p{
    margin: 10px 0;
    font-size: 16px;
}


.footer h2{
    background-color: #294638;
    color: white;
    padding: 10px;
    text-align: center;
    margin-top: 20px;
    font-size: 15px;
}
