import Api from "./Api";


export default {
    async register(form) {
    
        await this.$axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
        return Api.post("/register", form);
    },

    async login(form) {
        await this.$axios.get('http://127.0.0.1:8000/sanctum/csrf-cookie');
        return Api.post("/login", form);
    }
}