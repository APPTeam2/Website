/** -
 * 
 * @author Antoine GUILLOT
 * @date 08/06/16
 * @version 1
 */

$(function() {
  
  var $list, $newItemForm;
  $list = $('ul');
  $newItemForm = $('#newItemForm');

  $newItemForm.on('submit', function(e) {
    e.preventDefault();
    var text = $('input:text').val();
    $list.append('<li>' + text + '</li>');
    $('input:text').val('');
  });

  $list.on('click', 'li', function() {
    var $this = $(this);
    $this.remove();
  });

});