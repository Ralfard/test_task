let form = document.getElementById('form');
let servicesInput = document.getElementById('servicesInput');
let chengebleArea = document.getElementById('chengebleArea');
let rate = document.getElementById('rate');
let rateSelect = form.rateSelect;
let cost = form.cost;
let submitBtn = document.getElementById('submitBtn');

//отвечают за изменения внутри блока "итого"
let serviceResult = document.getElementById('serviceResult');
let durationResult = document.getElementById('durationResult');
let costResult = document.getElementById('costResult');




form.onsubmit = (e) => {
    cost.value = parseInt(costResult.innerText);
    // data = {
    //     name: form.userName.value,
    //     mail: form.userMail.value,
    //     phone: form.userPhone.value,
    //     description: form.userDescription.value,
    //     service: form.userDescription.value,
    //     rate: form.rateSelect === undefined ? "" : form.rateSelect.value,
    //     duration: durationResult.innerText,
    //     cost: parseInt(costResult.innerText),
    // }
    // data = JSON.stringify(data);
}

servicesInput.onchange = setServicesInput;

setServicesInput();
function setServicesInput() {
    console.log(servicesInput.value);
    switch (servicesInput.value) {
        case 'Рабочее место':
            rate.style.display = 'block';
            chengebleArea.innerHTML = ``;
            serviceResult.innerText = 'Рабочее место';
            durationResult.innerText = "";
            costResult.innerText = '';
            checkCost()
            break;

        case 'Конференц зал':
            rateSelect.value='';
            rate.style.display = 'none';
            duration.style.display = 'block';
            chengebleArea.innerHTML = `
                <div class="input-wrapper" >
                    <label>Продлжительность</label>
                    <input type="number" name="duration" min="1" max="8" value="1" onchange='chengeDuration(event)'>
                </div>
            `;
            serviceResult.innerText = 'Конференц зал';
            durationResult.innerText = "";
            costResult.innerText = '';
            checkCost();
            break;

        case 'Переговорка':
            rateSelect.value='';
            rate.style.display = 'none';
            duration.style.display = 'block';
            chengebleArea.innerHTML = `
                <div class="input-wrapper">
                    <label>Подолжительность</label>
                    <select name="duration" onchange='chengeDuration(event)'>
                        <option value="" selected hidden>Выбирете продолжительность</option>
                        <option value="1 час   =  200р" >1 час   =  200р</option>
                        <option value="4 часа  =  500р" >4 часа  =  500р</option>
                        <option value="День  =  900р" >День  =  900р</option>
                    </select>
                </div>
            `;
            serviceResult.innerText = 'Переговорка';
            durationResult.innerText = "";
            costResult.innerText = '';
            checkCost()
            break;
    }
    log()
}




rateSelect.onchange = setRateSelect;
setRateSelect();

function setRateSelect() {
    if (servicesInput.value === 'Рабочее место') {

        switch (rateSelect.value) {
            case 'Гость':

                duration.style.display = 'block';
                chengebleArea.innerHTML = `
                <label>Продлжительность</label>
                <select name="duration" onchange='chengeDuration(event)'>
                    <option value="" selected hidden>Выбирете продолжительность</option>
                    <option value="4 часа = 300р">4 часа = 300р</option>
                    <option value="1 день = 400р">1 день = 400р</option>
                    <option value="1 месяц = 3500р">1 месяц = 3500р</option>
                    <option value="3 месяца = 9000">3 месяца = 9000</option>
                </select>`;
                serviceResult.innerText = 'Рабочее место\nТариф: Гость';
                durationResult.innerText = '';
                costResult.innerText = '';
                checkCost()
                break;
            case 'Резидент':

                duration.style.display = 'block';
                chengebleArea.innerHTML = `
                <label>Продлжительность</label>
                <select name="duration" onchange='chengeDuration(event)'>
                    <option value="" selected hidden>Выбирете продолжительность</option>
                    <option value="1 месяц = 4500р">1 месяц = 4500р</option>
                    <option value="3 месяца = 12000р">3 месяца = 12000р</option>
                </select>
            `;
                serviceResult.innerText = 'Рабочее место\nТариф: Резидент';
                durationResult.innerText = '';
                costResult.innerText = '';
                checkCost();
                break;
            case 'Агентство':

                duration.style.display = 'block';
                chengebleArea.innerHTML = ``;
                serviceResult.innerText = 'Рабочее место\nТариф: Агентство';
                durationResult.innerText = "Обсуждается совместно со специалистом.";
                costResult.innerText = 'С вами свяжется наш специалист для обсуждения подробностей.';
                checkCost();
                break;
        }
    }
    log();
}




function chengeDuration(event) {
    if (event.target.type === 'number') {
        durationResult.innerText = event.target.value + " часа(-ов)";
        costResult.innerText = event.target.value * 500 + 'p';
        checkCost();
        return
    }
    let arr = event.target.value.split('=');
    durationResult.innerText = arr[0];
    costResult.innerText = arr[1];
    checkCost();
}



function checkCost() {
    if (costResult.innerText !== '')
        submitBtn.disabled = '';
    else submitBtn.disabled = 'true';
}
checkCost();

function log() {
    console.log(rateSelect.value);
    console.log(servicesInput.value);
}

//функции работы с маской номера телефона
function mask(e) {
    var matrix = this.placeholder,// .defaultValue
        i = 0,
        def = matrix.replace(/\D/g, ""),
        val = this.value.replace(/\D/g, "");
    def.length >= val.length && (val = def);
    matrix = matrix.replace(/[_\d]/g, function (a) {
        return val.charAt(i++) || "_"
    });
    this.value = matrix;
    i = matrix.lastIndexOf(val.substr(-1));
    i < matrix.length && matrix != this.placeholder ? i++ : i = matrix.indexOf("_");
    setCursorPosition(i, this)
}
window.addEventListener("DOMContentLoaded", function () {
    var input = document.querySelector(".tel");
    input.addEventListener("input", mask, false);
    input.focus();
    setCursorPosition(3, input);
});
function setCursorPosition(pos, e) {
    e.focus();
    if (e.setSelectionRange) e.setSelectionRange(pos, pos);
    else if (e.createTextRange) {
        var range = e.createTextRange();
        range.collapse(true);
        range.moveEnd("character", pos);
        range.moveStart("character", pos);
        range.select()
    }
}