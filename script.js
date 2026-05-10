// 1. SAF JAVASCRIPT DENETİMİ
function nativeCheck() {
    const app = window.vueInstance; 
    app.nE = {}; 
    let valid = true;

    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const emailRx = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    const kvkk = document.getElementById('kvkk').checked;

    if (name.trim().length < 3) { app.$set(app.nE, 'name', 'İsim hatası (JS)'); valid = false; }
    if (!emailRx.test(email)) { app.$set(app.nE, 'email', 'E-posta hatası (JS)'); valid = false; }
    if (!kvkk) { app.$set(app.nE, 'kvkk', 'Onay hatası (JS)'); valid = false; }

    if (valid) alert("Saf JS: Form doğrulandı!");
}

// 2. VUE.JS DENETİMİ
window.vueInstance = new Vue({
    el: '#app',
    data: {
        f: { name: '', email: '', phone: '', pref: '', sub: '', kvkk: false },
        vE: {}, // Vue Hataları
        nE: {}  // JS Hataları için
    },
    methods: {
        vueCheck() {
            this.vE = {}; this.nE = {};
            if (!this.f.name) this.$set(this.vE, 'name', 'İsim gerekli (Vue)');
            if (this.f.phone.length !== 10) this.$set(this.vE, 'phone', 'Telefon hatası (Vue)');
            if (!this.f.pref) this.$set(this.vE, 'pref', 'Seçim yapın (Vue)');
            if (!this.f.kvkk) this.$set(this.vE, 'kvkk', 'Onay gerekli (Vue)');

            if (Object.keys(this.vE).length === 0) alert("Vue.js: Form doğrulandı!");
        }
    }
});