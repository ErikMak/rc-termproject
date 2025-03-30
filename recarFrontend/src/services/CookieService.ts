class CookieService {
    setCookie(name: string, value: string, minutes: number){
        console.info(`cookie ${name} записан`)
        let expires = "";
        if (minutes) {
            const date = new Date();
            date.setTime(date.getTime() + (minutes * 60 * 1000));
            expires = "; expires=" + date.toUTCString();
        }
        document.cookie = name + "=" + (value || "") + expires + "; path=/";
    }

    getCookie(name: string) {
        console.info(`cookie ${name} запрошен`)
        const nameEQ = name + "=";
        const ca = document.cookie.split(';');
        for (let i = 0; i < ca.length; i++) {
            let c = ca[i];
            while (c.charAt(0) === ' ') c = c.substring(1, c.length);
            if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length, c.length);
        }
        return null;
    }

    eraseCookie(name: string) {
        console.info(`cookie ${name} удален`)
        document.cookie = name + '=; Max-Age=0; path=/';
    }
}

export default new CookieService()
