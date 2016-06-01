<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wine Price Search</title>
    <link rel="stylesheet" href="assets/css/build/style.css">
    <script src="assets/js/build/vendor.bundle.js"></script>
    <script src="assets/js/build/index.js"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Wine Price Search</h3>
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
</body>
</html>
