<footer>
    <div class="container">
        <div class="footer-wrapper">
            <div class="footer-left">
                <div class="phones">
                    <div class="phone-item">
                        <span>Для прийому замовлень:</span>
                        <a href="tel:+380661234567">+380661234567</a>
                        <a href="tel:+380939876545">+380939876545</a>
                        <a href="tel:+380974567892">+380974567892</a>
                    </div>
                </div>
                <div class="work-time">
                    Графік роботи з буднів з 9:00 до 22:00
                </div>
                <div class="work-email">
                    <a href="mailto:email.com">email.com</a>
                </div>
            </div>
            <div class="footer-center">
                <div class="social">
                    <a href="">Ми у інстаграмм ></a>
                    <a href="">Ми у фейсбуці ></a>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <span>©2022. L`ora della</span>
        </div>
    </div>
</footer>

<!-- Подключаем скрипты -->
<script src="{{ asset('js/app.js') }}"></script>
<script>
    function submitOrder(){
        let cart = JSON.parse(localStorage.getItem("CART")) || [];
        const totalPriceEl = localStorage.getItem("orderSumm") ? localStorage.getItem("orderSumm") : document.getElementById('totalPrice').innerHTML;
        const uname = document.getElementById('uname').value;
        const pwd = document.getElementById('pwd').value;
        const address = document.getElementById('address').value;
        const paymentType = document.getElementById('paymentType').value;
        const useBonuses = document.getElementById('bonusCheckbox').value

        if (cart){
            axios.post( '/submitOrder', {
                orderData: cart,
                totalPrice: totalPriceEl,
                username: uname,
                phoneNumber: pwd,
                address: address,
                paymentType: paymentType,
                useBonuses: useBonuses
            })
                .then((response) => {
                    if (response.data) {
                        const orderId = response.data
                        localStorage.removeItem("CART");
                        localStorage.removeItem("orderSumm");
                        window.location.href = `/show/${orderId}`;
                    }
                })
        }
    }

    function validate() {
        const totalPriceEl = document.querySelector('.total-price');

        if(!localStorage.getItem("orderSumm")){
            localStorage.setItem("orderSumm", totalPriceEl.innerText);
        }

        const bonus = document.getElementById('userBonus').value;

        if (document.getElementById('bonusCheckbox').checked) {
            document.getElementById('bonusCheckbox').value = 1;
            if(parseInt(bonus) >= parseInt(localStorage.getItem("orderSumm"))){
                totalPriceEl.innerText = 0;
            }else if(parseInt(bonus) < parseInt(localStorage.getItem("orderSumm"))) {
                totalPriceEl.innerText = localStorage.getItem("orderSumm")-bonus;
            }
        } else {
            document.getElementById('bonusCheckbox').value = 0;
            totalPriceEl.innerText = localStorage.getItem("orderSumm");
            localStorage.removeItem("orderSumm");
        }
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
