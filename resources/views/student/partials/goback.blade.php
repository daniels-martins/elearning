<div class="mb-7">
   <span class="cursor-pointer hover:bg-gray-300"
      onclick="goback()">&#8592;
      Back</span>
</div>

<script>
   function goback(){
      let backAndFortRouteshAreTheSame = document.referrer == window.location.href;
      let numofRedirects = 0;
      if (backAndFortRouteshAreTheSame) {
         window.history.go(-2)
         // while (backAndFortRouteshAreTheSame) { numofRedirects++;// }
      }
      else{
         window.history.go(-1)
      }
   }
</script>