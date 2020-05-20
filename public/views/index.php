<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>The MFD Test Task</title>
    <meta name="description" content="MFD Test Task">
    <meta name="author" content="Reinis Kasparsons">
    <link rel="stylesheet" href="/css/styles.css?v=1">
    <link rel="stylesheet" href="/css/helpers.css?v=1">

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
            integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ=" crossorigin="anonymous"></script>
</head>
<body>
<table id="searchTable" width="533" border="0" cellspacing="0" cellpadding="2">
    <tbody>
    <tr class="titles">
        <td style="width:400px">Personal Code (e.g 00000-010170)</td>
    </tr>
    <tr class="item">
        <td>
            <input class="w200px text-center" type="text" name="personal_code" id="perscode"/>
            <div class="results">
            </div>
            <div class="error">
            </div>
        </td>
    </tr>
    </tbody>
</table>
<button class="open-button" onclick="openForm()">Open Form</button>

<div class="form-popup" id="myForm">
    <div class="outer-form-container">
        <form action="#" class="form-container">
            <h1>Form step 2</h1>

            <button type="submit" class="btn">Step 2</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
</div>

<script src="/js/scripts.js"></script>
</body>
</html>