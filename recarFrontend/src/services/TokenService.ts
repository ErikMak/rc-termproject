import UserService from "@/services/UserService";

class TokenService {
    getLocalAccessToken() {
        return JSON.parse(localStorage.getItem("user") as string);
    }

    setLocalAccessToken(user: string) {
        localStorage.setItem("user", JSON.stringify(user))
    }

    removeLocalAccessToken() {
        localStorage.removeItem("user")
    }

    async updateToken() {
        try {
            const rs: any = await UserService.refresh()
            const newToken = rs.headers.authorization

            this.setLocalAccessToken(newToken)
        } catch (refreshError) {
            throw refreshError
        }
    }
}

export default new TokenService()