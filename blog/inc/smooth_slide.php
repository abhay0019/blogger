
  <script>
    $(document).ready(function(){
    $(".navbar a, footer a").on('click',function(event){
      if(this.hash!="")
      {
        var hash=this.hash;
        //alert(hash);
        event.preventDefault();
        //alert("done");
        $('body,html').animate({
          scrollTop: $(hash).offset().top
        },900,function(){
          window.location.hash=hash;
        }
        );
      }
    });     
    })
  </script>
