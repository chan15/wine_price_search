<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta property="og:title" content="Wine Price Search"/>
    <meta property="og:image" content="http://wine.chan15.info/assets/imgs/looking_for_wine.jpg"/>
    <meta property="og:site_name" content="David Walsh Blog"/>
    <meta property="og:description" content="comparing win price">
    <title>Wine Price Search</title>
    <link href='https://fonts.googleapis.com/css?family=Oswald:400,700,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="assets/css/build/style.css">
    <script src="assets/js/build/vendor.bundle.js"></script>
    <script src="assets/js/build/index.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="title">Wine Price Search</h3>
            </div>
            <div class="col-md-12">
                <form class="form-inline" id="wine_form">
                    <div class="form-group">
                        <input type="text" name="wine_name" size="30" id="wine_name" class="form-control form-input" placeholder="格蘭利威" required>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="source[]"  value="JiaPin" checked> 珈品
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="source[]"  value="CWine" checked> 忠佳
                        </label>
                    </div>
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="source[]"  value="NineCity" checked> 洋酒城
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary">搜尋</button>
                </form>
            </div>
            <div class="col-md-12 text-center"><img src="assets/imgs/ajax-loader.gif" id="loader" class="hide"></div>
            <div class="col-md-12">
                <ul id="ajax_content"></ul>
            </div>
        </div>
    </div>
    <script id="myTemplate" type="text/x-jsrender">
        <li>
            <div class="text-center">{{:img}}</div>
            <h3>{{:vendorName}}</h3>
            <p><a href="{{:url}}" target="_blank">{{:title}}</a></p>
        </li>
    </script>
</body>
</html>
