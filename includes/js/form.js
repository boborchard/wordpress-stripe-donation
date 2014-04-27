$('.selections li').on('click', function () {
  set_active(this);
  var selector = get_selector_from_selection(this);
  var $item = $(selector);
  clear_selection();
  $item.show();
  update_form_amount(this);
});

var set_active = function (el) {
  $('.selections li').removeClass("active");
  $(el).addClass('active');
};

var get_selector_from_selection = function (el) {
  var selection = $(el).data('selection');
  return "[data-selection-option='" + selection + "']";
};

var clear_selection = function () {
  $('.content-piece').hide();
};

var update_form_amount = function (selection) {
  var value = $(selection).data('amount');
  $('#donation_amount').val(value);
};

$(document).ready(function () {
  $('.selections li').first().click();

});
