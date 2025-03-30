interface UserState {
    login: string
    balance: string
    loggedIn: boolean,
    user_id: null | number
    preloaderShow: boolean
}

export type { UserState as UserStateType }
