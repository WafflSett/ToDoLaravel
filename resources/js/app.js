import './bootstrap';
const toggler = document.querySelector('#dark-toggler');
toggler.addEventListener('click', (e)=>{
    document.querySelector('html').classList.toggle('dark')
    if (localStorage.getItem('app-dark-mode')=='true') {
        localStorage.setItem('app-dark-mode', 'false');
    }else{
        localStorage.setItem('app-dark-mode', 'true');
    }
    setTogglerEmoji(toggler, localStorage.getItem('app-dark-mode')=='true');
})

toggler.innerHTML
let localMode = localStorage.getItem('app-dark-mode');

if (localMode != null) {
    if (localMode == 'false') {
        document.querySelector('html').classList.remove('dark')
    }
}
setTogglerEmoji(toggler, localStorage.getItem('app-dark-mode')=='true');

function setTogglerEmoji(toggler, dark){
    if (dark) {
        toggler.innerHTML = '☀️'
    }else{
        toggler.innerHTML = '🌙'
    }
}