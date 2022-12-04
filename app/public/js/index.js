let nav = document.querySelector('#navArea');
let btn = document.querySelector('#toggle-btn');
let btn_span = document.querySelector('#toggle-btn span');
let mask = document.querySelector('#mask');

window.onload = function(){
btn.onclick = () => {
    nav.classList.toggle("open");
    btn_span.classList.toggle("abc");
};

// btn_span.onclick = () =>{
//     nav.classList.toggle("open");
// };

mask.onclick = () =>{
    nav.classList.toggle("open");
}
};