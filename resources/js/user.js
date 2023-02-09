
$(document).ready(() => {
    $('#post_avata').change(function () {
        const file = this.files[0];
        if (file){
          let reader = new FileReader();
          reader.onload = function(event){
            $('.img_account_profile').attr('src', event.target.result);
          }
          reader.readAsDataURL(file);
        }
    });
});