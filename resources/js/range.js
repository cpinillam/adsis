

    const elem = document.querySelector('input[type="range"]');

    const rangeValue = function () {
        const newValue = elem.value;
        const target = document.querySelector('.value');
        target.innerHTML = newValue;
    };

    elem.addEventListener("input", rangeValue);

