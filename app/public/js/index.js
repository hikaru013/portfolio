// マイページの処理
let nav = document.querySelector('#navArea');
let btn = document.querySelector('#toggle-btn');

let mask = document.querySelector('#mask');

window.onload = function(){
btn.onclick = () => {
    nav.classList.toggle("open");
    btn_span.classList.toggle("abc");
};

mask.onclick = () =>{
    nav.classList.toggle("open");
}
};
// マイページの処理ここまで

$(document).on('change', ':file', function() {
            var input = $(this),
            numFiles = input.get(0).files ? input.get(0).files.length : 1,
            label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
            input.parent().parent().next(':text').val(label);

            var files = !!this.files ? this.files : [];
            if (!files.length || !window.FileReader) return; // no file selected, or no FileReader support
            if (/^image/.test( files[0].type)){ // only image file
                var reader = new FileReader(); // instance of the FileReader
                reader.readAsDataURL(files[0]); // read the local file
                reader.onloadend = function(){ // set image data as background of div
                    input.parent().parent().parent().prev('.imagePreview').css("background-image", "url("+this.result+")");

                    // imagePreview内のイメージを削除
                    $(".imagePreview img").remove()
                    
                }
            }
        });