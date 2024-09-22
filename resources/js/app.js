import './bootstrap';


window.numericOnly = (element) => {
    const inputValue = element.value.replace(/\D/g, "");
    element.value = inputValue;
}