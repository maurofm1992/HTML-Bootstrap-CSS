$(function() {
  var site = {
    init: function () {
      this.eventBind();
    },

    eventBind: function() {
      $('#baby_name')
        .on('keyup', this.suggest)
        .on('click', this.showSuggestions);
      $('#suggestions').on('click', this.select);
      $(document).on('click', this.hide);
    },

    suggest: function() {
      var filter = $(this).val();

      if(filter != "")
      {
        $.ajax({
          type: "POST",
          url: "php/autocomplete.php",
          data: { search: filter },
          success: function(result) {
            $('#suggestions').html(result).show();
          }
        });
      }
      else
      {
        $('#suggestions').html("").show();
      }

      return false;
    },

    showSuggestions: function(){
      var text = $(this).val()

      if(text == "")
      {
        return;
      }

      $("#suggestions").fadeIn();
    },

    select: function(e) {
      var selection = $(e.target);
      var name = selection[0].textContent;
      $('#baby_name').val(name);
    },

    hide: function(e) {
      var clickedElement = $(e.target);
      if(!clickedElement.hasClass("filter"))
      {
        $('#suggestions').fadeOut();
      }
    }
  };

  site.init();
});
