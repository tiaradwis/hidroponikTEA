const plus = document.getElementById("increment");
const minus = document.getElementById("decrement");
const num = document.getElementById("counter");
let x = num.value;

if (plus) {
    plus.addEventListener("click", function () {
        x++;
        num.value = x;
    });
}
if (minus) {
    minus.addEventListener("click", function () {
        if (x > 1) {
            x--;
            num.value = x;
        }
    });
}

// let a = ;
// if (plus) {

//     plus.addEventListener("click", function () {
//         a++;
//         a = a < 10 ? a : a;
//         x = a;
//         num.innerText = x;

//         console.log(x);
//     });
// } else if (minus) {
//     minus.addEventListener("click", function () {
//         a--;
//         a = a < 10 ? a : a;
//         num.textContent = a;
//     });
// }

// $("#increment").click(function (e) {
//     e.preventDefault();
//     var qty_old = $(".input-qty").val();

//     var values = parseInt(qty_old);

//     values = isNaN(values) ? 0 : values;
//     values++;
//     $(".input-qty").val(values);

// });

// $("decrement").click(function (e) {
//     e.preventDefault();
//     var qty_old = $(".input-qty").val();

//     var values = parseInt(qty_old);

//     values = isNaN(values) ? 0 : values;
//     if (values > 1) {
//         values--;
//         $(".input-qty").val(values);
//     }

// });

function gotg() {
    const ab = document.getElementById("get_seller");
    const as = document.getElementById("nama_toko");
    const ac = document.getElementById("valnamatoko");

    ac.addEventListener("click", function () {
        ab.submit();
    });
}
