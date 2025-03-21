const MobileNavMixins  = {
    data() {
        return {
            items: [
                {
                    title: "Главная",
                    icon: "fa-solid fa-house",
                    link: {
                        name: 'catalog_all',
                        query: {page: 1}
                    }
                },
                {
                    title: "Бронь",
                    icon: "fa-solid fa-bars",
                    link: {
                        name: 'reservations',
                    }
                },
                {
                    title: "Избранное",
                    icon: "fa-solid fa-heart",
                    link: {
                        name: 'favorites',
                    }
                },
                {
                    title: "Профиль",
                    icon: "fa-solid fa-user",
                    link: {
                        name: 'profile',
                    }
                }
            ]
        }
    }
}

export default MobileNavMixins