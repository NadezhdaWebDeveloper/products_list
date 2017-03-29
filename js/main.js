$(function() {
  var $products = $('#products'),
      $btn_load_more = $('#btn_load_more'),
      defaultProductsQty = 4,
      totalNow = 4,
      total = 4,
      page = 2,
      per_page = 4;

  function loadMore(page, per_page){

    $.ajax({
      method: "GET",
      url: "list.php",
      dataType: "JSON",
      data:{
        page: page,
        per_page: per_page
      }
    }).done(function(data) {
      console.log('done');

      var newRow = '';
      $.each(data.entities, function(i, val) {
        var card__price__discount = val.discountCost ? val.discountCost : val.cost,
            card__price__cost = val.discountCost !== null ? '<span class="card__price__cost">$' + val.cost + '</span><div class="card__info card__info--sale">Sale</div>' : '',
            card__info__new = val.new ? '<div class="card__info card__info--new">New</div>' : '';

        newRow +=
          '<div class="col-md-3 col-xs-6">' +
            '<div class="card">' +
              '<div class="card__img"><img src="'+ val.img +'" alt="'+ val.title +'"></div>' +
              '<div class="card__title">'+ val.title +'</div>' +
              '<div class="card__descr">'+ val.description +'</div>' +

              '<div class="card__price">'+
                '<span class="card__price__discount">$' + card__price__discount + '</span>' + card__price__cost +
              '</div>' + card__info__new +

              '<div class="card__btns">' +
                '<button type="button" name="button" class="btn btn--add">Add to cart</button>' +
                '<button type="button" name="button" class="btn btn--view">View</button>' +
              '</div>' +
            '</div>' +
          '</div>'
      });

      if ($products.find('.row--hidden').length > 0 && totalNow === total) {
        $('#btn_load_more').closest('.rowLoadMore').remove();
      }

      totalNow += data.entities.length;
      total = data.total;

      if ($products.find('.row--hidden').length === 1) {
        $products.find('.row--hidden').fadeIn(1000);
        $btn_load_more.removeClass('loading');
      }
      $products.append('<div class="row productsWrap__row row--hidden">'+ newRow +'</div>');

    }).fail(function(data) {
      console.log('fail');
    });
  }

  loadMore(page, per_page);
  page++;

  $('body').on('click', '#btn_load_more', function(e){
    e.preventDefault();

    if ($products.find('.row--hidden').length === 0) {
      $btn_load_more.addClass('loading');
    }

    if ($products.find('.row--hidden').length > 1) {
      $($products.find('.row--hidden')[0]).removeClass('row--hidden');
    }

    if ($products.find('.row--hidden').length === 1) {
      $products.find('.row--hidden').fadeIn(1000).removeClass('row--hidden');
      if (totalNow === total) {
        $('#btn_load_more').closest('.rowLoadMore').remove();
      }
    }

    if ( (totalNow === total && total !== defaultProductsQty) || totalNow > total ) {
      $('#btn_load_more').closest('.rowLoadMore').remove();
    }else{
      loadMore(page, per_page);
      page++;
    }

  });
});
