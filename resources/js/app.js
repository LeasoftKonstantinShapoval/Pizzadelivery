require('./bootstrap');


function calcCartPriceAndDelivery() {
    const cartWrapper = document.querySelector('.cart-wrapper');
    const priceElements = cartWrapper.querySelectorAll('.price__currency');
    const totalPriceEl = document.querySelector('.total-price');
    const deliveryCost = document.querySelector('.delivery-cost');
    const cartDelivery = document.querySelector('[data-cart-delivery]');

    // Общая стоимость товаров
    let priceTotal = 0;

    // Обходим все блоки с ценами в корзине
    priceElements.forEach(function (item) {
        // Находим количество товара
        const amountEl = item.closest('.cart-item').querySelector('[data-counter]');
        // Добавляем стоимость товара в общую стоимость (кол-во * цену)
        priceTotal += parseInt(item.innerText) * parseInt(amountEl.innerText);
    });

    // Отображаем цену на странице

    totalPriceEl.innerText = priceTotal;

    // Скрываем / Показываем блок со стоимостью доставки
    if (priceTotal > 0) {
        cartDelivery.classList.remove('none');
    } else {
        cartDelivery.classList.add('none');
    }

    // Указываем стоимость доставки
    if (priceTotal >= 399) {
        deliveryCost.classList.add('free');
        deliveryCost.innerText = 'безкоштовна';
    } else {
        deliveryCost.classList.remove('free');
        deliveryCost.innerText = '50 ₴';
        totalPriceEl.innerText  = priceTotal + 50;
    }
}


// Div внутри корзины, в который мы добавляем товары
const cartWrapper = document.querySelector('.cart-wrapper');

function cartSave(itemId, counter){
    cart.forEach((item) => {

        if (item.id === itemId.value) {
            item.counter=counter.innerText;

            return {
                ...item,
                counter
            }
        }
    });

    localStorage.setItem("CART", JSON.stringify(cart));
}


// Добавляем прослушку на всем окне
window.addEventListener('click', function (event) {

    // Объявляем переменную для счетчика
    let counter;

    // Проверяем клик строго по кнопкам Плюс либо Минус
    let itemId;

    if (event.target.dataset.action === 'plus' || event.target.dataset.action === 'minus') {
        // Находим обертку счетчика
        const counterWrapper = event.target.closest('.counter-wrapper');
        // Находим див с числом счетчика
        counter = counterWrapper.querySelector('[data-counter]');
        itemId = counterWrapper.querySelector('[data-id]');
    }

    // Проверяем является ли элемент по которому был совершен клик кнопкой Плюс
    if (event.target.dataset.action === 'plus') {
        counter.innerText = ++counter.innerText;
        cartSave(itemId, counter);
    }

    // Проверяем является ли элемент по которому был совершен клик кнопкой Минус
    if (event.target.dataset.action === 'minus') {

        // Проверяем чтобы счетчик был больше 1
        if (parseInt(counter.innerText) > 1) {
            // Изменяем текст в счетчике уменьшая его на 1
            counter.innerText = --counter.innerText;
            cartSave(itemId, counter);
        } else if (event.target.closest('.cart-wrapper') && parseInt(counter.innerText) === 1) {
            // Удаляем товар из корзины
            event.target.closest('.cart-item').remove();

            cart.forEach(function(item, index, object) {

                if (item.id === itemId.value) {
                    object.splice(index, 1);
                }
            });

            localStorage.setItem("CART", JSON.stringify(cart));

            // Отображение статуса корзины Пустая / Полная
            toggleCartStatus();

            // Пересчет общей стоимости товаров в корзине
            calcCartPriceAndDelivery();
        }

    }

    // Проверяем клик на + или - внутри коризины
    if (event.target.hasAttribute('data-action') && event.target.closest('.cart-wrapper')) {
        // Пересчет общей стоимости товаров в корзине
        calcCartPriceAndDelivery();
    }
});
let cart = JSON.parse(localStorage.getItem("CART")) || [];

// Запускаем getProducts
getProducts(cart);

async function getProducts(cart) {

    const productsContainer = document.querySelector('#products-container');

    cart.forEach(function (item) {
        const productHTML = `<div class="cart-item" data-id="${item.id}">
								<div class="cart-item__top">
									<div class="cart-item__img">
                                    <img class="product-img" src="${item.imgSrc}" alt="${item.title}">
									</div>
									<div class="cart-item__desc">
									<input type="hidden" name="ids${item.id}" value="${item.id}">
										<div class="cart-item__title">${item.title}</div>
										<div class="cart-item__weight">${item.weight}</div>

                <div class="cart-item__details">

                <div class="items items--small counter-wrapper">
                <div class="items__control" data-action="minus">-</div>
                <div class="items__current" data-counter="">${item.counter}</div>
                <input type="hidden" data-id="${item.id}" value="${item.id}">
                <div class="items__control" data-action="plus">+</div>
                </div>

                <div class="price">
                <div class="price__currency">${item.price}</div>
                <input type="hidden" name="totalamount" value="${item.price}">
                </div>

                </div>

                </div>
                </div>
                </div>`;

        productsContainer.insertAdjacentHTML('beforeend', productHTML);

        // Отображение статуса корзины Пустая / Полная
        toggleCartStatus();

        // Пересчет общей стоимости товаров в корзине
        calcCartPriceAndDelivery();
    });
}


// Отслеживаем клик на странице
window.addEventListener('click', function (event) {
    // Проверяем что клик был совершен по кнопке "Добавить в корзину"
    if (event.target.hasAttribute('data-cart')) {

        // Находим карточку с товаром, внутри котрой был совершен клик
        const card = event.target.closest('.card');

        // Собираем данные с этого товара и записываем их в единый объект productInfo
        const productInfo = {
            id: card.dataset.id,
            imgSrc: card.querySelector('.product-img').getAttribute('src'),
            title: card.querySelector('.item-title').innerText,
            itemsInBox: card.querySelector('[data-items-in-box]').innerText,
            weight: card.querySelector('.price__weight').innerText,
            price: card.querySelector('.price__currency').innerText,
            counter: card.querySelector('[data-counter]').innerText,
        };

        // Проверять если ли уже такой товар в корзине
        const itemInCart = cartWrapper.querySelector(`[data-id="${productInfo.id}"]`);

        // Если товар есть в корзине
        if (itemInCart) {
            const counterElement = itemInCart.querySelector('[data-counter]');
            counterElement.innerText = parseInt(counterElement.innerText) + parseInt(productInfo.counter);
        } else {
            // Если товара нет в корзине

            // Собранные данные подставим в шаблон для товара в корзине
            const cartItemHTML = `<div class="cart-item" data-id="${productInfo.id}">
								<div class="cart-item__top">
									<div class="cart-item__img">
										<img src="${productInfo.imgSrc}" alt="${productInfo.title}">
									</div>
									<div class="cart-item__desc">
									<input type="hidden" name="ids${productInfo.id}" value="${productInfo.id}">
										<div class="cart-item__title">${productInfo.title}</div>
										<div class="cart-item__weight">${productInfo.weight}</div>

                <div class="cart-item__details">

                <div class="items items--small counter-wrapper">
                <div class="items__control" data-action="minus">-</div>
                <div class="items__current" data-counter="">${productInfo.counter}</div>
                <input type="hidden" name="productcounter${productInfo.id}" value="${productInfo.counter}">
                <div class="items__control" data-action="plus">+</div>
                </div>

                <div class="price">
                <div class="price__currency">${productInfo.price}</div>
                <input type="hidden" name="totalamount" value="${productInfo.price}">
                </div>

                </div>

                </div>
                </div>
                </div>`;

            // Отобразим товар в корзине
            cartWrapper.insertAdjacentHTML('beforeend', cartItemHTML);

            cart.push({
                ...productInfo
            })

            localStorage.setItem("CART", JSON.stringify(cart));
        }

        // Сбрасываем счетчик добавленного товара на "1"
        card.querySelector('[data-counter]').innerText = '1';

        // Отображение статуса корзины Пустая / Полная
        toggleCartStatus();

        // Пересчет общей стоимости товаров в корзине
        calcCartPriceAndDelivery();

    }
});

// Асинхронная функция получения данных из файла products.json


function toggleCartStatus() {

    const cartWrapper = document.querySelector('.cart-wrapper');
    const cartEmptyBadge = document.querySelector('[data-cart-empty]');
    const orderForm = document.querySelector('#order-form');

    if (cartWrapper.children.length > 0) {
        console.log('FULL');
        cartEmptyBadge.classList.add('none');
        orderForm.classList.remove('none');
    } else {
        console.log('EMPTY');
        cartEmptyBadge.classList.remove('none');
        orderForm.classList.add('none');
    }

}
