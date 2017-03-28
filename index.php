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
    <link rel="stylesheet" href="styles/main.css">
</head>
<body>
    <header>
        <h2>Header</h2>
    </header>
    <div class="container">
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

      <div class="row row--load_more">
          <button  class="btn">Load more</button>
      </div>
    </div>

    <footer>
        <h2>Footer</h2>
    </footer>

    <script src="js/jquery-3.2.0.min.js"></script>
</body>
</html>
