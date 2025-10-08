import './bootstrap';
const toggler = document.querySelector('#dark-toggler');
toggler.addEventListener('click', (e)=>{
    document.querySelector('html').classList.toggle('dark')
    if (localStorage.getItem('app-dark-mode')=='true') {
        localStorage.setItem('app-dark-mode', 'false');
    }else{
        localStorage.setItem('app-dark-mode', 'true');
    }
    setTogglerEmoji(localStorage.getItem('app-dark-mode')=='true');
})

document.addEventListener('DOMContentLoaded', ()=>{
    let localMode = localStorage.getItem('app-dark-mode');
    if (localMode != null) {
        if (localMode == 'false') {
            document.querySelector('html').classList.remove('dark')
        }
    }
    setTogglerEmoji(localStorage.getItem('app-dark-mode')=='true');
})


function setTogglerEmoji(dark){
    if (dark) {
        toggler.innerHTML = '☀️'
    }else{
        toggler.innerHTML = '🌙'
    }
}