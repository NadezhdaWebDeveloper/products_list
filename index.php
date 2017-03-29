<?php
    require __DIR__ . "/model.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products List</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="styles/fonts.css">
    <link rel="stylesheet" href="styles/bootstrap-grid/bootstrap.min.css">
    <link rel="stylesheet" href="styles/bootstrap-grid/bootstrap-theme.min.css">
    <link rel="stylesheet" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
      <div class="container">
        <h2>Header</h2>
      </div>
    </header>

    <div id="products" class="container">
      <div class="row">
        <?php foreach (getItems(1, 4) as $item): ?>
            <div class="col-md-3 col-xs-6">
              <div class="card">
                <div class="card__img"><img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>"></div>
                <div class="card__title"><?php echo $item['title']; ?></div>
                <div class="card__descr"><?php echo $item['description']; ?></div>

                <div class="card__price">
                  <span class="card__price__discount">
                    $<?php echo $item['discountCost'] ? $item['discountCost'] : $item['cost']; ?>
                  </span>

                  <?php if ($item['discountCost'] !== null): ?>
                    <span class="card__price__cost">
                      $<?php echo $item['cost']; ?>
                    </span>
                    <div class="card__info card__info--sale">Sale</div>
                  <?php endif; ?>
                </div>

                <?php if ($item['new']): ?>
                  <div class="card__info card__info--new">New</div>
                <?php endif; ?>

                <div class="card__btns">
                  <button type="button" name="button" class="btn btn--add">Add to cart</button>
                  <button type="button" name="button" class="btn btn--view">View</button>
                </div>

              </div>
            </div>
        <?php endforeach; ?>
      </div>
    </div>

    <div id="rowLoadMore" class="rowLoadMore container">
      <button id="btn_load_more" class="btn load_more">
        <img class="gif_loader" src="../img/loader.gif" />
        <span>Load more</span>
      </button>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-4">
            <div class="footerCard">
              <h3>Hot offers</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Lorem ipsum dolor sit amet.</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>consectetur adipisicing elit</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Sed do eiusmod adipisicing elit</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Lorem ipsum dolor sit amet.</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>consectetur adipisicing elit</span></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="footerCard">
              <h3>Hot offers</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <ul>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Lorem ipsum dolor sit amet.</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>consectetur adipisicing elit</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Sed do eiusmod adipisicing elit</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>Lorem ipsum dolor sit amet.</span></li>
                <li><span><i class="fa fa-caret-right" aria-hidden="true"></i></span><span>consectetur adipisicing elit</span></li>
              </ul>
            </div>
          </div>
          <div class="col-sm-4">
            <div class="footerCard storeInfo">
              <h3>Store information</h3>
              <ul>
                <li><span><i class="fa fa-map-marker" aria-hidden="true"></i></span><span> Company Inc., 8901 Marmora Road, Glasgow, D04 89GR </span></li>
                <li><span><i class="fa fa-phone" aria-hidden="true"></i></span><span> Call us now toll free: (800) 2345-6789 </span></li>
                <li><span><i class="fa fa-envelope-o" aria-hidden="true"></i></span><span> Customer support: support@example.com Press: pressroom@example. </span></li>
                <li><span><i class="fa fa-skype" aria-hidden="true"></i></span><span> Skype: sample-username </span></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery-3.2.0.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>
