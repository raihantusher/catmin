
<script>

$( "select" )
  .change(function () {

    $( "select option:selected" ).each(function() {
      var str ="#"+$( this ).val();

      $("#announce").hide();
      $("#video").hide();
      $("#link").hide();
      $("#quiz").hide();
      $("#article").hide();
      $(str).show();


    });
    //$( "div" ).text( str );
  })
  .change();
</script>
