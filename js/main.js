$(function() {
  var $products = $('#products');
      defaultProductsQty = 4,
      totalNow = 4,
      total = 4,
      page = 2,
      per_page = 4;

  function load_more(page=2, per_page=4, clicked=true){
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

      totalNow += data.entities.length;
      total = data.total;

      if ($products.find('.row.hidden').length > 0) {
        $products.find('.row.hidden').removeClass('hidden');
      }
      $products.append('<div class="row hidden">'+ newRow +'</div>');

    }).fail(function(data) {
      console.log('fail');
    });
  }


  load_more(page, per_page, false);
  page++;

  $('body').on('click', '#btn_load_more', function(e){
    e.preventDefault();

    $products.find('.row:last-of-type').removeClass('hidden');

    if ( (totalNow === total && total !== defaultProductsQty) || totalNow > total ) {
      $('#btn_load_more').closest('.rowLoadMore').remove();
    }else{
      load_more(page, per_page);
      page++;
    }

  });





});
