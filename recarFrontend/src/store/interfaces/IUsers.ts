import {UserDataType} from "@/types/IUserData";

interface UserState {
    login: string
    userData: UserDataType
    loggedIn: boolean,
    user_id: null | number
    preloaderShow: boolean
}

export type { UserState as UserStateType }
